<?php

namespace ZephyrHQ\AllMySMSBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use ZephyrHQ\Provider\AllMySMSProvider;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class ZephyrHQAllMySMSExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config        = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $container->setParameter('zephyr_allmysms.simulate', $config['simulate']);
        $container->setParameter('zephyr_allmysms.simple_sms', $config['simple_sms']);

        $container
            ->getDefinition('zephyr_allmysms.manager')
            ->replaceArgument(0, $config['api_login'])
            ->replaceArgument(1, $config['api_key'])
        ;

        // Support for autowiring in symfony < 3.3
        if (!method_exists($container, 'fileExists')) {
            $this->registerAutowiringTypes($container);
        }
    }

    private static function registerAutowiringTypes(ContainerBuilder $container)
    {
        $container
            ->findDefinition('zephyr_allmysms.provider')
            ->addAutowiringType(AllMySMSProvider::class);
    }

    public function getAlias()
    {
        return 'zephyrhq_allmysms';
    }
}
