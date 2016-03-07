<?php

namespace Webiny\Composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class AppInstallerPlugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new AppInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}