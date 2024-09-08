<?php
namespace DCO\HcaptchaTools;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\Traits\PackageVersionTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

class HcaptchaToolsBundle extends AbstractPimcoreBundle {
    use PackageVersionTrait;

    protected function getComposerPackageName(): string {
        return 'dc-o/pimcore-hcaptchatools';
    }

    public function getJsPaths(): array
    {
        return [];
    }

    public function getCssPaths(): array
    {
        return [];
    }

    public function build(ContainerBuilder $container)
    {

    }


    public function getInstaller(): ?\Pimcore\Extension\Bundle\Installer\InstallerInterface
    {
        return null;
    }

}
