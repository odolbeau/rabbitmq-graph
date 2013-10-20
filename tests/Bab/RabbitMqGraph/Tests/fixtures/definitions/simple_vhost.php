<?php
/*
 * This file is part of Bab RabbitMqGraph
 * (c) Olivier Dolbeau <odolbeau@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return array (
    'rabbit_version' => '3.1.5',
    'users' => array (
        array (
            'name'          => 'guest',
            'password_hash' => 'B0imkU4kj9PZ9djlpt3XnZq/9go=',
            'tags'          => 'administrator',
        ),
    ),
    'vhosts' => array (
        array (
            'name' => '/',
        ),
    ),
    'permissions' => array (
        array (
            'user' => 'guest',
            'vhost' => '/',
            'configure' => '.*',
            'write' => '.*',
            'read' => '.*',
        ),
    ),
    'parameters' => array (
    ),
    'policies' => array (
    ),
    'queues' => array (
        array (
            'name'        => 'global_dl',
            'vhost'       => '/',
            'durable'     => true,
            'auto_delete' => false,
            'arguments'   => array (
            ),
        ),
        array (
            'name'        => 'global',
            'vhost'       => '/',
            'durable'     => true,
            'auto_delete' => false,
            'arguments'   => array (
                'x-dead-letter-exchange'    => 'dl',
                'x-dead-letter-routing-key' => 'global',
            ),
        ),
    ),
    'exchanges' => array (
        array (
            'name'        => 'global',
            'vhost'       => '/',
            'type'        => 'direct',
            'durable'     => true,
            'auto_delete' => false,
            'internal'    => false,
            'arguments'   => array (
                'alternate-exchange' => 'unroutable',
            ),
        ),
        array (
            'name'        => 'dl',
            'vhost'       => '/',
            'type'        => 'direct',
            'durable'     => true,
            'auto_delete' => false,
            'internal'    => false,
            'arguments'   => array (
            ),
        ),
    ),
    'bindings' => array (
        array (
            'source'           => 'dl',
            'vhost'            => '/',
            'destination'      => 'bi_dl',
            'destination_type' => 'queue',
            'routing_key'      => 'bi',
            'arguments'        => array (
            ),
        ),
        array (
            'source'           => 'dl',
            'vhost'            => '/',
            'destination'      => 'global_dl',
            'destination_type' => 'queue',
            'routing_key'      => 'global',
            'arguments'        => array (
            ),
        ),
        array (
            'source'           => 'global',
            'vhost'            => '/',
            'destination'      => 'global',
            'destination_type' => 'queue',
            'routing_key'      => 'global',
            'arguments'        => array (
            ),
        ),
    ),
);
