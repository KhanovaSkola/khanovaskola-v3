<?php

/**
 * Test: Kdyby\Facebook\Facebook.
 *
 * @testCase KdybyTests\Facebook\SignedRequestTest
 * @author Filip Procházka <filip@prochazka.su>
 * @package Kdyby\Facebook
 */

namespace KdybyTests\Facebook;

use Kdyby;
use KdybyTests;
use Nette;
use Tester;
use Tester\Assert;

require_once __DIR__ . '/../bootstrap.php';



/**
 * @author Filip Procházka <filip@prochazka.su>
 */
class SignedRequestTest extends KdybyTests\FacebookTestCase
{

	/**
	 * @return \SystemContainer|\Nette\DI\Container
	 */
	protected function setUp()
	{
		$this->createContainer();
	}


	public function testSignedRequestWithWrongAlgo()
	{
		$payload = Kdyby\Facebook\SignedRequest::decode(self::kSignedRequestWithWrongAlgorithm(), $this->config->appSecret);
		Assert::null($payload);
	}



	public function testMakeAndParse()
	{
		$data = array('foo' => 42);
		$sr = Kdyby\Facebook\SignedRequest::encode($data, $this->config->appSecret);
		$decoded = Kdyby\Facebook\SignedRequest::decode($sr, $this->config->appSecret);
		Assert::same($data['foo'], $decoded['foo']);
	}



	public function testMakeSignedRequestExpectsArray()
	{
		$config = $this->config;

		Assert::exception(function () use ($config) {
			Kdyby\Facebook\SignedRequest::encode('', $config->appSecret);
		}, 'Kdyby\Facebook\InvalidArgumentException', 'Kdyby\Facebook\SignedRequest::encode expects an array, but given');
	}



	private function kSignedRequestWithWrongAlgorithm()
	{
		$data = array('algorithm' => 'foo');
		$json = json_encode($data);
		$b64 = Kdyby\Facebook\Helpers::base64UrlEncode($json);
		$raw_sig = hash_hmac('sha256', $b64, $this->config->appSecret, $raw = TRUE);
		$sig = Kdyby\Facebook\Helpers::base64UrlEncode($raw_sig);

		return $sig . '.' . $b64;
	}

}

KdybyTests\run(new SignedRequestTest());
