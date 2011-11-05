<?php

class SchoolCalendarTest extends WebTestCase
{
	public $fixtures=array(
		'schoolCalendars'=>'SchoolCalendar',
	);

	public function testShow()
	{
		$this->open('?r=schoolCalendar/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=schoolCalendar/create');
	}

	public function testUpdate()
	{
		$this->open('?r=schoolCalendar/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=schoolCalendar/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=schoolCalendar/index');
	}

	public function testAdmin()
	{
		$this->open('?r=schoolCalendar/admin');
	}
}
