<?php

namespace Webiny\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class AppInstaller extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
        echo "\n\n------".$package->getPrettyName()."------\n\n";
        return 'Apps/' . $package->getPrettyName();
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'webiny-app' === $packageType;
    }
}