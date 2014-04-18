<?php

namespace Tests\App\Services;

use App\Services\Translator;
use Nette;
use Tester;
use Tester\Assert;

$container = require __DIR__ . '/../../bootstrap.php';


class TranslatorTest extends Tester\TestCase
{

	/** @var MockTranslator */
	private $t;

	private $container;

	function __construct(Nette\DI\Container $container)
	{
		$this->container = $container;
	}

	function setUp()
	{
		$this->t = new MockTranslator(NULL, $this->container->getService('log'));
	}

	function testUnsetLanguageFails()
	{
		Assert::exception(function() {
			$this->t->translate('one');
		}, 'App\InvalidStateException');
	}

	function testPathExpands()
	{
		$this->t->setLanguage('test');
		Assert::same('value', $this->t->translate('one.two.three'));
	}

	function testUnset()
	{
		$this->t->setLanguage('test');
		Assert::same('[foo.bar]', $this->t->translate('foo.bar'));
		Assert::same('[foo.bar (few|many)]', $this->t->translate('foo.bar', 3));
	}

	function testPlurals()
	{
		$this->t->setLanguage('test');
		Assert::same('nula', $this->t->translate('plural', 0));
		Assert::same('jeden', $this->t->translate('plural', 1));
		Assert::same('dva', $this->t->translate('plural', 2));
		Assert::same('dva', $this->t->translate('plural', 4));
		Assert::same('deset', $this->t->translate('plural', 5));
	}

	function testPluralsFallback()
	{
		$this->t->setLanguage('test');
		Assert::same('deset', $this->t->translate('fallback', 0));
		Assert::same('jeden', $this->t->translate('fallback', 1));
		Assert::same('deset', $this->t->translate('fallback', 2));
		Assert::same('deset', $this->t->translate('fallback', 4));
		Assert::same('deset', $this->t->translate('fallback', 5));
	}

	function testPlaceholder()
	{
		$this->t->setLanguage('test');
		Assert::same('1 2 3', $this->t->translate('placeholder', 1, 2, 3));
		Assert::same('1 2 3', $this->t->translate('placeholder', 1, 2, 3, 4));
		Assert::same('1 2 %3', $this->t->translate('placeholder', 1, 2));
	}

}

class MockTranslator extends Translator
{

	protected function getSource($file, $language)
	{
		return [
			'one' => [
				'two' => [
					'three' => 'value',
				]
			],
			'plural' => [
				'zero' => 'nula',
				'one' => 'jeden',
				'few' => 'dva',
				'many' => 'deset',
			],
			'fallback' => [
				'one' => 'jeden',
				'many' => 'deset',
			],
			'placeholder' => '%1 %2 %3',
		];
	}

}


$test = new TranslatorTest($container);
$test->run();
