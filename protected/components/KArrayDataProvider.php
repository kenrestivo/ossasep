<?php

class KArrayDataProvider extends CArrayDataProvider
{

    public $keyAttribute = null;
	/**
	 * Fetches the data item keys from the persistent data storage.
	 * @return array list of data item keys.
	 */
	protected function fetchKeys()
	{
		$keys=array();
		foreach($this->getData() as $i=>$data)
		{
			$key=$this->keyAttribute===null ? $data->getPrimaryKey() : $data->{$this->keyAttribute};
			$keys[$i]=is_array($key) ? implode(',',$key) : $key;
		}
		return $keys;
	}


    public function reportTotals( $keys)
    {
        foreach($keys as $k){
            $total[$k] = 0;
        }
        foreach($this->data as $data)
            foreach($keys as $k){
                $total[$k] += $data->$k;
            }
        return $total;
    }


} 


/// TODO: override fetchdata and spew the key into something

?>