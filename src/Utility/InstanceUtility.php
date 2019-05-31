<?php

namespace SourceBroker\DeployerExtendedDatabase\Utility;

use Symfony\Component\Dotenv\Dotenv;

/**
 * Class InstanceUtility
 * @package SourceBroker\DeployerExtendedDatabase\Utility
 */
class InstanceUtility
{
    public function getCurrentInstance()
    {
        if (getenv('INSTANCE') === false && getenv('INSTANCE_DEPLOYER') === false) {
            $envFilePath = getcwd() . '/.env';
            if (file_exists($envFilePath)) {
                (new Dotenv(true))->load($envFilePath);
            } else {
                throw new \Exception('Missing file "' . $envFilePath . '"', 1500717945887);
            }
        }
        if (getenv('INSTANCE') === false && getenv('INSTANCE_DEPLOYER') === false) {
            throw new \Exception('Neither env var INSTANCE or INSTANCE_DEPLOYER is set. Please
            set one of them with the name of INSTANCE which should corenspond to server() name.', 1500717953824);
        }
        return getenv('INSTANCE') === false ? getenv('INSTANCE_DEPLOYER') : getenv('INSTANCE');
    }
}
