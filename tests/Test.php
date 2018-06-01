<?php
require __DIR__ .'/../vendor/autoload.php';
include __DIR__.'/../pageobjects/GoogleSearchPage.php';
include __DIR__.'/../pageobjects/SearchResultsPage.php';
include __DIR__.'/../driverutil/DriverUtil.php';
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    protected $webDriver;
    protected $url = 'http://www.google.com';
    protected $googlesearchpage;
    protected $searchresultspage;

    public function setUp()
    {
        global $argv;
        $this->webDriver = DriverUtil::getDriver($argv[2]);
        $this->googlesearchpage = new GoogleSearchPage($this->webDriver);
        $this->searchresultspage = new SearchResultsPage($this->webDriver);
    }

    public function testGoogleHome()
    {
        $this->googlesearchpage->openURL();
        $this->assertEquals('Google', $this->googlesearchpage->title());
    }

    public function testGoogleSearch()
    {
        $this->googlesearchpage->openURL();
        $this->googlesearchpage->searchFor('Selenium');
        $this->assertTrue($this->searchresultspage->isSeleniumResultPresent(),'Selenium Result Found');
    }

    public function tearDown()
    {
        $this->webDriver->quit();
    }

}

