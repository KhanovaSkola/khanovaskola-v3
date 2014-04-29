<?php
namespace Codeception\Module;

// here you can define custom functions for WebGuy

class WebHelper extends \Codeception\Module
{

	public function logInToFacebook($user, $pass)
	{
		/** @var PhpBrowser $phpBrowser */
		$phpBrowser = $this->getModule('PhpBrowser');

		$phpBrowser->_sendRequest('https://www.facebook.com/login.php');
		$phpBrowser->submitForm('#login_form', [
			'email' => $user,
			'pass' => $pass,
		]);
		$phpBrowser->seeInCurrentUrl('welcome');
	}

	public function logInToGoogle($user, $pass)
	{
		/** @var PhpBrowser $phpBrowser */
		$phpBrowser = $this->getModule('PhpBrowser');

		$phpBrowser->_sendRequest('https://accounts.google.com/ServiceLogin');
		$phpBrowser->submitForm('#gaia_loginform', [
			'Email' => $user,
			'Passwd' => $pass,
		]);
		$phpBrowser->seeInCurrentUrl('/settings/personalinfo');
	}

}
