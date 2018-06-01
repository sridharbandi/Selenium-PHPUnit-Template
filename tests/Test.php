<?php
require __DIR__ .'/../vendor/autoload.php';

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    protected $webDriver;
    protected $url = 'http://www.google.com';

    public function setUp()
    {
        $host = 'http://localhost:4444/wd/hub';
        $desired_capabilities = DesiredCapabilities::chrome();
        $this->webDriver = RemoteWebDriver::create($host, $desired_capabilities);
    }

    public function testGitHubHome()
    {
        $this->webDriver->get($this->url);
        $this->assertContains('Google', $this->webDriver->getTitle());
    }

    public function tearDown()
    {
        $this->webDriver->quit();
    }

}

