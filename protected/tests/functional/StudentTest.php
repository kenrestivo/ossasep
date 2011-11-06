<?php

class StudentTest extends WebTestCase
{
	public $fixtures=array(
		'students'=>'Student',
	);

	public function testShow()
	{
		$this->open('?r=student/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=student/create');
	}

	public function testUpdate()
	{
		$this->open('?r=student/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=student/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=student/index');
	}

	public function testAdmin()
	{
		$this->open('?r=student/admin');
	}
}
