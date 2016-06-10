<?php

class WebDriverDecorator implements \Facebook\WebDriver\WebDriver
{
	/**
	 * @var \Facebook\WebDriver\WebDriver
	 */
	private $driver;

	/**
	 * WebDriverDecorator constructor.
	 *
	 * @param \Facebook\WebDriver\WebDriver $driver
	 */
	public function __construct(\Facebook\WebDriver\WebDriver $driver)
	{
		$this->driver = $driver;
	}

	/**
	 * @param \Facebook\WebDriver\WebDriverBy $locator
	 * @param int                             $timeout
	 *
	 * @return \Facebook\WebDriver\WebDriverElement The same WebDriverElement once it is visible.
	 *
	 * @throws \Facebook\WebDriver\Exception\NoSuchElementException
	 * @throws \Facebook\WebDriver\Exception\TimeOutException
	 */
	public function waitForElementUntilIsPresent(\Facebook\WebDriver\WebDriverBy $locator, $timeout = 10)
	{
		return $this
			->driver
			->wait($timeout)
			->until(\Facebook\WebDriver\WebDriverExpectedCondition::visibilityOfElementLocated($locator));
	}

	/**
	 * @param \Facebook\WebDriver\WebDriverBy $locator
	 * @param int                             $timeout
	 *
	 * @return bool Whether there is no element located.
	 *
	 * @throws \Facebook\WebDriver\Exception\NoSuchElementException
	 * @throws \Facebook\WebDriver\Exception\TimeOutException
	 */
	public function waitForElementUntilIsNotPresent(\Facebook\WebDriver\WebDriverBy $locator, $timeout = 10)
	{
		return $this
			->driver
			->wait($timeout)
			->until(\Facebook\WebDriver\WebDriverExpectedCondition::invisibilityOfElementLocated($locator));
	}

	/**
	 * Move to a frame element.
	 *
	 * @param \Facebook\WebDriver\WebDriverElement $frameElement
	 *
	 * @return \Facebook\WebDriver\WebDriver
	 */
	public function getFrameByWebElement(\Facebook\WebDriver\WebDriverElement $frameElement)
	{
		$frameId = $frameElement->getID();
		$target  = array('ELEMENT' => $frameId);
		$this->driver->switchTo($target);

		return $this->driver;
	}

	/**
	 * Close the current window.
	 *
	 * @return \Facebook\WebDriver\WebDriver The current instance.
	 */
	public function close()
	{
		return $this->driver->close();
	}

	/**
	 * Load a new web page in the current browser window.
	 *
	 * @param string $url
	 *
	 * @return \Facebook\WebDriver\WebDriver The current instance.
	 */
	public function get($url)
	{
		return $this->driver->get($url);
	}

	/**
	 * Get a string representing the current URL that the browser is looking at.
	 *
	 * @return string The current URL.
	 */
	public function getCurrentURL()
	{
		return $this->driver->getCurrentURL();
	}

	/**
	 * Get the source of the last loaded page.
	 *
	 * @return string The current page source.
	 */
	public function getPageSource()
	{
		return $this->driver->getPageSource();
	}

	/**
	 * Get the title of the current page.
	 *
	 * @return string The title of the current page.
	 */
	public function getTitle()
	{
		return $this->driver->getTitle();
	}

	/**
	 * Return an opaque handle to this window that uniquely identifies it within
	 * this driver instance.
	 *
	 * @return string The current window handle.
	 */
	public function getWindowHandle()
	{
		return $this->driver->getWindowHandle();
	}

	/**
	 * Get all window handles available to the current session.
	 *
	 * @return array An array of string containing all available window handles.
	 */
	public function getWindowHandles()
	{
		return $this->driver->getWindowHandles();
	}

	/**
	 * Quits this driver, closing every associated window.
	 *
	 * @return void
	 */
	public function quit()
	{
		$this->driver->quit();
	}

	/**
	 * Take a screenshot of the current page.
	 *
	 * @param string $save_as The path of the screenshot to be saved.
	 *
	 * @return string The screenshot in PNG format.
	 */
	public function takeScreenshot($save_as = null)
	{
		return $this->driver->takeScreenshot($save_as);
	}

	/**
	 * Construct a new WebDriverWait by the current WebDriver instance.
	 * Sample usage:
	 *
	 *   $driver->wait(20, 1000)->until(
	 *     WebDriverExpectedCondition::titleIs('WebDriver Page')
	 *   );
	 *
	 * @param int $timeout_in_second
	 * @param int $interval_in_millisecond
	 *
	 * @return \Facebook\WebDriver\WebDriverWait
	 */
	public function wait($timeout_in_second = 30, $interval_in_millisecond = 250)
	{
		return $this->driver->wait($timeout_in_second, $interval_in_millisecond);
	}

	/**
	 * An abstraction for managing stuff you would do in a browser menu. For
	 * example, adding and deleting cookies.
	 *
	 * @return \Facebook\WebDriver\WebDriverOptions
	 */
	public function manage()
	{
		return $this->driver->manage();
	}

	/**
	 * An abstraction allowing the driver to access the browser's history and to
	 * navigate to a given URL.
	 *
	 * @return \Facebook\WebDriver\WebDriverNavigation
	 * @see WebDriverNavigation
	 */
	public function navigate()
	{
		return $this->driver->navigate();
	}

	/**
	 * Switch to a different window or frame.
	 *
	 * @return \Facebook\WebDriver\WebDriverTargetLocator
	 * @see WebDriverTargetLocator
	 */
	public function switchTo()
	{
		return $this->driver->switchTo();
	}

	/**
	 * @param string $name
	 * @param array  $params
	 *
	 * @return mixed
	 */
	public function execute($name, $params)
	{
		return $this->driver->execute($name, $params);
	}

	/**
	 * Find the first WebDriverElement within this element using the given
	 * mechanism.
	 *
	 * @param \Facebook\WebDriver\WebDriverBy $locator
	 *
	 * @return \Facebook\WebDriver\WebDriverElement NoSuchElementException is thrown in
	 *    HttpCommandExecutor if no element is found.
	 * @see WebDriverBy
	 */
	public function findElement(\Facebook\WebDriver\WebDriverBy $locator)
	{
		return $this->driver->findElement($locator);
	}

	/**
	 * Find all WebDriverElements within this element using the given mechanism.
	 *
	 * @param \Facebook\WebDriver\WebDriverBy $locator
	 *
	 * @return \Facebook\WebDriver\WebDriverElement[] A list of all WebDriverElements, or an empty array if
	 *    nothing matches
	 * @see WebDriverBy
	 */
	public function findElements(\Facebook\WebDriver\WebDriverBy $locator)
	{
		return $this->driver->findElements($locator);
	}

	public function clearCurrentCookies()
	{
	}

	public function setCurrentWindowSize($width, $height)
	{
	}

	public function acceptAlert()
	{
	}

	public function executeScript($string, $locator = null)
	{
	}

	public function getScreenShotsDirectory()
	{
	}

	public function getHubUrl()
	{
	}

	public function getSessionId()
	{
	}

	public function getEnvironment()
	{
	}
}
