<?php
/*
 * This file is part of Bab RabbitMqGraph
 * (c) Olivier Dolbeau <odolbeau@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bab\RabbitMqGraph\Tests;

use Bab\RabbitMqGraph\Graph;

class GraphTest extends \PHPUnit_Framework_TestCase
{
    public function casesProvider()
    {
        return array(
            array('simple_vhost'),
            array('multiple_vhosts'),
        );
    }

    /**
     * @dataProvider casesProvider
     */
    public function testRenderFromProvider($case)
    {
        $definitions = require __DIR__ . '/fixtures/definitions/'.$case.'.php';
        $dotContent = file_get_contents(__DIR__ . '/fixtures/dot_files/'.$case.'.dot');

        $graph = new Graph('G', $definitions);
        $result = $graph->render();

        $this->assertEquals($result, $dotContent);
    }
}
