<?php

class SchoolYearTest extends WebTestCase
{
	public $fixtures=array(
		'schoolYears'=>'SchoolYear',
	);

	public function testShow()
	{
		$this->open('?r=schoolYear/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=schoolYear/create');
	}

	public function testUpdate()
	{
		$this->open('?r=schoolYear/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=schoolYear/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=schoolYear/index');
	}

	public function testAdmin()
	{
		$this->open('?r=schoolYear/admin');
	}
}
