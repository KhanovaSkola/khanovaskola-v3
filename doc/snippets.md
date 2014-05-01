How to do…
==========

Background task
---------------

Create new child of `Task` and enqueue it as:

```php
$task = new SendMailTask('test', 'mikulas@khanovaskola.cz', ['foo' => 'bar']);
$this->context->getService('queue')->enqueue($task);
```
