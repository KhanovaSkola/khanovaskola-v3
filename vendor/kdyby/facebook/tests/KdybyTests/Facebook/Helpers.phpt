<?php

/**
 * Test: Kdyby\Facebook\Facebook.
 *
 * @testCase KdybyTests\Facebook\HelpersTest
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
class HelpersTest extends Tester\TestCase
{

	public function testBase64UrlEncode()
	{
		$input = 'Facebook rocks';
		$output = 'RmFjZWJvb2sgcm9ja3M';

		Assert::same($input, Kdyby\Facebook\Helpers::base64UrlDecode($output));
	}



	/**
	 * @dataProvider dataIsAllowedDomain
	 */
	public function testIsAllowedDomain($big, $small, $result)
	{
		Assert::same($result, Kdyby\Facebook\Helpers::isAllowedDomain($big, $small));
	}



	public function dataIsAllowedDomain()
	{
		return array(
			array('fbrell.com', 'fbrell.com', TRUE),
			array('foo.fbrell.com', 'fbrell.com', TRUE),
			array('foofbrell.com', 'fbrell.com', FALSE),
			array('evil.com', 'fbrell.com', FALSE),
			array('foo.fbrell.com', 'bar.fbrell.com', FALSE),
		);
	}

}

KdybyTests\run(new HelpersTest());
