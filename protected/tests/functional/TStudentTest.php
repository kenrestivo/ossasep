<?php

class TStudentTest extends WebTestCase
{
	public $fixtures=array(
		'tStudents'=>'TStudent',
	);

	public function testShow()
	{
		$this->open('?r=tStudent/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=tStudent/create');
	}

	public function testUpdate()
	{
		$this->open('?r=tStudent/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=tStudent/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=tStudent/index');
	}

	public function testAdmin()
	{
		$this->open('?r=tStudent/admin');
	}
}
