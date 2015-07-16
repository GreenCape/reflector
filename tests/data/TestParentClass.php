<?php

namespace GreenCapeTest;

class TestParentClass
{
	private $privateParentProperty = 'private parent data';

	protected $protectedParentProperty = 'protected parent data';

	public $publicParentProperty = 'public parent data';

	public function getPrivateParentProperty()
	{
		return $this->privateParentProperty;
	}

	public function getProtectedParentProperty()
	{
		return $this->protectedParentProperty;
	}

	public function getPublicParentProperty()
	{
		return $this->publicParentProperty;
	}

	private function privateParentMethodZeroArgs()
	{
		return 'private parent result';
	}

	private function privateParentMethodValueArgs($a)
	{
		$a = $a * 2;

		return $a;
	}

	private function privateParentMethodRefArgs(&$a)
	{
		$a = $a * 2;

		return $a;
	}

	protected function protectedParentMethodZeroArgs()
	{
		return 'protected parent result';
	}

	protected function protectedParentMethodValueArgs($a)
	{
		$a = $a * 2;

		return $a;
	}

	protected function protectedParentMethodRefArgs(&$a)
	{
		$a = $a * 2;

		return $a;
	}

	public function publicParentMethodZeroArgs()
	{
		return 'public parent result';
	}

	public function publicParentMethodValueArgs($a)
	{
		$a = $a * 2;

		return $a;
	}

	public function publicParentMethodRefArgs(&$a)
	{
		$a = $a * 2;

		return $a;
	}
}
