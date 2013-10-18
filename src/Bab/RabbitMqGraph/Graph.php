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

    public function __construct(array $definitions)
    {
        $this->definitions = $definitions;
    }

    /**
     * {@inheritDoc}
     */
    public function render($indent = 0, $spaces = self::DEFAULT_INDENT)
    {
        $this->build();

        return parent::render($indent, $spaces);
    }

    protected function build()
    {
    }
}
