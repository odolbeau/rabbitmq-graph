<?php
/*
 * This file is part of Bab RabbitMqGraph
 * (c) Olivier Dolbeau <odolbeau@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once __DIR__ . '/../vendor/autoload.php';

$client = new Bab\RabbitMqGraph\Client();
$definitions = $client->getDefinitions();
$graph = new Bab\RabbitMqGraph\Graph('G', $definitions, array(
    'vhost' => '/'
));

echo $graph->render();
