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

    /**
     * build
     *
     * @return void
     */
    protected function build()
    {
        $queues = $this->buildQueues();
        $exchanges = $this->buildExchanges();

        $bindingKeys = array();
        foreach ($this->definitions['bindings'] as $binding) {
            $bindingKey = $this->getBindingKey($binding['vhost'], $binding['source'], $binding['routing_key']);
            if (!in_array($bindingKey, $bindingKeys)) {
                $this->node($bindingKey, array(
                    'style' => 'filled',
                    'color' => 'yellow',
                    'label' => $binding['routing_key']
                ));
                $bindingKeys[] = $bindingKey;
            }
            $source = $this->getExchangeKey($binding['vhost'], $binding['source']);
            if ('queue' === $binding['destination_type']) {
                $destination = $this->getQueueKey($binding['vhost'], $binding['destination']);
            } else {
                $destination = $this->getExchangeKey($binding['vhost'], $binding['destination']);
            }

            $this->edge(array($source, $bindingKey));
            $this->edge(array($bindingKey, $destination));
        }
    }

    /**
     * buildQueues
     *
     * @return array
     */
    protected function buildQueues()
    {
        $queues = array();
        foreach ($this->definitions['queues'] as $queue) {
            $key = $this->getQueueKey($queue['vhost'], $queue['name']);

            $queues[$key] = $queue;
            $this->node($key, array(
                'style' => 'filled',
                'label' => $queue['name'],
                'color' => 'green',
            ));
        }

        return $queues;
    }

    /**
     * buildExchanges
     *
     * @return array
     */
    protected function buildExchanges()
    {
        $exchanges = array();
        foreach ($this->definitions['exchanges'] as $exchange) {
            $key = $this->getExchangeKey($exchange['vhost'], $exchange['name']);

            $exchanges[$key] = $exchange;
            $this->node($key, array(
                'style' => 'filled',
                'label' => $exchange['name'],
                'color' => 'red',
            ));
        }

        return $exchanges;
    }

    /**
     * getQueueKey
     *
     * @param string $vhost
     * @param string $name
     *
     * @return string
     */
    protected function getQueueKey($vhost, $name)
    {
        return sprintf(
            'q:%s:%s',
            $vhost,
            $name
        );
    }

    /**
     * getExchangeKey
     *
     * @param string $vhost
     * @param string $name
     *
     * @return string
     */
    protected function getExchangeKey($vhost, $name)
    {
        return sprintf(
            'e:%s:%s',
            $vhost,
            $name
        );
    }

    /**
     * getBindingKey
     *
     * @param string $vhost
     * @param string $source
     * @param string $routingKey
     *
     * @return string
     */
    protected function getBindingKey($vhost, $source, $routingKey)
    {
        return sprintf(
            'b:%s:%s:%s',
            $vhost,
            $source,
            $routingKey
        );
    }
}
