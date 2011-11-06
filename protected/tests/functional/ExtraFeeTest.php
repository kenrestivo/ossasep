<?php

class ExtraFeeTest extends WebTestCase
{
	public $fixtures=array(
		'extraFees'=>'ExtraFee',
	);

	public function testShow()
	{
		$this->open('?r=extraFee/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=extraFee/create');
	}

	public function testUpdate()
	{
		$this->open('?r=extraFee/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=extraFee/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=extraFee/index');
	}

	public function testAdmin()
	{
		$this->open('?r=extraFee/admin');
	}
}
