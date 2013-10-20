Bab RabbitMqGraph - Represent your RabbitMQ as a graph
======================================================

Usage
-----

This library allow you to create Dot Graph from your RabbitMQ definitions:

```php
$client = new Bab\RabbitMqGraph\Client();
$definitions = $client->getDefinitions();
$graph = new Bab\RabbitMqGraph\Graph($definitions);

echo $graph->render();
```

To render the graph (in png for example):

```bash
php samples/00-basic.php > target/graph.dot
dot -Tpng -otarget/graph.png target/graph.dot
```

For more information about the DOT command, please see the
[Man page](http://www.graphviz.org/cgi-bin/man?dot)

Requirements
------------

- PHP 5.3
- [optional] PHPUnit 3.5+ to execute test suite

Author
------

Olivier Dolbeau - <odolbeau@gmail.com> - <http://odolbeau.fr><br />

License
-------

Bab RabbitMqGraph is licensed under the MIT License - see the `LICENSE` file
for details
