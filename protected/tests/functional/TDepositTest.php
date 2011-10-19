<?php

class TDepositTest extends WebTestCase
{
	public $fixtures=array(
		'tDeposits'=>'TDeposit',
	);

	public function testShow()
	{
		$this->open('?r=tDeposit/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=tDeposit/create');
	}

	public function testUpdate()
	{
		$this->open('?r=tDeposit/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=tDeposit/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=tDeposit/index');
	}

	public function testAdmin()
	{
		$this->open('?r=tDeposit/admin');
	}
}
