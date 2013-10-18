<?php

namespace Bab\RabbitMqGraph\Tests;

use Bab\RabbitMqGraph\Graph;

class GraphTest extends \PHPUnit_Framework_TestCase
{
    public function testRender_withBasicInformations_returnDigraph()
    {
        $definitions = array();
        $graph = new Graph($definitions);

        $this->assertInstanceOf('Alom\Graphviz\Digraph', $graph);
    }
}
