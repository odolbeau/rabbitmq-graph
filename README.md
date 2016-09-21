# Bab RabbitMqGraph - Represent your RabbitMQ as a graph

[![Build Status](https://travis-ci.org/odolbeau/rabbitmq-graph.png)](https://travis-ci.org/odolbeau/rabbitmq-graph)

## Installation

You need to have `graphviz` installed locally.
To install dependency, run `composer install`.

## Usage

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

# One line
php samples/00-basic.php > target/graph.dot && dot -Tpng -otarget/graph.png target/graph.dot && open target/graph.png
```

For more information about the DOT command, please see the
[Man page](http://www.graphviz.org/cgi-bin/man?dot)

# Author

Olivier Dolbeau - <odolbeau@gmail.com> - <http://odolbeau.fr><br />

# License

This project is licensed under the MIT License - see the `LICENSE` file for
details.
