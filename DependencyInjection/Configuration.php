<?php

/*
 * This file is part of the NzoS3AwsBundle package.
 *
 * (c) Ala Eddine Khefifi <alakhefifi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nzo\S3AwsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('nzo_s3_aws');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->scalarNode('aws_access_key')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('aws_secret')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('aws_region')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('aws_bucket')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('aws_endpoint')
                    ->defaultNull()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
