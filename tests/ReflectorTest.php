<?php

namespace GreenCapeTest;

use GreenCape\Reflection\Reflector;

class ReflectorTest extends \PHPUnit_Framework_TestCase
{
	/** @var  TestClass */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$this->object = new TestClass();
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{
	}

	public function testPrivatePropertiesCanBeRead()
	{
		$this->assertEquals('private data', Reflector::getValue($this->object, 'privateProperty'));
	}

	public function testPrivatePropertiesCanBeWritten()
	{
		Reflector::setValue($this->object, 'privateProperty', 'changed');
		$this->assertEquals('changed', $this->object->getPrivateProperty());
	}

	public function testPrivateParentPropertiesCanBeRead()
	{
		$this->assertEquals('private parent data', Reflector::getValue($this->object, 'privateParentProperty'));
	}

	public function testPrivateParentPropertiesCanBeWritten()
	{
		Reflector::setValue($this->object, 'privateParentProperty', 'changed');
		$this->assertEquals('changed', $this->object->getPrivateParentProperty());
	}

	public function testProtectedPropertiesCanBeRead()
	{
		$this->assertEquals('protected data', Reflector::getValue($this->object, 'protectedProperty'));
	}

	public function testProtectedPropertiesCanBeWritten()
	{
		Reflector::setValue($this->object, 'protectedProperty', 'changed');
		$this->assertEquals('changed', $this->object->getProtectedProperty());
	}

	public function testProtectedParentPropertiesCanBeRead()
	{
		$this->assertEquals('protected parent data', Reflector::getValue($this->object, 'protectedParentProperty'));
	}

	public function testProtectedParentPropertiesCanBeWritten()
	{
		Reflector::setValue($this->object, 'protectedParentProperty', 'changed');
		$this->assertEquals('changed', $this->object->getProtectedParentProperty());
	}

	public function testPublicPropertiesCanBeRead()
	{
		$this->assertEquals('public data', Reflector::getValue($this->object, 'publicProperty'));
	}

	public function testPublicPropertiesCanBeWritten()
	{
		Reflector::setValue($this->object, 'publicProperty', 'changed');
		$this->assertEquals('changed', $this->object->getPublicProperty());
	}

	public function testPublicParentPropertiesCanBeRead()
	{
		$this->assertEquals('public parent data', Reflector::getValue($this->object, 'publicParentProperty'));
	}

	public function testPublicParentPropertiesCanBeWritten()
	{
		Reflector::setValue($this->object, 'publicParentProperty', 'changed');
		$this->assertEquals('changed', $this->object->getPublicParentProperty());
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testReadingNonexistentPropertiesThrowsException()
	{
		$value = Reflector::getValue($this->object, 'nonexistentProperty');
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testWritingNonexistentPropertiesThrowsException()
	{
		Reflector::setValue($this->object, 'nonexistentProperty', 'changed');
	}

	public function testPrivateMethodsWithZeroArgsCanBeCalled()
	{
		$this->assertEquals('private result', Reflector::invoke($this->object, 'privateMethodZeroArgs'));
	}

	public function testPrivateParentMethodsWithZeroArgsCanBeCalled()
	{
		$this->assertEquals('private parent result', Reflector::invoke($this->object, 'privateParentMethodZeroArgs'));
	}

	public function testPrivateMethodsWithValueArgsCanBeCalled()
	{
		$arg = 21;
		$result = Reflector::invoke($this->object, 'privateMethodValueArgs', $arg);

		$this->assertEquals(21, $arg, 'Argument should not have been modified');
		$this->assertEquals(42, $result, 'Method result is not returned correctly');
	}

	public function testPrivateParentMethodsWithValueArgsCanBeCalled()
	{
		$arg    = 21;
		$result = Reflector::invoke($this->object, 'privateParentMethodValueArgs', $arg);

		$this->assertEquals(21, $arg, 'Argument should not have been modified');
		$this->assertEquals(42, $result, 'Method result is not returned correctly');
	}

	public function testPrivateMethodsWithRefArgsCanBeCalled()
	{
		$arg    = 21;
		$result = Reflector::invokeArray($this->object, 'privateMethodRefArgs', array(&$arg));

		$this->assertEquals(42, $arg, 'Argument should have been modified');
		$this->assertEquals(42, $result, 'Method result is not returned correctly');
	}

	public function testPrivateParentMethodsWithRefArgsCanBeCalled()
	{
		$arg    = 21;
		$result = Reflector::invokeArray($this->object, 'privateParentMethodRefArgs', array(&$arg));

		$this->assertEquals(42, $arg, 'Argument should have been modified');
		$this->assertEquals(42, $result, 'Method result is not returned correctly');
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testCallingInvokeWithNonexistentMethodThrowsException()
	{
		Reflector::invoke($this->object, 'nonexistentMethod');
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testCallingInvokeArrayWithNonexistentMethodThrowsException()
	{
		$arg = 21;
		Reflector::invokeArray($this->object, 'nonexistentMethod', array($arg));
	}
}
