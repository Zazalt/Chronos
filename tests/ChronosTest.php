<?php

namespace Zazalt\Chronos\Tests;

class ChronosTest extends \PHPUnit_Framework_TestCase
{
    private $that;

    public function setUp()
    {
        $testedClassName    = str_replace('Test', '', substr(strrchr(__CLASS__, "\\"), 1));
        $testedClassPath    = 'Zazalt\\'.$testedClassName .'\\'. $testedClassName;
        require_once getcwd() . '/src/'. $testedClassName .'.php';

        // Load the rest of files
        $iterator = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator(getcwd() . '/src/'),
                \RecursiveIteratorIterator::SELF_FIRST);
        foreach($iterator as $file) {
            if($file->isFile()) {
                require_once $file->getRealpath();
            }
        }

        $this->that = new $testedClassPath();
    }

    public function testDateToMachineDate()
    {
        $this->assertEquals('2013-09-28', $this->that->dateToMachineDate('28.09.2013', 'd.m.Y'));
        $this->assertEquals('2013-09-02', $this->that->dateToMachineDate('2.9.2013', 'd.m.Y'));
        $this->assertEquals('2017-01-29', $this->that->dateToMachineDate('29/01/2017', 'd/m/Y'));
    }

    public function testDateToMachineDateTime()
    {
        $this->assertEquals('2013-09-28 12:21:59', $this->that->dateToMachineDateTime('28.09.2013 12:21:59', 'd.m.Y H:i:s'));
        $this->assertEquals('2013-09-28 12:21:59', $this->that->dateToMachineDateTime('09/28/2013 12:21:59', 'm/d/Y H:i:s'));
    }

    public function testDateToHuman()
    {
        $this->assertEquals('28.09.2013', $this->that->dateToHuman('2013-09-28', 'd.m.Y'));
        $this->assertEquals('29/12/2017', $this->that->dateToHuman('2017-12-29', 'd/m/Y'));
    }

    public function testTearsBetweenTwoDates()
    {
        $this->assertEquals($this->that->yearsBetweenTwoDates(date('Y-m-d'), date('Y-m-d')), 0);
        $this->assertEquals($this->that->yearsBetweenTwoDates('2000-01-01', '2010-01-01'), 10);
        $this->assertEquals($this->that->yearsBetweenTwoDates('2000-01-01', '2010-12-31'), 10);
        $this->assertEquals($this->that->yearsBetweenTwoDates('2000-12-01', '2000-12-31'), 0);
    }
}