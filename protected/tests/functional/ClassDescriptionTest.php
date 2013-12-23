<?php

class ClassDescriptionTest extends WebTestCase
{
	public $fixtures=array(
		'classDescriptions'=>'ClassDescription',
	);

	public function testShow()
	{
		$this->open('?r=classDescription/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=classDescription/create');
	}

	public function testUpdate()
	{
		$this->open('?r=classDescription/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=classDescription/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=classDescription/index');
	}

	public function testAdmin()
	{
		$this->open('?r=classDescription/admin');
	}
}
