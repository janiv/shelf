<?php

namespace Shelf\V1;

use Shelf\Common\Version;

use Guzzle\Service\Client as ServiceClient;
use Guzzle\Service\Description\ServiceDescription;

/**
 * Client to connect to BGG's XML API 1
 */
class Client extends ServiceClient
{
    /**
     * Factory method to create the client, add the service description, and set
     * the user again
     *
     * @param array $config
     *
     * @return Client
     */
    public static function factory($config = array())
    {
        $client = new self();
        $description = ServiceDescription::factory(__DIR__ . '/Config/service.json');
        $client->setDescription($description);

        $client->setUserAgent('Shelf/' . Version::VERSION, true);
        return $client;
    }
}
