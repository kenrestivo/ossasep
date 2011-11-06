<?php

class ClassMeetingTest extends WebTestCase
{
	public $fixtures=array(
		'classMeetings'=>'ClassMeeting',
	);

	public function testShow()
	{
		$this->open('?r=classMeeting/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=classMeeting/create');
	}

	public function testUpdate()
	{
		$this->open('?r=classMeeting/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=classMeeting/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=classMeeting/index');
	}

	public function testAdmin()
	{
		$this->open('?r=classMeeting/admin');
	}
}
