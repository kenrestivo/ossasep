<?php

class KArrayDataProvider extends CArrayDataProvider
{

	/**
	 * Fetches the data item keys from the persistent data storage.
	 * @return array list of data item keys.
	 */
	protected function fetchKeys()
	{
		$keys=array();
		foreach($this->getData() as $i=>$data)
		{
			$keys[$i]=$i;
		}
		return $keys;
	}

} 

?>