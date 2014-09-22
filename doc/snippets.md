How to do…
==========

Background task
---------------

Create new child of `Task` and enqueue it as:

```php
$task = new SendMailTask('test', 'mikulas@khanovaskola.cz', ['foo' => 'bar']);
$this->context->getService('queue')->enqueue($task);
```

Create learn path
-----------------

```php
$p = new Path();
$p->list = [
	$this->orm->videos->getById(1),
	$this->orm->videos->getById(3),
	$this->orm->videos->getById(2),
	$this->orm->videos->getById(5),
];
//
$this->orm->paths->attach($p);
$p->getRepository()->getMapper(); // HACK, events will be moved to repository
$this->orm->flush();
```
