<?php

class CheckIncomeTest extends WebTestCase
{
	public $fixtures=array(
		'checkIncomes'=>'CheckIncome',
	);

	public function testShow()
	{
		$this->open('?r=checkIncome/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=checkIncome/create');
	}

	public function testUpdate()
	{
		$this->open('?r=checkIncome/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=checkIncome/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=checkIncome/index');
	}

	public function testAdmin()
	{
		$this->open('?r=checkIncome/admin');
	}
}
