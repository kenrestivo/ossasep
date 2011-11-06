<?php

class RequirementTypeTest extends WebTestCase
{
	public $fixtures=array(
		'requirementTypes'=>'RequirementType',
	);

	public function testShow()
	{
		$this->open('?r=requirementType/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=requirementType/create');
	}

	public function testUpdate()
	{
		$this->open('?r=requirementType/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=requirementType/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=requirementType/index');
	}

	public function testAdmin()
	{
		$this->open('?r=requirementType/admin');
	}
}
