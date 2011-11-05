<?php

class InstructorTest extends WebTestCase
{
	public $fixtures=array(
		'instructors'=>'Instructor',
	);

	public function testShow()
	{
		$this->open('?r=instructor/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=instructor/create');
	}

	public function testUpdate()
	{
		$this->open('?r=instructor/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=instructor/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=instructor/index');
	}

	public function testAdmin()
	{
		$this->open('?r=instructor/admin');
	}
}
