<?php

namespace GreenCapeTest;

class TestClass extends TestParentClass
{
	private $privateProperty = 'private data';

	protected $protectedProperty = 'protected data';

	public $publicProperty = 'public data';

	public function getPrivateProperty()
	{
		return $this->privateProperty;
	}

	public function getProtectedProperty()
	{
		return $this->protectedProperty;
	}

	public function getPublicProperty()
	{
		return $this->publicProperty;
	}

	private function privateMethodZeroArgs()
	{
		return 'private result';
	}

	private function privateMethodValueArgs($a)
	{
		$a = $a * 2;

		return $a;
	}

	private function privateMethodRefArgs(&$a)
	{
		$a = $a * 2;

		return $a;
	}

	protected function protectedMethodZeroArgs()
	{
		return 'protected result';
	}

	protected function protectedMethodValueArgs($a)
	{
		$a = $a * 2;

		return $a;
	}

	protected function protectedMethodRefArgs(&$a)
	{
		$a = $a * 2;

		return $a;
	}

	public function publicMethodZeroArgs()
	{
		return 'public result';
	}

	public function publicMethodValueArgs($a)
	{
		$a = $a * 2;

		return $a;
	}

	public function publicMethodRefArgs(&$a)
	{
		$a = $a * 2;

		return $a;
	}
}
