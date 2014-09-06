<?php

namespace Tests\Cases\Unit;

use AccessMethod;
use App\Models\Services\BlueprintCompiler;
use Nette;
use Tester;
use Tester\Assert;
use Tests\TestCase;


$container = require __DIR__ . '/../../../bootstrap.php';

class BlueprintCompilerTest extends TestCase
{

	/**
	 * @var BlueprintCompiler
	 * @inject
	 */
	public $compiler;

	/**
	 * @var AccessMethod
	 */
	private $compile;

	public function setUp()
	{
		$this->compile = Access($this->compiler, 'compileString');
	}

	public function testColorInText()
	{
		$in = 'pre <color id="1">inner</color> post';
		$out = $this->compile->callArgs([$in, []]);

		Assert::same('pre <span class="color-1">inner</span> post', $out);
	}

	public function testColorInLatex()
	{
		$in = 'pretext <latex>pre <color id="1">inner</color> post</latex> posttext';
		$out = $this->compile->callArgs([$in, []]);

		Assert::same('pretext $pre {\color[RGB]{78,205,196}inner} post$ posttext', $out);
	}

	public function testLatexSimple()
	{
		$in = 'pre <latex>inner</latex> post';
		$out = $this->compile->callArgs([$in, []]);

		Assert::same('pre $inner$ post', $out);
	}

	public function testColorAroundLatex()
	{
		$in = 'pretext <color id="1">pre <latex>latex</latex> post</color> posttext';
		$out = $this->compile->callArgs([$in, []]);

		Assert::same('pretext <span class="color-1">pre </span>${\color[RGB]{78,205,196}latex}$<span class="color-1"> post</span> posttext', $out);
	}

	public function testEval()
	{
		$in = 'pre <eval>a</eval> mid <eval>b</eval> post';
		$out = $this->compile->callArgs([$in, [
			'a' => 'foo',
			'b' => 21
		]]);

		Assert::same('pre foo mid 21 post', $out);
	}

	public function testEvalMath()
	{
		$in = '<eval>(a - b) * c</eval>';
		$out = $this->compile->callArgs([$in, [
			'a' => $a = 3.5,
			'b' => $b = 5,
			'c' => $c = 4,
		]]);

		Assert::same(($a - $b) * $c, (float) $out);
	}

	public function testNested()
	{
		$in = 'A<color id="1">B<latex>C <eval>(a - b) * c</eval> D</latex>E</color>F';
		$out = $this->compile->callArgs([$in, [
			'a' => $a = 3.5,
			'b' => $b = 5,
			'c' => $c = 4,
		]]);

		Assert::same('A<span class="color-1">B</span>${\color[RGB]{78,205,196}C -6 D}$<span class="color-1">E</span>F', $out);
	}

}

runTests(__FILE__, $container);
