<?php

require __DIR__.'/vendor/autoload.php';

use Sami\RemoteRepository\GitHubRemoteRepository;
use Sami\Sami;
use Sami\Version\GitVersionCollection;
use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->exclude('stubs')
    ->in($dir = __DIR__.'/app');

$versions = GitVersionCollection::create($dir)
//    ->add('4.2', 'Laravel 4.2')
//    ->add('5.0', 'Laravel 5.0')
//    ->add('5.1', 'Laravel 5.1')
//    ->add('5.2', 'Laravel 5.2')
    ->add('master', 'Laravel Dev');

return new Sami($iterator, [
    'title'                => 'AutoCoinTrader API',
    'versions'             => $versions,
    'build_dir'            => __DIR__.'/build/%version%',
    'cache_dir'            => __DIR__.'/cache/%version%',
    'default_opened_level' => 2,
    'remote_repository'    => new GitHubRemoteRepository('Germangalia/CoinAutoTrader', dirname($dir)),
]);
