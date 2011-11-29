<?php

class CompanyTest extends WebTestCase
{
	public $fixtures=array(
		'companys'=>'Company',
	);

	public function testShow()
	{
		$this->open('?r=company/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=company/create');
	}

	public function testUpdate()
	{
		$this->open('?r=company/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=company/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=company/index');
	}

	public function testAdmin()
	{
		$this->open('?r=company/admin');
	}
}
