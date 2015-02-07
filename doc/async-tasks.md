Asynchronous tasks
==================

Time consuming calls such as sending emails, recompiling schema layouts etc. should
not be done during the main request as users would have to wait numerous seconds
until the page loads. Instead, those tasks should be separated into async tasks.

This is implemented with `kdyby/rabbitmq` library.

Enqueue new task
----------------

- Inject instance of `Kdyby\RabbitMq\Connection` to your class

```php
use Kdyby\RabbitMq\Connection;

/// ...
class Foo
{
	/**
	 * @var Connection
	 * @inject
	 */
	public $queue;

	// ...
```

- In the method you want to enqueue the task, publish a message on producer:

```ppp
$producer = $this->queue->getProducer('myProducer');
$producer->publish(serialize([
	'my-argument' => 'my-argument-value',
	'passing-entity' => new EntityPointer($user),
]));
```

Note that entities must be passed as `EntityPointer`.

- Register the producer `myProducer` in `config.neon`:

```yaml
rabbitmq:
	producers:
		myProducer:
			connection: default
			exchange: {name: 'my-producer', type: direct}
```

Consume the task
----------------

- Create new class inheriting from `App\Models\Services\Consumers\Consumer`
- Implement `public function invoke(array $args)`
- Register your service under as:

```yaml
services:
	- App\Models\Services\Consumers\MyConsumer
```

- Register your consumer in `config.neon` as:

```yaml
rabbitmq:
	consumers:
		myConsumer:
			connection: default
			exchange: {name: 'my-consumer', type: direct}
			queue: {name: 'my-consumer'}
			callback: [@App\Models\Services\Consumers\MyConsumer, process]
```

Add the consumer to worker
--------------------------

**Otherwise the consumer won't be run on server!**

- Add the following line to `production/worker.sh`

```bash
timeout --signal=TERM 58 php www/index.php ra:con myConsumer &
```
