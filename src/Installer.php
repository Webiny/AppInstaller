<?php

namespace Webiny\AppInstaller;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;
use Composer\Repository\InstalledRepositoryInterface;

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

    public function install(InstalledRepositoryInterface $repo, PackageInterface $package)
    {
        parent::install($repo, $package);
    }

    public function uninstall(InstalledRepositoryInterface $repo, PackageInterface $package)
    {
        parent::uninstall($repo, $package);
    }


    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'webiny-app' === $packageType;
    }
}