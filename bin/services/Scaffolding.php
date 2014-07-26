<?php

namespace Bin\Services;

use App\InvalidStateException;
use Inflect\Inflect;
use Latte\Engine;
use Nette\Object;
use Nette\Utils\Strings;


class Scaffolding extends Object
{

	/**
	 * @var string path
	 */
	protected $appDir;

	public function __construct($appDir)
	{
		$this->appDir = $appDir;
	}

	public function createEntity($singularName, array $params)
	{
		$pluralName = Inflect::pluralize($singularName);
		$path = $this->getRmePath($pluralName) . "/$singularName.php";

		$usings = ['App\Models\Orm\Entity'];
		foreach ($params as $param)
		{
			if ($param === 'DateTime')
			{
				$usings[] = 'DateTime';
			}
		}
		sort($usings);

		$this->buildPhpFromTemplate($path, 'rme_entity', [
			'class' => $singularName,
			'properties' => $params,
			'usings' => $usings,
		]);
		return $path;
	}

	public function createRepository($singularName)
	{
		$name = Inflect::pluralize($singularName);
		$class = "{$name}Repository";
		$path =  $this->getRmePath($name) . "/$class.php";
		$this->buildPhpFromTemplate($path, 'rme_repository', [
			'class' => $class,
			'entity' => $singularName,
		]);
		return $path;
	}

	public function createMapper($singularName)
	{
		$name = Inflect::pluralize($singularName);
		$class = "{$name}Mapper";
		$path =  $this->getRmePath($name) . "/$class.php";
		$this->buildPhpFromTemplate($path, 'rme_mapper', [
			'class' => $class,
		]);
		return $path;
	}

	protected function buildPhpFromTemplate($file, $template, $args = [])
	{
		$this->buildFileFromTemplate($file, $template, $args, "<?php\n\n");
	}

	protected function buildFileFromTemplate($file, $template, $args = [], $prefix = '')
	{
		if (is_file($file))
		{
			throw new InvalidStateException("File '$file' already exists");
		}

		$dir = dirname($file);
		if (!is_dir($dir))
		{
			mkdir($dir);
		}

		$latte = new Engine();
		$content = $prefix . $latte->renderToString(__DIR__ . "/../scaffolds/$template.latte", $args);
		file_put_contents($file, $content);
	}

	protected function getRmePath($pluralName)
	{
		return "$this->appDir/models/rme/$pluralName";
	}

	protected function getUnitTestPath()
	{
		return "$this->appDir/../tests/cases/unit";
	}

	protected function getMigrationPath()
	{
		return "$this->appDir/../migrations/struct";
	}

	public function createUnitTest($name)
	{
		$name = ucFirst($name);
		$class = "{$name}Test";
		$path =  $this->getUnitTestPath() . "/$class.phpt";
		$this->buildPhpFromTemplate($path, 'test_unit', [
			'class' => $class,
		]);
		return $path;
	}

	private function getMigrationFile($name, $postfix = NULL)
	{
		if ($postfix)
		{
			$postfix = '-' . Strings::webalize(Strings::truncate($postfix, 30));
		}

		return $this->getMigrationPath() . "/{$name}{$postfix}";
	}

	public function createPhpMigration($postfix = NULL)
	{
		$name = date('YmdHis');
		$path = $this->getMigrationFile($name, $postfix) . '.php';
		$this->buildPhpFromTemplate($path, 'migration_php', [
			'class' => "Migration$name",
			'note' => $postfix,
		]);
		return $path;
	}

	public function createSqlMigration($postfix = NULL)
	{
		$name = date('YmdHis');
		$path = $this->getMigrationFile($name, $postfix) . '.sql';
		file_put_contents($path, '');
		return $path;
	}

	/**
	 * Creates module if applicable
	 *
	 * @param string $name such as Homepage or Front:Homepage
	 * @return string presenter path
	 */
	public function createPresenter($name)
	{
		$parts = explode(':', $name);
		foreach ($parts as &$part)
		{
			$part = ucFirst($part);
		}
		$modules = $parts;
		$presenter = array_pop($modules);

		$presenterDir = "$this->appDir/presenters" . ($modules ? '/' . implode('/', $modules) : '');
		if (!is_dir($presenterDir))
		{
			mkdir($presenterDir, 0755, TRUE);
		}

		$presenterFile = "$presenterDir/$presenter.php";
		$this->buildPhpFromTemplate($presenterFile, 'rme_presenter', [
			'module' => $modules ? '\\' . implode('\\', $modules) : '',
			'class' => $presenter,
		]);

		return $presenterFile;
	}

	/**
	 * Creates module if applicable
	 *
	 * @param string $name such as Homepage or Front:Homepage
	 * @return string template path
	 */
	public function createDefaultView($name)
	{
		$parts = explode(':', $name);
		foreach ($parts as &$part)
		{
			$part = ucFirst($part);
		}

		$templateDir = "$this->appDir/templates/views/" . implode('/', $parts);
		if (!is_dir($templateDir))
		{
			mkdir($templateDir, 0755, TRUE);
		}

		$templateFile = "$templateDir/default.latte";
		$this->buildFileFromTemplate($templateFile, 'rme_view', [
			'name' => implode(':', $parts) . ":default",
		]);

		return $templateFile;
	}

}
