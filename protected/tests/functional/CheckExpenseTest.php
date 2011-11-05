<?php

class CheckExpenseTest extends WebTestCase
{
	public $fixtures=array(
		'checkExpenses'=>'CheckExpense',
	);

	public function testShow()
	{
		$this->open('?r=checkExpense/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=checkExpense/create');
	}

	public function testUpdate()
	{
		$this->open('?r=checkExpense/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=checkExpense/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=checkExpense/index');
	}

	public function testAdmin()
	{
		$this->open('?r=checkExpense/admin');
	}
}
