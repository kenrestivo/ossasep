<?php

class ClassSessionTest extends WebTestCase
{
	public $fixtures=array(
		'classSessions'=>'ClassSession',
	);

	public function testShow()
	{
		$this->open('?r=classSession/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=classSession/create');
	}

	public function testUpdate()
	{
		$this->open('?r=classSession/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=classSession/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=classSession/index');
	}

	public function testAdmin()
	{
		$this->open('?r=classSession/admin');
	}
}
