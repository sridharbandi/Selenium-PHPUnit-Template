<?php

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

class DriverUtil
{

    static $desired_capabilities;

    static public function getDriver($browser)
    {
        $host = 'http://localhost:4444/wd/hub';
        switch (strtoupper($browser)) {
            case 'CHROME':
                self::$desired_capabilities = DesiredCapabilities::chrome();
                break;
            case 'FIREFOX':
                self::$desired_capabilities = DesiredCapabilities::firefox();
                break;
            case 'IE':
                self::$desired_capabilities = DesiredCapabilities::internetExplorer();
                break;
            case 'OPERA':
                self::$desired_capabilities = DesiredCapabilities::opera();
                break;
            case 'EDGE':
                self::$desired_capabilities = DesiredCapabilities::microsoftEdge();
                break;
            case 'SAFARI':
                self::$desired_capabilities = DesiredCapabilities::safari();
                break;
            case 'PHANTOMJS':
                self::$desired_capabilities = DesiredCapabilities::phantomjs();
                break;
            default:
                self::$desired_capabilities = DesiredCapabilities::chrome();
                break;
        }
        return RemoteWebDriver::create($host, self::$desired_capabilities);
    }
}