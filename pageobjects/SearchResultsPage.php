<?php
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;

class SearchResultsPage{

    private $driver;
    private $linkselenium;

    public function __construct(RemoteWebDriver $driver)
    {
        $this->driver = $driver;
        $this->linkselenium = WebDriverBy::linkText('Selenium - Web Browser Automation');
    }

    public function isSeleniumResultPresent(){
        return $this->driver->findElement($this->linkselenium)->isDisplayed();
    }
}