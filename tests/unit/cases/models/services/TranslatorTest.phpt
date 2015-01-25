<?php

namespace Tests\Cases\Unit;

use App\Models\Services\Translator;
use Monolog\Logger;
use Nette;
use Tester;
use Tester\Assert;
use Tests\TestCase;


$container = require __DIR__ . '/../../../bootstrap.php';

/**
 * @skip
 */
class TranslatorTest extends TestCase
{

	/**
	 * @var MockTranslator
	 */
	private $t;

	public function setUp()
	{
		$this->t = new MockTranslator(NULL, $this->container->getByType(Logger::class));
	}

	public function testUnsetLanguageFails()
	{
		Assert::exception(function() {
			$this->t->translate('one');
		}, 'App\InvalidStateException');
	}

	public function testPathExpands()
	{
		$this->t->setLanguage('test');
		Assert::same('value', $this->t->translate('one.two.three'));
	}

	public function testUnset()
	{
		$this->t->setLanguage('test');
		Assert::same('[foo.bar]', $this->t->translate('foo.bar'));
		Assert::same('[foo.bar (few|many)]', $this->t->translate('foo.bar', 3));
	}

	public function testPlurals()
	{
		$this->t->setLanguage('test');
		Assert::same('nula', $this->t->translate('plural', 0));
		Assert::same('jeden', $this->t->translate('plural', 1));
		Assert::same('dva', $this->t->translate('plural', 2));
		Assert::same('dva', $this->t->translate('plural', 4));
		Assert::same('deset', $this->t->translate('plural', 5));
	}

	public function testPluralsFallback()
	{
		$this->t->setLanguage('test');
		Assert::same('deset', $this->t->translate('fallback', 0));
		Assert::same('jeden', $this->t->translate('fallback', 1));
		Assert::same('deset', $this->t->translate('fallback', 2));
		Assert::same('deset', $this->t->translate('fallback', 4));
		Assert::same('deset', $this->t->translate('fallback', 5));
	}

	public function testNamed()
	{
		$this->t->setLanguage('test');
		Assert::same('1 %name', $this->t->translate('named', 1));
		Assert::same('1 Marco', $this->t->translate('named', 1, ['name' => 'Marco']));
	}

	public function testShortNamed()
	{
		$this->t->setLanguage('test');
		Assert::same('%1 Marco', $this->t->translate('named_short', ['name' => 'Marco']));
	}

	public function testPluralsWithNamed()
	{
		$this->t->setLanguage('test');
		Assert::same('One message, Marco', $this->t->translate('plurals_named', 1, ['name' => 'Marco']));
		Assert::same('10 messages, Marco', $this->t->translate('plurals_named', 10, ['name' => 'Marco']));
	}

	public function testGenderInflector()
	{
		$this->t->setLanguage('test');
		Assert::same('[he|she] udelal[|a]', $this->t->translate('gender'));
		Assert::same('he udelal', $this->t->translate('gender', ['gender' => 'male']));
		Assert::same('she udelala', $this->t->translate('gender', ['gender' => 'female']));
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
			'named' => '%1 %name',
			'named_short' => '%1 %name',
			'plurals_named' => [
				'one' => 'One message, %name',
				'many' => '%1 messages, %name',
			],
			'gender' => '[he|she] udelal[|a]'
		];
	}

}

runTests(__FILE__, $container);
