<?php

class ClassInfoTest extends WebTestCase
{
	public $fixtures=array(
		'classInfos'=>'ClassInfo',
	);

	public function testShow()
	{
		$this->open('?r=classInfo/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=classInfo/create');
	}

	public function testUpdate()
	{
		$this->open('?r=classInfo/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=classInfo/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=classInfo/index');
	}

	public function testAdmin()
	{
		$this->open('?r=classInfo/admin');
	}
}
