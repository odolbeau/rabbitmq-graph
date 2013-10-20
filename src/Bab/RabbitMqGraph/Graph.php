<?php
/*
 * This file is part of Bab RabbitMqGraph
 * (c) Olivier Dolbeau <odolbeau@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bab\RabbitMqGraph;

use Alom\Graphviz\Digraph;

class Graph extends Digraph
{
    protected $definitions;

    protected $subGraphs = array();

    public function __construct($id, array $definitions)
    {
        parent::__construct($id);
        $this->definitions = $definitions;
    }

    /**
     * {@inheritDoc}
     */
    public function render($indent = 0, $spaces = self::DEFAULT_INDENT)
    {
        $cluster=0;
        foreach ($this->definitions['vhosts'] as $vhost) {
            $this->append(new Subgraph(
                "cluster_$cluster",
                $this,
                $vhost['name'],
                $this->definitions
            ));

            $cluster++;
        }

        return parent::render($indent, $spaces);
    }
}
