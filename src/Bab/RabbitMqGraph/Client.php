<?php
/*
 * This file is part of Bab RabbitMqGraph
 * (c) Olivier Dolbeau <odolbeau@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bab\RabbitMqGraph;

class Client
{
    protected $host;
    protected $port;
    protected $user;
    protected $password;

    public function __construct($host = '127.0.0.1', $port = 15672, $user = 'guest', $password = 'guest')
    {
        $this->host     = $host;
        $this->port     = $port;
        $this->user     = $user;
        $this->password = $password;
    }

    /**
     * getDefinitions
     *
     * @return array
     */
    public function getDefinitions()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_USERPWD, sprintf('%s:%s', $this->user, $this->password));
        curl_setopt($curl, CURLOPT_HEADER, "content-type:application/json");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, sprintf('%s:%s/api/definitions', $this->host, $this->port));

        $definitions = json_decode(curl_exec($curl), true);

        curl_close($curl);

        return $definitions;
    }
}
