<?php

class LanguageTest extends WebTestCase
{
	public $fixtures=array(
		'languages'=>'Language',
	);

	public function testShow()
	{
		$this->open('?r=language/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=language/create');
	}

	public function testUpdate()
	{
		$this->open('?r=language/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=language/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=language/index');
	}

	public function testAdmin()
	{
		$this->open('?r=language/admin');
	}
}
