<?php

/**
 * This file is part of the Kdyby (http://www.kdyby.org)
 *
 * Copyright (c) 2008 Filip Procházka (filip@prochazka.su)
 *
 * For the full copyright and license information, please view the file license.txt that was distributed with this source code.
 */

namespace KdybyTests\Facebook;

use Kdyby\Facebook\Api\CurlClient;
use Kdyby\Facebook\ApiClient;
use Kdyby\Facebook\Configuration;
use Kdyby\Facebook\Facebook;
use Kdyby\Facebook\SessionStorage;
use Kdyby\Facebook\SignedRequest;
use Nette\Application\UI\Presenter;
use Nette\Diagnostics\Debugger;
use Nette\Http\Request;
use Nette\Http\UrlScript;
use Nette\Utils\Json;
use Nette\Utils\Strings;



class MockedFacebook extends Facebook
{

	public $forcedCode;

	public $forcedSignedRequest;

	public $forcedAccessTokenFromCode;
	public $forcedAccessTokenFromCode_Map = array();

	public $forcedAccessToken;

	public $forcedUserFromAccessToken;
	public $getUserFromAccessTokenCalled = FALSE;

	public $getCurrentUrlCalled = FALSE;

	public $destroySessionCalled = FALSE;



	public function setHttpRequest(UrlScript $url = NULL, $post = NULL, $cookies = NULL, $headers = NULL, $method = NULL)
	{
		if ($url === NULL) {
			$url = new UrlScript('http://www.kdyby.org/');
		}

		$this->httpRequest = new Request($url, NULL, $post, $cookies, $headers, $method);
	}



	public function destroySession()
	{
		$this->destroySessionCalled = TRUE;
		parent::destroySession();
	}



	protected function getUserFromAccessToken()
	{
		$this->getUserFromAccessTokenCalled = TRUE;

		if ($this->forcedUserFromAccessToken !== NULL) {
			return $this->forcedUserFromAccessToken;
		}

		return parent::getUserFromAccessToken();
	}



	public function getSignedRequest()
	{
		if ($this->forcedSignedRequest !== NULL) {
			return $this->forcedSignedRequest;
		}

		return parent::getSignedRequest();
	}



	protected function getAccessTokenFromCode($code, $redirectUri = NULL)
	{
		if ($this->forcedAccessTokenFromCode !== NULL) {
			return $this->forcedAccessTokenFromCode;
		}

		if (array_key_exists($key = json_encode(func_get_args()), $this->forcedAccessTokenFromCode_Map)) {
			return $this->forcedAccessTokenFromCode_Map[$key];
		}

		return parent::getAccessTokenFromCode($code, $redirectUri);
	}



	public function getCurrentUrl()
	{
		$this->getCurrentUrlCalled = TRUE;
		return parent::getCurrentUrl();
	}



	protected function getCode()
	{
		if ($this->forcedCode !== NULL) {
			return $this->forcedCode;
		}

		return parent::getCode();
	}



	public function getAccessToken()
	{
		if ($this->forcedAccessToken !== NULL) {
			return $this->forcedAccessToken;
		}

		return parent::getAccessToken();
	}



	public function mockApiClient()
	{
		$this->apiClient = new MockedApiClient;
		$this->apiClient->setFacebook($this);

		return $this->apiClient;
	}



	public function mockSessionStorage()
	{
		$this->session = new MockedSessionStorage($this->session, $this->config);

		return $this->session;
	}



	public function publicGetCode()
	{
		return $this->getCode();
	}



	public function publicGetMetadataCookie()
	{
		return $this->getMetadataCookie();
	}



	public function publicGetAccessTokenFromCode($code, $redirect_uri = NULL)
	{
		return $this->getAccessTokenFromCode($code, $redirect_uri);
	}



	public function uncacheSignedRequest()
	{
		$this->signedRequest = NULL;
	}



	public function uncache()
	{
		$this->user = NULL;
		$this->signedRequest = NULL;
		$this->accessToken = NULL;
	}

}

class MockedApiClient extends CurlClient implements ApiClient
{

	public $calls = array();
	public $response; // empty response
	public $throw;


	protected function makeRequest($url, array $params, $ch = NULL)
	{
		$this->calls[] = func_get_args();

		if ($this->throw instanceof \Exception) {
			throw $this->throw;
		}

		if ($this->response !== NULL) {
			return $this->response;
		}

		return parent::makeRequest($url, $params, $ch);
	}

}

class MockedSessionStorage extends SessionStorage
{

	public $clearCalled = FALSE;

	public function __construct(SessionStorage $originalStorage, Configuration $config)
	{
		$this->session = $originalStorage->session; // Help! A thief! He robed me!
	}

	public function clearAll()
	{
		$this->clearCalled = TRUE;
		parent::clearAll();
	}

}

class PresenterMock extends Presenter
{

	/** @persistent */
	public $do_not_drop;

	protected function startup()
	{
		$this->terminate();
	}

}
