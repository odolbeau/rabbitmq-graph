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
use Bab\RabbitMqGraph\Exception\UnknownVhostException;

class Graph extends Digraph
{
    protected $definitions;
    protected $options;

    protected $subGraphs = array();

    public function __construct($id, array $definitions, array $options = array())
    {
        parent::__construct($id);

        $this->definitions = $definitions;
        $this->options     = $options;
    }

    /**
     * {@inheritDoc}
     */
    public function render($indent = 0, $spaces = self::DEFAULT_INDENT)
    {
        // Only one vhost asked ?
        if (isset($this->options['vhost'])) {
            $this->buildVhost($this->options['vhost']);

            return parent::render($indent, $spaces);
        }

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

    /**
     * buildVhost
     *
     * @param string $vhost
     *
     * @return void
     */
    protected function buildVhost($vhost)
    {
        $vhosts = $this->definitions['vhosts'];
        array_walk($vhosts, function (&$value, $key) {
            $value = $value['name'];
        });

        if (!in_array($vhost, $vhosts)) {
            throw new UnknownVhostException(sprintf(
                'Unknown vhost "%s". Available: [%s]',
                $vhost,
                implode(', ', $vhosts)
            ));
        }

        $this->append(new Subgraph(
            "cluster_0",
            $this,
            $vhost,
            $this->definitions
        ));
    }
}
