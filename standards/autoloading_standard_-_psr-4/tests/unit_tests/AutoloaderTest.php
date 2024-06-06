<?php

/*
 * This file is part of the PHP.lab package.
 *
 * (c) 2024 Katarzyna Krasińska <katheroine@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace PHPLab\StandardPSR4;

use PHPUnit\Framework\TestCase;

/**
 * @runTestsInSeparateProcesses
 */
class AutoloaderTest extends TestCase
{
    use ClassAndObjectTrait;

    /**
     * @var string
     */
    protected const AUTOLOADER_FULLY_QUALIFIED_CLASS_NAME = 'PHPLab\\StandardPSR4\\Autoloader';
    protected const AUTOLOADER_FUNCTION_NAME = 'loadClass';
    protected const TYPE_ERROR_EXCEPTION_CLASS_NAME = 'TypeError';
    protected const FIXTURES_DIRECTORY_RELATIVE_PATH = '/../fixtures';
    protected const CLASS_NAME_SECTION_REGEXP_PATTERN = '/((?:^|[A-Z])[a-z0-9]+)/';

    /**
     * Instance of tested class.
     *
     * @var Autoloader
     */
    private Autoloader $autoloader;

    /**
     * Autoloading strategy mock.
     * Mocked AutoloadingStrategyInterface.
     *
     * @var mixed
     */
    private mixed $autoloadingStrategyMock;

    /**
     * Test ExOrg\Autoloader\Autoloader class exists.
     */
    public function testConstructorReturnsProperInstance()
    {
        $this->assertInstanceOf(self::AUTOLOADER_FULLY_QUALIFIED_CLASS_NAME, $this->autoloader);
    }

    /**
     * Test for nonexistent path.
     */
    public function testForNonexistentPath()
    {
        $path = $this->getFullFixturePath('/nonexistent');

        $this->autoloader->registerNamespacePath('Vendor\Package', $path);

        $this->assertClassDoesNotExist('\Vendor\Package\Dummy\ComponentExistent');
    }

    /**
     * Test for empty path.
     */
    public function testForEmptyPath()
    {
        $path = $this->getFullFixturePath('/empty');

        $this->autoloader->registerNamespacePath('Vendor\Package', $path);

        $this->assertClassDoesNotExist('\Vendor\Package\Dummy\ComponentExistent');
    }

    /**
     * Test for nonexistent class file.
     */
    public function testForNonexistentClassFile()
    {
        $path = $this->getFullFixturePath('/src');

        $this->autoloader->registerNamespacePath('Vendor\Package', $path);

        $this->assertClassDoesNotExist('\Vendor\Package\Dummy\ComponentNonexistent');
    }

    /**
     * Test for not registered namespace.
     */
    public function testForUnregisteredNamespace()
    {
        $this->assertClassDoesNotExist('\Vendor\Package\Dummy\ComponentExistent');
    }

    /**
     * Test for nonexistent namespace.
     */
    public function testForNonexistentNamespace()
    {
        $path = $this->getFullFixturePath('/src');

        $this->autoloader->registerNamespacePath('Nonexistent', $path);

        $this->assertClassDoesNotExist('\Vendor\Package\Dummy\ComponentExistent');
    }

    /**
     * Test for existent class file.
     */
    public function testForExistentClassFile()
    {
        $path = $this->getFullFixturePath('/src');

        $this->autoloader->registerNamespacePath('Vendor\Package', $path);

        $this->assertClassIsInstantiable('\Vendor\Package\Dummy\ComponentExistent');
    }

    /**
     * Test for namespace with backslash on the beginning.
     */
    public function testForNamespaceWithBackslashOnBeginning()
    {
        $path = $this->getFullFixturePath('/src');

        $this->autoloader->registerNamespacePath('\Vendor\Package', $path);

        $this->assertClassDoesNotExist('\Vendor\Package\Dummy\ComponentExistent');
    }

