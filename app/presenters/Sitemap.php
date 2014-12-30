<?php

namespace App\Presenters;

use Nette\Application\Responses\TextResponse;
use Nette\Caching\Cache;
use Tackk\Cartographer;
use Tackk\Cartographer\ChangeFrequency as Freq;


class Sitemap extends Presenter
{

	public function actionDefault()
	{
		$cache = new Cache($this->cacheStorage, 'sitemap');
		$string = $cache->load('full', function(&$dependencies) {
			$dependencies[Cache::EXPIRE] = '1 day';

			$map = new Cartographer\Sitemap();

			$map->add($this->link('Auth:registration'), NULL, Freq::YEARLY);
			$map->add($this->link('Auth:resetPassword'), NULL, Freq::YEARLY);
			$map->add($this->link('Homepage:default'),
				filemtime(__DIR__ . '/../templates/views/Homepage/default.latte'), Freq::YEARLY);
			$map->add($this->link('Text:about'),
				filemtime(__DIR__ . '/../templates/views/Text/about.latte'), Freq::YEARLY);

			foreach ($this->orm->schemas->findAll() as $schema)
			{
				$map->add($this->absoluteLink($schema), NULL, Freq::MONTHLY);
			}
			foreach ($this->orm->blocks->findAll() as $block)
			{
				$map->add($this->absoluteLink($block), NULL, Freq::MONTHLY);
			}
			foreach ($this->orm->contents->findAll() as $content)
			{
				$map->add($this->absoluteLink($content), NULL, Freq::YEARLY);
			}

			return $map->toString();
		});

		$this->getHttpResponse()->setContentType('text/xml');
		$this->sendResponse(new TextResponse($string));
	}

}
