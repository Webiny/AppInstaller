<?php

namespace Webiny\AppInstaller;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class Installer extends LibraryInstaller
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