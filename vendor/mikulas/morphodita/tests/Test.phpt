<?php

namespace Mikulas\Morphodita;
use Tester\Assert;
use Tester\TestCase;

require __DIR__ . '/bootstrap.php';


/**
 * @see http://www.typotext.cz/radce7b_1.html
 */
class Test extends TestCase
{

	/**
	 * @var Client
	 */
	private $client;


	public function setUp()
	{
		$this->client = new Client();
	}


	public function testTokenize()
	{
		$res = $this->client->tokenize('Ano. Něco testujeme.');
		Assert::same([
			[
				['token' => 'Ano'],
				['token' => '.', 'space' => ' ']
			],
			[
				['token' => 'Něco', 'space' => ' '],
				['token' => 'testujeme'],
				['token' => '.'],
			]
		], $res);
	}


	public function testTag()
	{
		$res = $this->client->tag('jednotkové testy');
		Assert::same([[
			[
				'token' => 'jednotkové',
				'lemma' => 'jednotkový',
				'tag' => 'AAIP1----1A----',
				'space' => ' ',
			],
			[
				'token' => 'testy',
				'lemma' => 'test',
				'tag' => 'NNIP1-----A----',
			],
		]], $res);
	}


	public function testGenerate()
	{
		$res = $this->client->generate(['dítě', 'jet', 'k', 'babička']);
		Assert::count(4, $res);
		Assert::same('dítě', $res[0][0]['lemma']);
		Assert::same('jet', $res[1][0]['lemma']);
		Assert::same('k-1', $res[2][0]['lemma']);
		Assert::same('babička', $res[3][0]['lemma']);
	}


	public function testGenerateWithTag()
	{
		$res = $this->client->generate([
			['dítě', 'NNFP1-----A----'],
			['jet', 'VB-P---3P-AA---'],
			['k', 'RR--3----------'],
			['babička', 'NNFS3-----A----']
		]);
		Assert::count(4, $res);
		Assert::same('děti', $res[0]['form']);
		Assert::same('jedou', $res[1]['form']);
	}

}

(new Test)->run();
