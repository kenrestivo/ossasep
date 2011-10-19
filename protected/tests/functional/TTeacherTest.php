<?php

class TTeacherTest extends WebTestCase
{
	public $fixtures=array(
		'tTeachers'=>'TTeacher',
	);

	public function testShow()
	{
		$this->open('?r=tTeacher/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=tTeacher/create');
	}

	public function testUpdate()
	{
		$this->open('?r=tTeacher/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=tTeacher/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=tTeacher/index');
	}

	public function testAdmin()
	{
		$this->open('?r=tTeacher/admin');
	}
}
