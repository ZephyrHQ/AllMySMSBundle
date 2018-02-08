<?php

namespace ZephyrHQ\AllMySMSBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * LexikJWTAuthenticationBundle Configuration.
 */
class Configuration implements ConfigurationInterface
{
    const INVALID_KEY_PATH = "The file %s doesn't exist or is not readable.\nIf the configured encoder doesn't need this to be configured, please don't set this option or leave it null.";

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode    = $treeBuilder->root('zephyrhq_allmysms');

        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->scalarNode('api_login')
                    ->defaultNull()
                ->end()
                ->scalarNode('api_key')
                    ->defaultNull()
                ->end()
                ->scalarNode('simulate')
                    ->defaultNull()
                ->end()
                ->scalarNode('simple_sms')
                    ->defaultNull()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
