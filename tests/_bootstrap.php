<?php
// This is global bootstrap for autoloading

$fuel = realpath(__DIR__ . '/../../../..');
$package = null;

if ($travis = getenv('TRAVIS'))
{
	$fuel = '/tmp/fuel';
	$package = getenv('TRAVIS_BUILD_DIR').'/';
}

$_SERVER['doc_root']     = $fuel;
$_SERVER['app_path']     = $fuel . '/fuel/app';
$_SERVER['core_path']    = $fuel . '/fuel/core';
$_SERVER['package_path'] = $fuel . '/fuel/packages';
$_SERVER['vendor_path']  = $fuel . '/fuel/vendor';

require_once $_SERVER['core_path'] . '/bootstrap_phpunit.php';

\Package::load('sms', $package);
\Composer::package('sms');