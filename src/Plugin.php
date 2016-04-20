<?php

namespace Webiny\AppInstaller;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class Plugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new Installer($io, $composer);
        $setup = new Setup($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
        $composer->getInstallationManager()->addInstaller($setup);
    }
}