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
        $parts = explode('/', $package->getPrettyName());
        $appName = end($parts);
        $appName = str_replace(' ', '', ucwords(str_replace('-', ' ', $appName)));

        return 'Apps/' . $appName;
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'webiny-app' === $packageType;
    }
}