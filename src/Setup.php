<?php

namespace Webiny\AppInstaller;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;
use Composer\Repository\InstalledRepositoryInterface;

class Setup extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'webiny-setup' === $packageType;
    }

    public function update(InstalledRepositoryInterface $repo, PackageInterface $initial, PackageInterface $target)
    {
        parent::update($repo, $initial, $target);
        exec('cp -f ' . $this->getInstallPath($target) . '/install/structure/gulpfile.js ./gulpfile.js');
        exec('cp -f ' . $this->getInstallPath($target) . '/install/structure/package.json ./package.json');
        exec('cp -R ' . $this->getInstallPath($target) . '/install/structure/gulp/* ./gulp');
    }
}