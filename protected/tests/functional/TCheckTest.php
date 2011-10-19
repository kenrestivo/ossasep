<?php

class TCheckTest extends WebTestCase
{
	public $fixtures=array(
		'tChecks'=>'TCheck',
	);

	public function testShow()
	{
		$this->open('?r=tCheck/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=tCheck/create');
	}

	public function testUpdate()
	{
		$this->open('?r=tCheck/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=tCheck/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=tCheck/index');
	}

	public function testAdmin()
	{
		$this->open('?r=tCheck/admin');
	}
}
