## PHP Facebook Webdriver & PHPUnit Example Project with Page Object Model

### How to use?

Create the Page Objects of your Web application under **_pageobjects_** package, call those Page Objects in  [PHPUnit](https://phpunit.de/) tests under **_tests_** package (Sample Page Objects, testcase included in this template)

### How to run?
To install the dependencies issue the below commands in project root directory
```javascript
composer update
``` 
> PHP and Composer to be installed as prerequisite.

Run Selenium Server with required Webdriver binaries, example with chromedriver as below
```javascript
java  -Dwebdriver.chrome.driver=/path/to/chromedriver  -jar /path/to/selenium server/selenium-server-standalone-x.x.x.jar
``` 

To run the tests issue the below command in project root directory

```javascript
./vendor/bin/phpunit tests
``` 
By default it runs in Chrome browser, you can specify which browser to use as well
```javascript
./vendor/bin/phpunit tests firefox
```

Browsers added in this template are 
* chrome
* firefox
* ie
* opera
* edge
* safari
* phantomjs

> Feel free to modify it to your own needs :)