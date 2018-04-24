<?php

# This script sync KA content with Postgres database via KA API
#
# For developers - SQL connection is handled via DIBI library:
#   To see how to work with DIBI:
#   https://dibiphp.com/en/quick-start

namespace Bin\Commands\Ka;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

use Bin\Commands\Command;
use DibiConnection;

use App\Models\Services\Locale;

class SyncAll extends Command
{

   /**
   * @var RepositoryContainer
   * @inject
   */
//   public $orm;


    protected function configure()
    {
      $this
      ->setName('ka:sync')
      ->setDescription('Sync local db with KA topic tree')
      ->setHelp("KA topic tree can be downloaded and saved localy for later use.")
      ->addOption('debug', 'd', InputOption::VALUE_NONE, 'Do not download topic tree, use the already downloaded one.')
      ->addOption('videos', 'o', InputOption::VALUE_NONE, 'Sync videos [default].')
      ->addOption('exercises', 'e', InputOption::VALUE_NONE, 'Sync exercises.')
      ->addOption('articles', 'a', InputOption::VALUE_NONE, 'Sync articles.');
    }

    public function invoke(DibiConnection $db, Locale $locale)
    {

      $lc = $locale->getLocale();
      $api_version = "1";
      $HTTP_PROTOCOL = "http://";

      if ( $this->in->getOption('exercises')) {
        $ct_type = 'exercise';
      } else if ($this->in->getOption('articles')) {
        $ct_type = 'article';
        $api_version = "2";
      } else {
        $ct_type = 'video';
      }

      $file = "ka_tree_$ct_type.$lc.raw";

      if ($lc === 'en' ) {
        $ka_base_url = "www.khanacademy.org";
      } else {
        $ka_base_url = "$lc.khanacademy.org";
      }

      if ($api_version === '1' ) {
        // This one does not work for articles
        $ka_url = "$HTTP_PROTOCOL$ka_base_url/api/v$api_version/topictree?kind=$ct_type";
      } else if ($api_version === '2' ) {
        $ka_url = "$HTTP_PROTOCOL$ka_base_url/api/v$api_version/topics/topictree?kind=$ct_type";
      } else {
        $this->out->writeln("API version $api_version not supported!");
        exit(1);
      }

      if (! $this->in->getOption('debug'))
      {
        $this->out->writeln("Downloading current KA topic tree...");
        $raw = file_get_contents($ka_url);
        file_put_contents($file, $raw);
        $this->out->writeln("Topic tree downloaded.");
      } 
      else 
      {
        $raw = file_get_contents($file);
      }

      $this->out->writeln("Decoding JSON data");
      $data = json_decode($raw, TRUE);
      //Only for DEBUG
      file_put_contents("$file.json", json_encode($data, JSON_PRETTY_PRINT));

      $this->out->writeln("Parsing content...");

      if ($ct_type == 'exercise' ) {
        $ids = $this->findExercises($data, []);
      } else if ($ct_type == 'article' ) {
        $ids = $this->findArticles($data, []);
      } else {
        $ids = $this->findVideos($data, []);
      }

      $max = count($ids);
      $done = 0;
      $this->out->writeln("Number of $ct_type"."s found = $max");

      $youtubeIds = [];

      if ($ct_type == 'video' ) {
        $key = 'youtube_id';
      } else {
        $key = 'id';
      }

      foreach ($ids as $id => $node)
      {
        if ($ct_type != "article") {
          // Categories (i.e. topic titles) are currently not used
          // Potentially usefull if we want to pre-create blocks and schemas
          $categories = [];

          foreach ($node['categories'] as $list)
          {
              if (in_array('New and noteworthy', $list))
              {
                  continue;
              }
         
              $chars = " \t\n\r\x0B\xC2\xA0";
              foreach ($list as &$l)
              {
                  $l = preg_replace("~^[$chars]+|[$chars]+\z~u", '', $l);
              }
              $c = implode("\x11", $list);
              if ($c) {
                  $categories[] = $c;
              }
          }

          $categories = "\x12" . implode("\x12", $categories); // Not sure what this is
        }

        $youtubeIds[$node[$key]] = 1;

        $PLACEHOLDER = "\t"; // e.g. when description is missing

        $type = "ka_$ct_type";
        $description = NULL;
        $dur = NULL;
        $ka_keywords = NULL;
        $originalYoutubeId = NULL;
        $created_at = "NOW()";

        if ($ct_type == 'video') {
          $youtubeId = $node['translated_youtube_id']; 
          $dur = $node['duration'];
          $originalYoutubeId = $node['youtube_id']; // Maybe to the English version, but api seems unreliable in this
          $ka_keywords = $node['keywords'];
          $ka_url = $node['ka_url'];;
          $title = $node['translated_title'];
          $description = $node['description'];
          $created_at = date('Y-m-d H:i:s', strToTime($node['creation_date']));

        } else if ($ct_type == 'article') {
          $youtubeId = $node['id']; 
          $ka_url = "https://".$ka_base_url."/a/".$node['slug'];
          $title = $node['title'];

        } else if ($ct_type == 'exercise' ) {
          $youtubeId = $node['id']; 
          $ka_url = $node['ka_url'];
          $title = $node['translated_title'];
          $description = $node['description'];
          $created_at = date('Y-m-d H:i:s', strToTime($node['creation_date']));

        } else {
          $this->out->writeln("Invalid content type!");
          exit(1);
        }

        if ($description == NULL ) {
           $description = $PLACEHOLDER;
        }

        if ($ka_url == NULL ) {
           continue;
        }

        $old = $db->query('SELECT from contents WHERE youtube_id = ? ', $node[$key]);

        if ($old)
        {
         // $db->query('UPDATE contents SET `title` = "'.$title.'" , `description` = "'.$description.'",
         //   `ka_keywords` = "'.$keywords.'" , `ka_url`= "'.$ka_url.", `created_at` = date('Y-m-d H:i:s', strToTime(".$node['creation_date'].'))
         //   WHERE youtube_id = "'.$youtubeId.'"');
         // $db->query('UPDATE contents SET `removed_at` = NULL
         //   WHERE `youtube_id` = "'.$youtubeId.'"');
          $db->query('UPDATE contents SET', [
            'removed_at' => NULL,
            'title' => $title,
            'ka_url' => $ka_url,
            'description' => $description,
            'ka_keywords' => $ka_keywords,],
            'WHERE youtube_id = ? ',$youtubeId);
          $max--;
          continue;
        }


        $db->query('INSERT INTO contents (`type`, `title`,`description`,`duration`,`youtube_id`,
           `youtube_id_original`,`ka_keywords` , `ka_url`, `created_at`) 
           VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)',
        $type, $title, $description, $dur, $youtubeId, $originalYoutubeId,
        $ka_keywords, $ka_url, $created_at);

