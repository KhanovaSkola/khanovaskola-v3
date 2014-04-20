<?php

/**
 * This file is part of the Kdyby (http://www.kdyby.org)
 *
 * Copyright (c) 2008 Filip Procházka (filip@prochazka.su)
 *
 * For the full copyright and license information, please view the file license.md that was distributed with this source code.
 */

namespace KdybyTests;

use Kdyby;
use Nette;
use Tester;

if (@!include __DIR__ . '/../../vendor/autoload.php') {
	echo 'Install Nette Tester using `composer update --dev`';
	exit(1);
}

// configure environment
Tester\Environment::setup();
class_alias('Tester\Assert', 'Assert');
date_default_timezone_set('Europe/Prague');

// create temporary directory
define('TEMP_DIR', __DIR__ . '/../tmp/' . (isset($_SERVER['argv']) ? md5(serialize($_SERVER['argv'])) : getmypid()));
Tester\Helpers::purge(TEMP_DIR);
Nette\Diagnostics\Debugger::$logDirectory = TEMP_DIR;


$_SERVER = array_intersect_key($_SERVER, array_flip(array(
	'PHP_SELF', 'SCRIPT_NAME', 'SERVER_ADDR', 'SERVER_SOFTWARE', 'HTTP_HOST', 'DOCUMENT_ROOT', 'OS', 'argc', 'argv')));
$_SERVER['REQUEST_TIME'] = 1234567890;
$_ENV = $_GET = $_POST = array();


if (extension_loaded('xdebug')) {
	xdebug_disable();
	Tester\CodeCoverage\Collector::start(__DIR__ . '/coverage.dat');
}

function id($val) {
	return $val;
}

function run(Tester\TestCase $testCase) {
	$testCase->run(isset($_SERVER['argv'][1]) ? $_SERVER['argv'][1] : NULL);
}


require_once __DIR__ . '/Facebook/mock.php';

abstract class FacebookTestCase extends Tester\TestCase
{


	/** @var \Nette\DI\Container */
	protected $container;

	/** @var \Kdyby\Facebook\Facebook */
	protected $facebook;

	/** @var \Kdyby\Facebook\Configuration */
	protected $config;

	/** @var \Kdyby\Facebook\SessionStorage */
	protected $session;

	/** @var \Kdyby\Facebook\ApiClient|\Kdyby\Facebook\Api\CurlClient */
	protected $apiClient;



	/**
	 * @param string $fbConfig
	 * @return \SystemContainer|\Nette\DI\Container
	 */
	protected function createContainer($fbConfig = 'config.neon')
	{
		$config = new Nette\Configurator();
		$config->setTempDirectory(TEMP_DIR);
		Kdyby\Facebook\DI\FacebookExtension::register($config);
		$config->addConfig(__DIR__ . '/Facebook/files/' . $fbConfig, $config::NONE);
		$config->addConfig(__DIR__ . '/nette-reset.neon', $config::NONE);

		$dic = $config->createContainer();
		/** @var \Nette\DI\Container|\SystemContainer $dic */
		$dic->addService('httpRequest', new Nette\Http\Request(
				new Nette\Http\UrlScript('http://kdyby.org/'),
				NULL, NULL, NULL, NULL, NULL, 'GET')
		);

		$session = $dic->getByType('Nette\Http\Session');
		/** @var \Nette\Http\Session $session */
		$session->isStarted() && $session->destroy();

		$router = $dic->getService('router');
		$router[] = new Nette\Application\Routers\Route('unit-tests/<presenter>/<action>', 'Mock:default');

		$this->facebook = $dic->getByType('Kdyby\Facebook\Facebook');
		$this->config = $dic->getByType('Kdyby\Facebook\Configuration');
		$this->session = $dic->getByType('Kdyby\Facebook\SessionStorage');
		$this->apiClient = $dic->getByType('Kdyby\Facebook\ApiClient');
		$this->container = $dic;
	}



	protected function createWithRequest($url = NULL, $post = NULL, $cookies = NULL, $headers = NULL, $method = 'GET')
	{
		$url = new Nette\Http\UrlScript($url ? : 'http://kdyby.org/');

		foreach ((array) $cookies as $key => $val) {
			$_COOKIE[$key] = $val;
		}

		$this->container->removeService('httpRequest');
		$this->container->addService('httpRequest', new Nette\Http\Request($url, NULL, $post, NULL, $cookies, $headers, $method));

		$router = $this->container->getService('router');
		unset($router[0]);
		$flags = $url->scheme === 'https' ? Nette\Application\Routers\Route::SECURED : 0;
		$router[] = new Nette\Application\Routers\Route('unit-tests/<presenter>/<action>', 'Mock:default', $flags);

		return new Facebook\MockedFacebook(
			$this->config,
			$this->container->getByType('Kdyby\Facebook\SessionStorage'),
			$this->container->getByType('Kdyby\Facebook\ApiClient'),
			$this->container->getService('httpRequest'),
			new Nette\Http\Response()
		);
	}



	/**
	 * @param Kdyby\Facebook\Dialog $component
	 * @param string $name
	 * @return Kdyby\Facebook\Dialog
	 */
	protected function toPresenter(Kdyby\Facebook\Dialog $component, $name = 'facebook_dialog')
	{
		$presenter = $this->container->createInstance('KdybyTests\Facebook\PresenterMock');
		/** @var \KdybyTests\Facebook\PresenterMock $presenter */
		$this->container->callInjects($presenter);

		$query = $this->container->getService('httpRequest')->getQuery();
		$presenter->run(new Nette\Application\Request('Mock', 'GET', array('action' => 'default') + $query));

		$presenter->addComponent($component, $name);

		return $component;
	}

}
