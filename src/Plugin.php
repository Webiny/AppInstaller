<?php

namespace Webiny\AppInstaller;

use Composer\Composer;
use Composer\Installer\PackageEvent;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class Plugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new Installer($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }

    public static function getSubscribedEvents()
    {
        // SEE EVENT NAMES: https://getcomposer.org/doc/articles/scripts.md#event-names
        return [
            'post-package-install' => [
                ['postPackageInstall']
            ],
            'post-package-update'  => []
        ];
    }

    public function postPackageInstall(PackageEvent $event)
    {
        $installedPackage = $event->getOperation()->getPackage();
        print_r($installedPackage);
    }
}