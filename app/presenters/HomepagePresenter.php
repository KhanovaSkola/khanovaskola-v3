<?php

namespace App\Presenters;

use App\Components\GistRenderer;
use App\Rme\BlueprintCompiler;
use App\Rme\ExerciseBlueprint;


final class HomepagePresenter extends BasePresenter
{

	public function actionDefault()
	{
		$b = new ExerciseBlueprint();
		$b->defineInteger('a', 1, 10);
		$b->defineInteger('b', 11, 20);
		$b->defineList('name', ['Alex', 'John', 'Marco', 'Dan', 'George']);
		$b->definePlural('broskve', '{b-a}', 'broskev', 'broskve', 'broskví');

		$b->setQuestion('Kolik nasbírá {name} broskví $x$ pro rovnici ${a} + x = {b}$?');
		$b->setAnswer('{b - a}');

		$b->addHint('Osamostatníme $x$');
		$b->addHint('Převedeme {a} na pravou stranu rovnice: $x = {b} - {a}$');
		$b->addHint('$x = {b - a}$, {name} tedy nasbírá {b-a} {broskve}.');

		$compiler = new BlueprintCompiler();
//		$compiler->setSeed(1114283787);
		$exercise = $compiler->compile($b);
		dump($exercise);
		die;

		$this->template->video = $this->orm->videos->getById(3);

		$gist = $this->orm->gists->getByName('test');
		/** @var GistRenderer $gistRenderer */
		$gistRenderer = $this['gist'];
		$gistRenderer->setEditable(TRUE);
		$gistRenderer->setGist($gist);
	}

}
