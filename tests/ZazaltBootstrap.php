<?php

namespace Zazalt\Chronos\Tests;

// Set timezone
date_default_timezone_set('UTC');

// Prevent session cookies
ini_set('session.use_cookies', 0);

// Enable Composer autoloader
$autoloader = require dirname(__DIR__) . '/vendor/autoload.php';

// Register test classes
$autoloader->addPsr4('Zazalt\Chronos\Tests\\', __DIR__);

class ZazaltTest extends \PHPUnit_Framework_TestCase
{
    public function loader($what, $params = null)
    {
        $testedClassName    = str_replace('Test', '', substr(strrchr($what, "\\"), 1));
        $testedClassPath    = 'Zazalt\\'.$testedClassName .'\\'. $testedClassName;
        require_once getcwd() . '/src/'. $testedClassName .'.php';

        // Load the rest of files
        $iterator = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator(getcwd() . '/src/'),
                \RecursiveIteratorIterator::SELF_FIRST);

        $xml = simplexml_load_file(getcwd() .'/phpunit.xml.dist');

        foreach($iterator as $file) {
            if($file->isFile()) {
                $include = true;
                foreach($xml->filter->whitelist->exclude->directory as $excluded) {
                    if(strpos(str_replace('\\', '/', $file->getRealpath()), str_replace('./', '', $excluded))) {
                        $include = false;
                    }
                }
                if($include) {
                    require_once $file->getRealpath();
                }
            }
        }

        $this->that = new $testedClassPath($params);
    }

    public function testZazaltFake()
    {
        $this->assertTrue(true);
        $this->assertFalse(false);
    }
}