<?php

class KArrayDataProvider extends CArrayDataProvider
{

    public $keyField = null;
	/**
	 * Fetches the data item keys from the persistent data storage.
	 * @return array list of data item keys.
	 */
	protected function fetchKeys()
	{
		$keys=array();
		foreach($this->getData() as $i=>$data)
		{
			$key=$this->keyField===null ? $data->getPrimaryKey() : $data->{$this->keyField};
			$keys[$i]=is_array($key) ? implode(',',$key) : $key;
		}
		return $keys;
	}

} 


/// TODO: override fetchdata and spew the key into something

?>