<?php

use CodeIgniter\Boot;
use Config\Paths;

/*
 *---------------------------------------------------------------
 * CHECK PHP VERSION
 *---------------------------------------------------------------
 */
$minPhpVersion = '8.1';
if (version_compare(PHP_VERSION, $minPhpVersion, '<')) {
    $message = sprintf(
        'Your PHP version must be %s or higher to run CodeIgniter. Current version: %s',
        $minPhpVersion,
        PHP_VERSION,
    );

    header('HTTP/1.1 503 Service Unavailable.', true, 503);
    echo $message;
    exit(1);
}

/*
 *---------------------------------------------------------------
 * SET THE CURRENT DIRECTORY
 *---------------------------------------------------------------
 */
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);
if (getcwd() . DIRECTORY_SEPARATOR !== FCPATH) {
    chdir(FCPATH);
}

/*
 *---------------------------------------------------------------
 * LOAD PATHS CONFIG
 *---------------------------------------------------------------
 */
require FCPATH . '../app/Config/Paths.php';
$paths = new Paths();

/*
 *---------------------------------------------------------------
 * COMPOSER AUTOLOAD & LOAD .env
 *---------------------------------------------------------------
 */
$rootPath = dirname(__DIR__); // ✅ gunakan ini
require_once $rootPath . '/vendor/autoload.php';

use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable($rootPath);
$dotenv->load();

/*
 *---------------------------------------------------------------
 * BOOT FRAMEWORK
 *---------------------------------------------------------------
 */
require $paths->systemDirectory . '/Boot.php';

exit(Boot::bootWeb($paths));
