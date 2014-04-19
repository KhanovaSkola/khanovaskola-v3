<?php

/**
 * This file is part of the Kdyby (http://www.kdyby.org)
 *
 * Copyright (c) 2008 Filip Procházka (filip@prochazka.su)
 *
 * For the full copyright and license information, please view the file license.txt that was distributed with this source code.
 */

if (!defined('KDYBY_TO_DOCTRINE_EVENTS') && !class_exists('Doctrine\Common\EventManager')) {
	$aliases = <<<GEN
namespace Doctrine\Common {
	class EventArgs {}
	abstract class EventManager {
		public function addEventSubscriber(EventSubscriber \$subscriber) { \$this->addEventListener(\$subscriber->getSubscribedEvents(), \$subscriber); }
		public function removeEventSubscriber(EventSubscriber \$subscriber) { \$this->removeEventListener(\$subscriber->getSubscribedEvents(), \$subscriber); }
		abstract public function addEventListener(\$events, \$listener);
		abstract public function removeEventListener(\$events, \$listener = NULL);
	}
	interface EventSubscriber { function getSubscribedEvents(); }
}
GEN;
	eval($aliases);
	define('KDYBY_TO_DOCTRINE_EVENTS', 1);
}
