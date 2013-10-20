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
            'name' => 'events',
        ),
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
        array (
            'user' => 'guest',
            'vhost' => 'events',
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
            'name'        => 'user_ip_dl',
            'vhost'       => 'events',
            'durable'     => true,
            'auto_delete' => false,
            'arguments'   => array (
            ),
        ),
        array (
            'name'        => 'user_ip',
            'vhost'       => 'events',
            'durable'     => true,
            'auto_delete' => false,
            'arguments'   => array (
                'x-dead-letter-exchange'    => 'dl',
                'x-dead-letter-routing-key' => 'user_ip',
            ),
        ),
        array (
            'name'        => 'user_action_dl',
            'vhost'       => 'events',
            'durable'     => true,
            'auto_delete' => false,
            'arguments'   => array (
            ),
        ),
        array (
            'name'        => 'user_action',
            'vhost'       => 'events',
            'durable'     => true,
            'auto_delete' => false,
            'arguments'   => array (
                'x-dead-letter-exchange'    => 'dl',
                'x-dead-letter-routing-key' => 'user_action',
            ),
        ),
        array (
            'name'        => 'sms',
            'vhost'       => '/',
            'durable'     => true,
            'auto_delete' => false,
            'arguments'   => array (
                'x-dead-letter-exchange'    => 'dl',
                'x-dead-letter-routing-key' => 'sms',
            ),
        ),
        array (
            'name'        => 'mails',
            'vhost'       => '/',
            'durable'     => true,
            'auto_delete' => false,
            'arguments'   => array (
                'x-dead-letter-exchange'    => 'dl',
                'x-dead-letter-routing-key' => 'mails',
            ),
        ),
        array (
            'name'        => 'mails_dl',
            'vhost'       => '/',
            'durable'     => true,
            'auto_delete' => false,
            'arguments'   => array (
            ),
        ),
        array (
            'name'        => 'es_local',
            'vhost'       => '/',
            'durable'     => true,
            'auto_delete' => false,
            'arguments'   => array (
                'x-dead-letter-exchange'    => 'dl',
                'x-dead-letter-routing-key' => 'es_local',
            ),
        ),
        array (
            'name'        => 'indexer',
            'vhost'       => '/',
            'durable'     => true,
            'auto_delete' => false,
            'arguments'   => array (
                'x-dead-letter-exchange'    => 'dl',
                'x-dead-letter-routing-key' => 'indexer',
            ),
        ),
        array (
            'name'        => 'bi_dl',
            'vhost'       => '/',
            'durable'     => true,
            'auto_delete' => false,
            'arguments'   => array (
            ),
        ),
        array (
            'name'        => 'bi',
            'vhost'       => '/',
            'durable'     => true,
            'auto_delete' => false,
            'arguments'   => array (
                'x-dead-letter-exchange'    => 'dl',
                'x-dead-letter-routing-key' => 'bi',
            ),
        ),
        array (
            'name'        => 'global_dl',
            'vhost'       => '/',
            'durable'     => true,
            'auto_delete' => false,
            'arguments'   => array (
            ),
        ),
        array (
            'name'        => 'indexer_dl',
            'vhost'       => '/',
            'durable'     => true,
            'auto_delete' => false,
            'arguments'   => array (
            ),
        ),
        array (
            'name'        => 'tripfixer_dl',
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
        array (
            'name'        => 'tripfixer',
            'vhost'       => '/',
            'durable'     => true,
            'auto_delete' => false,
            'arguments'   => array (
                'x-dead-letter-exchange'    => 'dl',
                'x-dead-letter-routing-key' => 'tripfixer',
            ),
        ),
        array (
            'name'        => 'sms_dl',
            'vhost'       => '/',
            'durable'     => true,
            'auto_delete' => false,
            'arguments'   => array (
            ),
        ),
        array (
            'name'        => 'unroutable',
            'vhost'       => '/',
            'durable'     => true,
            'auto_delete' => false,
            'arguments'   => array (
            ),
        ),
        array (
            'name'        => 'es_local_dl',
            'vhost'       => '/',
            'durable'     => true,
            'auto_delete' => false,
            'arguments'   => array (
            ),
        ),
    ),
    'exchanges' => array (
        array (
            'name'        => 'user',
            'vhost'       => 'events',
            'type'        => 'topic',
            'durable'     => true,
            'auto_delete' => false,
            'internal'    => false,
            'arguments'   => array (
            ),
        ),
        array (
            'name'        => 'dl',
            'vhost'       => 'events',
            'type'        => 'direct',
            'durable'     => true,
            'auto_delete' => false,
            'internal'    => false,
            'arguments'   => array (
            ),
        ),
        array (
            'name'        => 'mails',
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
            'name'        => 'unroutable',
            'vhost'       => '/',
            'type'        => 'fanout',
            'durable'     => true,
            'auto_delete' => false,
            'internal'    => false,
            'arguments'   => array (
            ),
        ),
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
            'name'        => 'tripfixer',
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
        array (
            'name'        => 'bi',
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
            'name'        => 'indexer',
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
            'name'        => 'es_local',
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
            'name'        => 'sms',
            'vhost'       => '/',
            'type'        => 'direct',
            'durable'     => true,
            'auto_delete' => false,
            'internal'    => false,
            'arguments'   => array (
                'alternate-exchange' => 'unroutable',
            ),
        ),
    ),
    'bindings' => array (
        array (
            'source'           => 'dl',
            'vhost'            => 'events',
            'destination'      => 'user_action_dl',
            'destination_type' => 'queue',
            'routing_key'      => 'user_action',
            'arguments'        => array (
            ),
        ),
        array (
            'source'           => 'dl',
            'vhost'            => 'events',
            'destination'      => 'user_ip_dl',
            'destination_type' => 'queue',
            'routing_key'      => 'user_ip',
            'arguments'        => array (
            ),
        ),
        array (
            'source'           => 'user',
            'vhost'            => 'events',
            'destination'      => 'user_ip',
            'destination_type' => 'queue',
            'routing_key'      => '*',
            'arguments'        => array (
            ),
        ),
        array (
            'source'           => 'user',
            'vhost'            => 'events',
            'destination'      => 'user_action',
            'destination_type' => 'queue',
            'routing_key'      => 'create_message_private',
            'arguments'        => array (
            ),
        ),
        array (
            'source'           => 'user',
            'vhost'            => 'events',
            'destination'      => 'user_action',
            'destination_type' => 'queue',
            'routing_key'      => 'create_message_public_driver',
            'arguments'        => array (
            ),
        ),
        array (
            'source'           => 'bi',
            'vhost'            => '/',
            'destination'      => 'bi',
            'destination_type' => 'queue',
            'routing_key'      => 'bi',
            'arguments'        => array (
            ),
        ),
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
            'destination'      => 'es_local_dl',
            'destination_type' => 'queue',
            'routing_key'      => 'es_local',
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
            'source'           => 'dl',
            'vhost'            => '/',
            'destination'      => 'indexer_dl',
            'destination_type' => 'queue',
            'routing_key'      => 'indexer',
            'arguments'        => array (
            ),
        ),
        array (
            'source'           => 'dl',
            'vhost'            => '/',
            'destination'      => 'mails_dl',
            'destination_type' => 'queue',
            'routing_key'      => 'mails',
            'arguments'        => array (
            ),
        ),
        array (
            'source'           => 'dl',
            'vhost'            => '/',
            'destination'      => 'sms_dl',
            'destination_type' => 'queue',
            'routing_key'      => 'sms',
            'arguments'        => array (
            ),
        ),
        array (
            'source'           => 'dl',
            'vhost'            => '/',
            'destination'      => 'tripfixer_dl',
            'destination_type' => 'queue',
            'routing_key'      => 'tripfixer',
            'arguments'        => array (
            ),
        ),
        array (
            'source'           => 'es_local',
            'vhost'            => '/',
            'destination'      => 'es_local',
            'destination_type' => 'queue',
            'routing_key'      => 'es_local',
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
        array (
            'source'           => 'indexer',
            'vhost'            => '/',
            'destination'      => 'indexer',
            'destination_type' => 'queue',
            'routing_key'      => 'indexer',
            'arguments'        => array (
            ),
        ),
        array (
            'source'           => 'mails',
            'vhost'            => '/',
            'destination'      => 'mails',
            'destination_type' => 'queue',
            'routing_key'      => 'mails',
            'arguments'        => array (
            ),
        ),
        array (
            'source'           => 'sms',
            'vhost'            => '/',
            'destination'      => 'sms',
            'destination_type' => 'queue',
            'routing_key'      => 'sms',
            'arguments'        => array (
            ),
        ),
        array (
            'source'           => 'tripfixer',
            'vhost'            => '/',
            'destination'      => 'tripfixer',
            'destination_type' => 'queue',
            'routing_key'      => 'tripfixer',
            'arguments'        => array (
            ),
        ),
        array (
            'source'           => 'unroutable',
            'vhost'            => '/',
            'destination'      => 'unroutable',
            'destination_type' => 'queue',
            'routing_key'      => '',
            'arguments'        => array (
            ),
        ),
    ),
);
