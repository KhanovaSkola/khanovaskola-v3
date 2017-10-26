<?php

# This is an example script working with KA API
# and its topic tree
# (this version only syncs videos)
# (to get articles or exercises, one might need to use API V2)
#
# To see how to work with DIBI:
# https://dibiphp.com/cs/quick-start

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
      ->setName('ka:sync-all')
      ->setDescription('Sync local db with KA topic tree')
      ->setHelp("KA topic tree can be downloaded and saved localy for later use.")
      ->addOption('debug', 'd', InputOption::VALUE_NONE, 'Do not download topic tree, use the already downloaded one.')
      ->addOption('video', 'o', InputOption::VALUE_NONE, 'Sync only videos.')
      ->addOption('exercises', 'e', InputOption::VALUE_NONE, 'Sync only exercises.')
      ->addOption('articles', 'a', InputOption::VALUE_NONE, 'Sync only articles.');
   }

   public function invoke(DibiConnection $db, Locale $locale)
   {
      $this->out->writeln("Loading new videos...");

      $lc = $locale->getLocale();
      $file = "ka_tree.$lc.raw";

      if (! $this->in->getOption('debug'))
      {
         //$raw = file_get_contents('http://khanacademy.com/api/v1/topictree');
         $raw = file_get_contents("https://$lc.khanacademy.org/api/v2/topics/topictree");
         file_put_contents($file, $raw);
         $this->out->writeln("Downloaded topic tree...");
      } 
      else 
      {
         $raw = file_get_contents($file);
      }

      $data = json_decode($raw, TRUE);
      //Only for DEBUG
      file_put_contents("$file.json",json_encode($data, JSON_PRETTY_PRINT));

      $this->out->writeln("Videos loaded...");

      $ids = $this->findVideos($data, []);

      $max = count($ids);
      $done = 0;
      $this->out->writeln("Number of videos found = $max");

      /*
      $insert = $this->pdo->prepare('
                INSERT INTO content
                    (youtube_id, title, description, created_at, duration, keywords, author_names, categories)
                VALUES
                    (?,?,?,?,?,?,?,?)
            ');
 */

        $youtubeIds = [];
        foreach ($ids as $id => $node)
        {
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

            $youtubeIds[$node['youtube_id']] = 1;

            $categories = "\x12" . implode("\x12", $categories); // Not sure what this is

//            $res = $this->insertVideo($node['youtube_id'], $node['title'], $node['description'],
//               date('Y-m-d H:i:s', strToTime($node['date_added'])), $node['duration']);
	    $old = $db->query('SELECT from contents WHERE youtube_id = ? ', $node['youtube_id']);
	    if ($old)
	    {
		//$this->out->writeln('Toto youtubeId už v databázi existuje: '.$node['youtube_id']);
                //TODO: Update certain field that could be changed like title, description etc.
                $max--;
		continue;
	    }

            $PLACEHOLDER = '\t'; // e.g. when description is missing

            $type = 'ka_video';
            $title = $node['translated_title'];
            $youtubeId = $node['translated_youtube_id']; 
            $description = $node['description'];
            $dur = $node['duration'];
            $keywords = $node['keywords'];
            $originalYoutubeId = $node['youtube_id']; // Maybe to the English version, but api seems unreliable in this
            $ka_url = $node['ka_url'];;
            if ($description == NULL ) {
               $description = $PLACEHOLDER;
            }
            if ($ka_url == NULL ) {
               continue;
            }
            //add URL and keywords
            $db->query('INSERT INTO contents (`type`, `title`,`description`,`duration`,`youtube_id`,
               `youtube_id_original`,`ka_keywords` , `ka_url`, `created_at`) 
               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)',
            $type, $title, $description, $dur, $youtubeId, $originalYoutubeId,
            $keywords, $ka_url, date('Y-m-d H:i:s', strToTime($node['date_added'])));

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
            WHERE removed_at IS NULL AND youtube_id NOT IN ("' .
               implode('","', array_keys($youtubeIds))
        . '")
        ');

        if ($nrows>0) {
           $this->out->writeln("Number of videos removed = $nrows");
        }

        $this->out->writeln("Number of videos added = $done");

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
       $this-out-writeln('Exercises not yet implemented.');
       // Maybe put this as a separate command?
       return FALSE;
    }


    // I am not sure articles are in API V1 topic tree
    private function findArticles(array $data, array $categories)
    {
       $this-out-writeln('Articles not yet implemented.');
       // Maybe put this as a separate command?
       return FALSE;
    }
}


