<?php

class RosterTest extends WebTestCase
{
	public $fixtures=array(
		'rosters'=>'Roster',
	);

	public function testShow()
	{
		$this->open('?r=roster/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=roster/create');
	}

	public function testUpdate()
	{
		$this->open('?r=roster/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=roster/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=roster/index');
	}

	public function testAdmin()
	{
		$this->open('?r=roster/admin');
	}
}
