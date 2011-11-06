<?php

class DepositDetailsTest extends WebTestCase
{
	public $fixtures=array(
		'depositDetails'=>'DepositDetails',
	);

	public function testShow()
	{
		$this->open('?r=depositDetails/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=depositDetails/create');
	}

	public function testUpdate()
	{
		$this->open('?r=depositDetails/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=depositDetails/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=depositDetails/index');
	}

	public function testAdmin()
	{
		$this->open('?r=depositDetails/admin');
	}
}
