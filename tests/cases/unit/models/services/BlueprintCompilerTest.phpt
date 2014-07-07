<?php

namespace Tests\Cases\Unit;

use App\Models\Services\BlueprintCompiler;
use Nette;
use Tester;
use Tester\Assert;


$container = require __DIR__ . '/../../../../bootstrap.php';

class BlueprintCompilerTest extends Tester\TestCase
{

	/** @var BlueprintCompiler */
	private $compiler;

	/** @var \AccessMethod */
	private $compile;

	function __construct(Nette\DI\Container $container)
	{
		$this->compiler = $container->getByType(BlueprintCompiler::class);

		$this->compile = Access($this->compiler, 'compileString');
	}

	function testColorInText()
	{
		$in = 'pre <color id="1">inner</color> post';
		$out = $this->compile->callArgs([$in, []]);

		Assert::same('pre <span class="color-1">inner</span> post', $out);
	}

	function testColorInLatex()
	{
		$in = 'pretext <latex>pre <color id="1">inner</color> post</latex> posttext';
		$out = $this->compile->callArgs([$in, []]);

		Assert::same('pretext $pre {\color[RGB]{78,205,196}inner} post$ posttext', $out);
	}

	function testLatexSimple()
	{
		$in = 'pre <latex>inner</latex> post';
		$out = $this->compile->callArgs([$in, []]);

		Assert::same('pre $inner$ post', $out);
	}

	function testColorAroundLatex()
	{
		$in = 'pretext <color id="1">pre <latex>latex</latex> post</color> posttext';
		$out = $this->compile->callArgs([$in, []]);

		Assert::same('pretext <span class="color-1">pre </span>${\color[RGB]{78,205,196}latex}$<span class="color-1"> post</span> posttext', $out);
	}

	function testEval()
	{
		$in = 'pre <eval>a</eval> mid <eval>b</eval> post';
		$out = $this->compile->callArgs([$in, [
			'a' => 'foo',
			'b' => 21
		]]);

		Assert::same('pre foo mid 21 post', $out);
	}

	function testEvalMath()
	{
		$in = '<eval>(a - b) * c</eval>';
		$out = $this->compile->callArgs([$in, [
			'a' => $a = 3.5,
			'b' => $b = 5,
			'c' => $c = 4,
		]]);

		Assert::same(($a - $b) * $c, (float) $out);
	}

	function testNested()
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
