<?php

class TClassTest extends WebTestCase
{
	public $fixtures=array(
		'tClasses'=>'TClass',
	);

	public function testShow()
	{
		$this->open('?r=tClass/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=tClass/create');
	}

	public function testUpdate()
	{
		$this->open('?r=tClass/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=tClass/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=tClass/index');
	}

	public function testAdmin()
	{
		$this->open('?r=tClass/admin');
	}
}