        $done++;
        if ($done % 50 === 0)
        {
           $percent = number_format($done/$max * 100, 2);
           echo "$percent% [$done/$max]\n";
        }
        usleep(1 * 1000); // do not saturate IO
      }

      $nrows = $db->query('
          UPDATE contents SET removed_at = Now()
          WHERE removed_at IS NULL AND type = "ka_'.$ct_type.'" AND youtube_id NOT IN ("' .
             implode('","', array_keys($youtubeIds))
      . '")
      ');

      if ($nrows>0) {
         $this->out->writeln("Number of $ct_type"."s removed = $nrows");
      }

      $this->out->writeln("Number of $ct_type"."s added = $done");

    }


    private function findVideos(array $data, array $categories)
    {
        $res = [];
        if (isset($data['children']))
        {
            $categories[] = $data['title'];
            foreach ($data['children'] as $child)
            {
                if (isset($child['youtube_id']))
                {
                    $yid = $child['youtube_id'];
                    $child['categories'][] = array_slice($categories, 1);
                    $res[$yid] = $child;
                }

                foreach ($this->findVideos($child, $categories) as $yid => $child)
                {
                    if (isset($res[$yid]))
                    {
                        $res[$yid]['categories'][] = array_slice($categories, 1);
                    }
                    else
                    {
                        $res[$yid] = $child;
                    }
                }
            }
        }
        return $res;
    }


    private function findExercises(array $data, array $categories)
    {
        $res = [];
        if (isset($data['children']))
        {
            $categories[] = $data['title'];
            foreach ($data['children'] as $child)
            {
                //if (! isset($child['youtube_id']) && !isset($data['children']))
                if ($child['kind']=='Exercise')
                {
                    $id = $child['id'];
                    $child['categories'][] = array_slice($categories, 1);
                    $res[$id] = $child;
                }

                foreach ($this->findExercises($child, $categories) as $id => $child)
                {
                    if (isset($res[$id]))
                    {
                        $res[$id]['categories'][] = array_slice($categories, 1);
                    }
                    else
                    {
                        $res[$id] = $child;
                    }
                }
            }
        }
        return $res;
    }

    // I am not sure articles are in API V1 topic tree
    // Here using partial tree from API V2
    private function findArticles(array $data, array $categories)
    {
        $res = [];
        foreach ($data['articles'] as $child) {
           $id = $child['id'];
           $res[$id] = $child;
        }
        return $res;
    }

    // TODO: import topics into KA blocks
    // this means populating TABLE blocks
    // and then populating TABLE content_block_bridges
    private function findTopics(array $data, array $categories) {

    }

}


