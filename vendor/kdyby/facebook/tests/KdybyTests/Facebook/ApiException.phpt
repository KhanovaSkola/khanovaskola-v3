<?php

/**
 * Test: Kdyby\Facebook\Facebook.
 *
 * @testCase KdybyTests\Facebook\ApiExceptionTest
 * @author Filip Procházka <filip@prochazka.su>
 * @package Kdyby\Facebook
 */

namespace KdybyTests\Facebook;

use Kdyby;
use Kdyby\Facebook\FacebookApiException;
use KdybyTests;
use Nette;
use Tester;
use Tester\Assert;

require_once __DIR__ . '/../bootstrap.php';



/**
 * @author Filip Procházka <filip@prochazka.su>
 */
class ApiExceptionTest extends Tester\TestCase
{


	public function testExceptionConstructorWithErrorCode()
	{
		$e = new FacebookApiException(array('error_code' => $code = 404));
		Assert::same($code, $e->getCode());
	}



	public function testExceptionConstructorWithInvalidErrorCode()
	{
		$e = new FacebookApiException(array('error_code' => 'not an int'));
		Assert::same(0, $e->getCode());
	}



	/**
	 * this happens often despite the fact that it is useless
	 */
	public function testExceptionTypeFalse()
	{
		$e = new FacebookApiException(FALSE);
		Assert::same('Exception', $e->getType());
	}



	public function testExceptionTypeMixedDraft00()
	{
		$e = new FacebookApiException(array('error' => array('message' => 'foo')));
		Assert::same('Exception', $e->getType());
	}



	public function testExceptionTypeDraft00()
	{
		$error = 'foo';
		$e = new FacebookApiException(array('error' => array('type' => $error, 'message' => 'hello world')));
		Assert::same($error, $e->getType());
	}



	public function testExceptionTypeDraft10()
	{
		$e = new FacebookApiException(array('error' => $error = 'foo'));
		Assert::same($error, $e->getType());
	}



	public function testExceptionTypeDefault()
	{
		$e = new FacebookApiException(array('error' => FALSE));
		Assert::same('Exception', $e->getType());
	}



	public function testExceptionToString()
	{
		$e = new FacebookApiException(array(
			'error_code' => 1,
			'error_description' => 'foo',
		));
		Assert::same('Exception: 1: foo', (string) $e);
	}

}

KdybyTests\run(new ApiExceptionTest());
