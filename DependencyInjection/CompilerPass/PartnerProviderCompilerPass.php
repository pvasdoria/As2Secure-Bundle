<?php

/**
 * Created by PhpStorm.
 * User: westin
 * Date: 3/15/2015
 * Time: 12:22 PM
 */

namespace TechData\AS2SecureBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;


/**
 * Class PartnerProviderCompilerPass
 *
 * @package TechData\AS2SecureBundle\DependencyInjection\CompilerPass
 */
class PartnerProviderCompilerPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        $partnerProviderResolver = $container->getDefinition('tech_data_as2_secure.partner_provider.resolver');
        foreach ($container->findTaggedServiceIds('tech_data_as2_partner') as $serviceId => $tags) {
            $partnerProviderResolver->addMethodCall(
                'add', [new Reference($serviceId)]
            );
        }
    }
}
