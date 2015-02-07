<?php

namespace App\Models\Services\Consumers;

use App\Models\Orm\RepositoryContainer;
use App\Models\Structs\EntityPointer;
use Kdyby\RabbitMq\IConsumer;
use PhpAmqpLib\Message\AMQPMessage;


abstract class Consumer implements IConsumer
{

	/**
	 * @var RepositoryContainer
	 */
	protected $orm;

	public function __construct(RepositoryContainer $orm)
	{
		$this->orm = $orm;
	}

	final public function process(AMQPMessage $msg)
	{
echo static::class . "\n";
		$raw = unserialize($msg->body);
		foreach ($raw as &$val)
		{
			if ($val instanceof EntityPointer)
			{
				$val = $val->resolve($this->orm);
			}
		}
		$this->invoke($raw);
	}

	abstract public function invoke(array $args);

}
