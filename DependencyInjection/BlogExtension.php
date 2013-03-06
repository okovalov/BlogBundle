<?php

namespace Desarrolla2\Bundle\BlogBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Definition;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class BlogExtension extends Extension {

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container) {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('blog.title', $config['title']);
        $container->setParameter('blog.description', $config['description']);
        $container->setParameter('blog.items', $config['items']);
        
        $container->setParameter('blog.archive.title', $config['archive']['title']);
        $container->setParameter('blog.archive.description', $config['archive']['description']);

        $container->setParameter('blog.rss.title', $config['rss']['title']);
        $container->setParameter('blog.rss.items', $config['rss']['items']);
        $container->setParameter('blog.rss.description', $config['rss']['description']);
        $container->setParameter('blog.rss.language', $config['rss']['language']);
        $container->setParameter('blog.rss.ttl', $config['rss']['ttl']);

        $container->setParameter('blog.sitemap.items', $config['sitemap']['items']);
        
        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('twig.xml');
        $loader->load('sanitizer.xml');
    }

}
