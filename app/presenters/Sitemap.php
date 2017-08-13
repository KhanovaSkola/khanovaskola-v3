<?php

namespace App\Presenters;

use Nette\Application\Responses\TextResponse;
use Nette\Caching\Cache;
use Tackk\Cartographer;
use Tackk\Cartographer\ChangeFrequency as Freq;


class Sitemap extends Presenter
{

	public function renderDefault()
	{
		$cache = new Cache($this->cacheStorage, 'sitemap');
		$string = $cache->load('full', function(&$dependencies) {
			$dependencies[Cache::EXPIRE] = '1 day';

			$map = new Cartographer\Sitemap();

			$map->add($this->link('//Auth:registration'), NULL, Freq::YEARLY, 0.1);
			$map->add($this->link('//Auth:resetPassword'), NULL, Freq::YEARLY, 0.1);
			$map->add($this->link('//Homepage:default'), NULL, Freq::WEEKLY, 1.0);
                        // We cannot reliably estimate the time of change, since main menu can change, and we cannot know when
				//filemtime(__DIR__ . '/../templates/views/Homepage/default.latte'), Freq::MONTHLY,1.0);
                        //
			$map->add($this->link('//Text:about'),
				filemtime(__DIR__ . '/../templates/views/Text/about.latte'), Freq::MONTHLY, 0.7);

		        $map->add('https://blog.khanovaskola.cz/',NULL, Freq::MONTHLY, 0.8);

			foreach ($this->orm->schemas->findAll() as $schema)
			{
                           if ( ! is_null( $schema->position)) {
				$map->add($this->absoluteLink($schema), NULL, Freq::MONTHLY, 0.9);
                           }
			}
			foreach ($this->orm->blocks->findAll() as $block)
			{
                           if (! $block->hidden) {
				$map->add($this->absoluteLink($block), NULL, Freq::MONTHLY, 0.7);
                           }
			}

			foreach ($this->orm->contents->findAll() as $content)
			{
                           if (! $content->hidden || ! is_null($content->removedAt) ) { 
				$map->add($this->absoluteLink($content), NULL, Freq::WEEKLY);
                           }
                        }

			return $map->toString();
		});

		$this->getHttpResponse()->setContentType('application/xml');
		$this->sendResponse(new TextResponse($string));
	}

}
