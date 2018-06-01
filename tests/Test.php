<?php
require __DIR__ .'/../vendor/autoload.php';
include __DIR__.'/../pageobjects/GoogleSearchPage.php';
include __DIR__.'/../pageobjects/SearchResultsPage.php';
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    protected $webDriver;
    protected $url = 'http://www.google.com';
    protected $googlesearchpage;
    protected $searchresultspage;

    public function setUp()
    {
        $host = 'http://localhost:4444/wd/hub';
        $desired_capabilities = DesiredCapabilities::chrome();
        $this->webDriver = RemoteWebDriver::create($host, $desired_capabilities);
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

