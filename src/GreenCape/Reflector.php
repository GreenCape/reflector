<?php

namespace GreenCape\Reflection;

class Reflector
{
	/**
	 * Gets a public, protected or private property in a class using reflection.
	 *
	 * @param   object $object       The object from which to return the property value.
	 * @param   string $propertyName The name of the property to return.
	 *
	 * @return mixed The value of the property.
	 *
	 * @throws \InvalidArgumentException if property is not found
	 */
	public static function getValue($object, $propertyName)
	{
		$property = self::getProperty($object, $propertyName);

		return $property->getValue($object);
	}

	/**
	 * Sets a public, protected or private property in a class using reflection.
	 *
	 * @param   object $object       The object for which to set the property.
	 * @param   string $propertyName The name of the property to set.
	 * @param   mixed  $value        The value to set for the property.
	 *
	 * @return  void
	 *
	 * @throws \InvalidArgumentException if property is not found
	 */
	public static function setValue($object, $propertyName, $value)
	{
		$property = self::getProperty($object, $propertyName);

		$property->setValue($object, $value);
	}

	/**
	 * Get the ReflectionProperty object for a property.
	 * The property is searched in the object's class and its parent classes recursively.
	 *
	 * @param   object $object
	 * @param   string $propertyName
	 *
	 * @return \ReflectionProperty
	 *
	 * @throws \InvalidArgumentException if property is not found
	 */
	protected static function getProperty($object, $propertyName)
	{
		for ($class = get_class($object); $class !== false; $class = get_parent_class($class))
		{
			try
			{
				$property = new \ReflectionProperty($class, $propertyName);
				$property->setAccessible(true);

				return $property;
			} catch (\ReflectionException $e)
			{
				// Ignore
			}
		}
		throw new \InvalidArgumentException(sprintf('Property %s::$%s does not exist', get_class($object), $propertyName));
	}

	/**
	 * Invokes a public, protected or private method in a class using reflection.
	 * Add arguments for the method after the method name, as in call_user_func.
	 *
	 * @param   object $object     The object on which to invoke the method.
	 * @param   string $methodName The name of the method to invoke.
	 *
	 * @return  mixed The return value of the method, if any
	 */
	public static function invoke($object, $methodName)
	{
		/*
		 * The following block can be removed, when min PHP version is raised to 5.6.
		 * The signature has then to be changed into
		 *     public static function invoke($object, $methodName, ...$args)
		 */
		$args = func_get_args();
		array_shift($args);
		array_shift($args);

		return self::invokeArray($object, $methodName, $args);
	}

	/**
	 * Invokes a public, protected or private method in a class using reflection.
	 * Add arguments for the method into an array after the method name, as in call_user_func_array.
	 *
	 * @param   object $object     The object on which to invoke the method.
	 * @param   string $methodName The name of the method to invoke.
	 * @param   array  $args
	 *
	 * @return mixed The return value of the method, if any
	 * @throws \InvalidArgumentException
	 */
	public static function invokeArray($object, $methodName, $args)
	{
		try
		{
			$method = new \ReflectionMethod($object, $methodName);
			$method->setAccessible(true);

			return $method->invokeArgs(is_object($object) ? $object : null, $args);
		} catch (\ReflectionException $e)
		{
			throw new \InvalidArgumentException(sprintf('Method %s::$%s() does not exist', get_class($object), $methodName));
		}
	}
}