    /**
     * Test for namespace with backslash on the end.
     */
    public function testForNamespaceWithBackslashOnEnd()
    {
        $path = $this->getFullFixturePath('/src');

        $this->autoloader->registerNamespacePath('Vendor\Package\\', $path);

        $this->assertClassIsInstantiable('\Vendor\Package\Dummy\ComponentExistent');
    }

    /**
     * Test for namespace with backslash on the beginning and the end.
     */
    public function testForNamespaceWithBackslashOnBeginningAndEnd()
    {
        $path = $this->getFullFixturePath('/src');

        $this->autoloader->registerNamespacePath('\Vendor\Package\\', $path);

        $this->assertClassDoesNotExist('\Vendor\Package\Dummy\ComponentExistent');
    }

    /**
     * Test for fully qualified class name without backslash on the beginning.
     */
    public function testForFQClassNameWithoutBackslashOnBeginning()
    {
        $path = $this->getFullFixturePath('/src');

        $this->autoloader->registerNamespacePath('Vendor\Package', $path);

        $this->assertClassIsInstantiable('Vendor\Package\Dummy\ComponentExistent');
    }

    /**
     * Test for namespace registration with one level of nesting
     * and class specification with one level of nesting.
     */
    public function testFor1nNamespaceAnd1nClass()
    {
        $path = $this->getFullFixturePath('/src');

        $this->autoloader->registerNamespacePath('Vendor\Package', $path);

        $this->assertClassIsInstantiable('\Vendor\Package\Dummy\ComponentNotNested');
    }

    /**
     * Test for namespace registration with one level of nesting
     * and class specification with two levels of nesting.
     */
    public function testFor1nNamespaceAnd2nClass()
    {
        $path = $this->getFullFixturePath('/src');

        $this->autoloader->registerNamespacePath('Vendor\Package', $path);

        $this->assertClassIsInstantiable('\Vendor\Package\Dummy\Core\ComponentNested1');
    }

    /**
     * Test for namespace registration with two levels of nesting
     * and class specification with two levels of nesting.
     */
    public function testFor2nNamespaceAnd2nClass()
    {
        $path = $this->getFullFixturePath('/src');

        $this->autoloader->registerNamespacePath('Vendor\Package\Dummy', $path);

        $this->assertClassDoesNotExist('\Vendor\Package\Dummy\Core\ComponentNested2');
    }

    /**
     * Test for the class with underscored namespace name.
     */
    public function testForClassWithUnderscoredNamespaceName()
    {
        $path = $this->getFullFixturePath('/src');

        $this->autoloader->registerNamespacePath('Vendor\Package', $path);

        $this->assertClassIsInstantiable('\Vendor\Package\Dummy\Underscored_Section\AdditionalComponent');
    }

    /**
     * Test for the class with underscored name.
     */
    public function testForClassWithUnderscoredName()
    {
        $path = $this->getFullFixturePath('/src');

        $this->autoloader->registerNamespacePath('Vendor\Package', $path);

        $this->assertClassIsInstantiable('\Vendor\Package\Dummy\Core\Underscored_Component');
    }

    /**
     * Test for many classes from the same namespace and directory path registered.
     */
    public function testManyClassesFromTheSameNamespace()
    {
        $path = $this->getFullFixturePath('/src');

        $this->autoloader->registerNamespacePath('Vendor\Package', $path);

        $this->assertClassDoesNotExist('\Vendor\Package\Dummy\ComponentNonexistent');
        $this->assertClassIsInstantiable('\Vendor\Package\Dummy\ComponentExistent');
        $this->assertClassIsInstantiable('\Vendor\Package\Dummy\ComponentNotNested');
        $this->assertClassIsInstantiable('\Vendor\Package\Dummy\Core\ComponentNested1');
        $this->assertClassIsInstantiable('\Vendor\Package\Dummy\Core\ComponentNested2');
        $this->assertClassIsInstantiable('\Vendor\Package\Dummy\Underscored_Section\AdditionalComponent');
        $this->assertClassIsInstantiable('\Vendor\Package\Dummy\Core\Underscored_Component');
    }

