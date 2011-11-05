<?php

class InstructorTypeTest extends WebTestCase
{
	public $fixtures=array(
		'instructorTypes'=>'InstructorType',
	);

	public function testShow()
	{
		$this->open('?r=instructorType/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=instructorType/create');
	}

	public function testUpdate()
	{
		$this->open('?r=instructorType/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=instructorType/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=instructorType/index');
	}

	public function testAdmin()
	{
		$this->open('?r=instructorType/admin');
	}
}
