<?php

namespace Tests\Cases\Unit;

use AccessMethod;
use App\BlueprintCompilerException;
use App\Models\Rme\Blueprint;
use App\Models\Services\BlueprintCompiler;
use App\Presenters\BlueprintEditor;
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
	private $compileString;

	/**
	 * @var AccessMethod
	 */
	private $compileVars;

	public function setUp()
	{
		$this->compileString = Access($this->compiler, 'compileString');
		$this->compileVars = Access($this->compiler, 'compileVars');
	}

	public function testColorInText()
	{
		$in = 'pre <color id="1">inner</color> post';
		$out = $this->compileString->callArgs([$in, []]);

		Assert::same('pre <span class="exercise-color-1">inner</span> post', $out);
	}

	public function testColorInLatex()
	{
		$in = 'pretext <latex>pre <color id="1">inner</color> post</latex> posttext';
		$out = $this->compileString->callArgs([$in, []]);

		Assert::same('pretext $pre {\color[RGB]{113,189,26}inner} post$ posttext', $out);
	}

	public function testLatexSimple()
	{
		$in = 'pre <latex>inner</latex> post';
		$out = $this->compileString->callArgs([$in, []]);

		Assert::same('pre $inner$ post', $out);
	}

	public function testColorAroundLatex()
	{
		$in = 'pretext <color id="1">pre <latex>latex</latex> post</color> posttext';
		$out = $this->compileString->callArgs([$in, []]);

		Assert::same('pretext <span class="exercise-color-1">pre </span>${\color[RGB]{113,189,26}latex}$<span class="exercise-color-1"> post</span> posttext', $out);
	}

	public function testEval()
	{
		$in = 'pre <eval>a</eval> mid <eval>b</eval> post';
		$out = $this->compileString->callArgs([$in, [
			'a' => 'foo',
			'b' => 21
		]]);

		Assert::same('pre foo mid 21 post', $out);
	}

	public function testEvalMath()
	{
		$in = '<eval>(a - b) * c</eval>';
		$out = $this->compileString->callArgs([$in, [
			'a' => $a = 3.5,
			'b' => $b = 5,
			'c' => $c = 4,
		]]);

		Assert::same(($a - $b) * $c, (float) $out);
	}

	public function testNested()
	{
		$in = 'A<color id="1">B<latex>C <eval>(a - b) * c</eval> D</latex>E</color>F';
		$out = $this->compileString->callArgs([$in, [
			'a' => $a = 3.5,
			'b' => $b = 5,
			'c' => $c = 4,
		]]);

		Assert::same('A<span class="exercise-color-1">B</span>${\color[RGB]{113,189,26}C -6 D}$<span class="exercise-color-1">E</span>F', $out);
	}

	public function testDependentVariable()
	{
		$exp = 10;
		$vars = [
			'a' => (object) [
				'type' => 'integer',
				'min' => $exp,
				'max' => $exp,
			],
			'b' => (object) [
				'type' => 'integer',
				'min' => '<eval>a</eval>',
				'max' => '<eval>a</eval>',
			]
		];
		$out = $this->compileVars->callArgs([$vars]);

		Assert::same($exp, $out['b']);
	}

	public function testDependentVariableUndefined()
	{
		$vars = [
			'a' => (object) [
				'type' => 'integer',
				'min' => '<eval>b</eval>',
				'max' => '<eval>b</eval>',
			],
			'b' => (object) [
				'type' => 'integer',
				'min' => 0,
				'max' => 0,
			]
		];

		Assert::exception(function() use ($vars) {
			$this->compileVars->callArgs([$vars]);

		}, BlueprintCompilerException::class);
	}

}

runTests(__FILE__, $container);
