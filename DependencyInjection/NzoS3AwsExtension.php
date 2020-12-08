<?php

/**
 * This file is part of the NzoS3AwsBundle package.
 *
 * (c) Ala Eddine Khefifi <alakhefifi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nzo\S3AwsBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class NzoS3AwsExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('nzo_s3_aws.aws_access_key', $config['aws_access_key']);
        $container->setParameter('nzo_s3_aws.aws_secret', $config['aws_secret']);
        $container->setParameter('nzo_s3_aws.aws_region', $config['aws_region']);
        $container->setParameter('nzo_s3_aws.aws_bucket', $config['aws_bucket']);
        $container->setParameter('nzo_s3_aws.aws_endpoint', $config['aws_endpoint']);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }

}