    /**
     * Test for namespace registration with two directory paths registered
     * for the same namespace.
     */
    public function testForTwoPathsAndOneNamespace()
    {
        $path1 = $this->getFullFixturePath('/src');
        $path2 = $this->getFullFixturePath('/lib');

        $this->autoloader->registerNamespacePath('Vendor\Package', $path1);
        $this->autoloader->registerNamespacePath('Vendor\Package', $path2);

        $this->assertClassIsInstantiable('\Vendor\Package\Dummy\ComponentA');
        $this->assertClassIsInstantiable('\Vendor\Package\Dummy\ComponentB');
        $this->assertClassIsInstantiable('\Vendor\Package\Dummy\Core\ComponentC');
        $this->assertClassIsInstantiable('\Vendor\Package\Dummy\Core\ComponentD');
    }

    /**
     * Test for the case from PRS-1 reference page
     * https://www.php-fig.org/psr/psr-4/#3-examples.
     * First example.
     */
    public function testFromReference1()
    {
        $path = $this->getFullFixturePath('/acme-log-writer/lib/');

        $this->autoloader->registerNamespacePath('Acme\Log\Writer', $path);

        $this->assertClassIsInstantiable('\Acme\Log\Writer\File_Writer');
    }

    /**
     * Test for the case from PRS-1 reference page
     * https://www.php-fig.org/psr/psr-4/#3-examples.
     * Second example.
     */
    public function testFromReference2()
    {
        $path = $this->getFullFixturePath('/path/to/aura-web/src');

        $this->autoloader->registerNamespacePath('Aura\Web', $path);

        $this->assertClassIsInstantiable('\Aura\Web\Response\Status');
    }

    /**
     * Test for the case from PRS-1 reference page
     * https://www.php-fig.org/psr/psr-4/#3-examples.
     * Third example.
     */
    public function testFromReference3()
    {
        $path = $this->getFullFixturePath('/vendor/Symfony/Core');

        $this->autoloader->registerNamespacePath('Symfony\Core', $path);

        $this->assertClassIsInstantiable('\Symfony\Core\Request');
    }

    /**
     * Test for the case from PRS-1 reference page
     * https://www.php-fig.org/psr/psr-4/#3-examples.
     * Fourth example.
     */
    public function testFromReference4()
    {
        $path = $this->getFullFixturePath('/usr/includes/Zend');

        $this->autoloader->registerNamespacePath('Zend', $path);

        $this->assertClassIsInstantiable('\Zend\Acl');
    }

    /**
     * Tests for all cases from PRS-1 reference page
     * https://www.php-fig.org/psr/psr-4/#3-examples.
     */
    public function testFromReferenceGrouped()
    {
        $path1 = $this->getFullFixturePath('/acme-log-writer/lib/');
        $path2 = $this->getFullFixturePath('/path/to/aura-web/src');
        $path3 = $this->getFullFixturePath('/vendor/Symfony/Core');
        $path4 = $this->getFullFixturePath('/usr/includes/Zend');

        $this->autoloader->registerNamespacePath('Acme\Log\Writer', $path1);
        $this->autoloader->registerNamespacePath('Aura\Web', $path2);
        $this->autoloader->registerNamespacePath('Symfony\Core', $path3);
        $this->autoloader->registerNamespacePath('Zend', $path4);

        $this->assertClassIsInstantiable('\Acme\Log\Writer\File_Writer');
        $this->assertClassIsInstantiable('\Aura\Web\Response\Status');
        $this->assertClassIsInstantiable('\Symfony\Core\Request');
        $this->assertClassIsInstantiable('\Zend\Acl');
    }

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->autoloader = new Autoloader();
        $this->autoloader->register();
    }

    /**
     * Tears down the fixture, for example, close a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
        $this->autoloader->unregister();
    }

    /**
     * Get full path for given partial path
     * of autoloaded class files.
     *
     * @param string $partialPath
     *
     * @return string
     */
    protected function getFullFixturePath(string $partialPath): string
    {
        $path = (__DIR__) . self::FIXTURES_DIRECTORY_RELATIVE_PATH . $partialPath;

        return $path;
    }
}
