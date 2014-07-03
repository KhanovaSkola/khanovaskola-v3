<?php

namespace App\Models\Rme;

use App;
use App\Models\Orm\Entity;
use App\Models\Services\Translator;
use Orm;


/**
 * @property App\Models\Rme\Badge $badge {m:1 badges $badgeUserBridges}
 * @property App\Models\Rme\User $user {m:1 users $badges}
 *
 * @property-read string $title translated {ignore}
 * @property-read string $description translated {ignore}
 */
abstract class BadgeUserBridge extends Entity
{

	/** @var Translator */
	protected $translator;

	public function __construct(Badge $badge, User $user)
	{
		parent::__construct();

		$this->badge = $badge;
		$this->user = $user;
	}

	private function getTranslated($field, array $args)
	{
		if (!$this->translator)
		{
			throw new MustNeverHappenException;
		}

		$path = $this->getTranslationPath($this->badge->key, $field);
		return $this->translator->translate($path, $args);
	}

	/**
	 * @return string translated
	 */
	public function getTitle()
	{
		return $this->getTranslated('title', $this->getTitleArgs());
	}

	/**
	 * @return array
	 */
	public function getTitleArgs()
	{
		return [];
	}

	/**
	 * @return string translated
	 */
	public function getDescription()
	{
		return $this->getTranslated('description', $this->getDescriptionArgs());
	}

	/**
	 * @return array
	 */
	public function getDescriptionArgs()
	{
		return [];
	}

	/**
	 * @return string path
	 */
	public function getImagePath()
	{
		$file = preg_replace_callback('~[A-Z]~', function($m) {
			return '.' . strToLower($m[0]);
		}, lcFirst($this->badge->key));
		return "/images/badges/$file.svg";
	}

	public function injectTranslator(Translator $translator)
	{
		$this->translator = $translator;
	}

	/**
	 * Turns camelCaps into dot.separated
	 * @param string $key
	 * @param string $field
	 * @return string
	 */
	private function getTranslationPath($key, $field)
	{
		return 'badges' . preg_replace_callback('~[A-Z]~', function($m) {
			return '.' . strToLower($m[0]);
		}, $key) . ".$field";
	}

}
