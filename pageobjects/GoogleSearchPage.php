<?php
use Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverKeys;
use Facebook\WebDriver\WebDriverBy;

class GoogleSearchPage {

    private $url = 'http://www.google.com';
    private $driver;
    private $searchbox;

    public function __construct(RemoteWebDriver $driver)
    {
        $this->driver = $driver;
        $this->searchbox = WebDriverBy::id('lst-ib');
    }

    public function openURL(){
        $this->driver->get($this->url);
    }

    public function title(){
        return $this->driver->getTitle();
    }

    public function searchFor($searchterm){
        $this->driver->findElement($this->searchbox)->sendKeys($searchterm);
        $this->driver->getKeyboard()->pressKey(WebDriverKeys::ENTER);
    }

}