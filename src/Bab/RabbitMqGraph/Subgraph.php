<?php
/*
 * This file is part of Bab RabbitMqGraph
 * (c) Olivier Dolbeau <odolbeau@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bab\RabbitMqGraph;

use Alom\Graphviz\Subgraph as BaseSubgraph;

class Subgraph extends BaseSubgraph
{
    protected $name;
    protected $definitions;

    public function __construct($id, $parent, $name, $definitions)
    {
        parent::__construct($id, $parent);
        $this->name = $name;
        $this->definitions = $definitions;
    }

    /**
     * {@inheritDoc}
     */
    public function render($indent = 0, $spaces = self::DEFAULT_INDENT)
    {
        $this
            ->set('style', 'filled')
            ->set('color', 'lightgrey')
            ->set('label', str_replace('/', 'default', $this->name))
            ;

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
            if ($this->name !== $binding['vhost']) {
                continue;
            }

            $bindingKey = $this->getBindingKey($binding['source'], $binding['routing_key']);
            if (!in_array($bindingKey, $bindingKeys)) {
                $this->node($bindingKey, array(
                    'style' => 'filled',
                    'color' => 'yellow',
                    'label' => $binding['routing_key']
                ));
                $bindingKeys[] = $bindingKey;
            }
            $source = $this->getExchangeKey($binding['source']);
            if ('queue' === $binding['destination_type']) {
                $destination = $this->getQueueKey($binding['destination']);
            } else {
                $destination = $this->getExchangeKey($binding['destination']);
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
            if ($this->name !== $queue['vhost']) {
                continue;
            }

            $key = $this->getQueueKey($queue['name']);

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
            if ($this->name !== $exchange['vhost']) {
                continue;
            }

            $key = $this->getExchangeKey($exchange['name']);

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
     * @param string $name
     *
     * @return string
     */
    protected function getQueueKey($name)
    {
        return sprintf('q:%s:%s', $this->id, $name);
    }

    /**
     * getExchangeKey
     *
     * @param string $name
     *
     * @return string
     */
    protected function getExchangeKey($name)
    {
        return sprintf('e:%s:%s', $this->id, $name);
    }

    /**
     * getBindingKey
     *
     * @param string $source
     * @param string $routingKey
     *
     * @return string
     */
    protected function getBindingKey($source, $routingKey)
    {
        return sprintf('b:%s:%s:%s', $this->id, $source, $routingKey);
    }
}
