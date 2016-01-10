<?php

class CBARAPI {

	private $data = null;
	
	private function xmlToArray($data) {
	        $data = simplexml_load_string($data);
        	$data = json_encode($data);
        	$data = json_decode($data, true);
        	return $data;
    	}
	
	public function all($reload = false) {
		if(!$this->data OR $reload) {
			$url = 'http://www.cbar.az/currencies/'.date('d.m.Y') . '.xml';
			$data = file_get_contents($url);
			$data = $this->xmlToArray($data);
			$data = (isset($data['ValType'][1]['Valute']))? $data['ValType'][1]['Valute'] : [];
			foreach($data AS $record) {
				$this->data[strtoupper($record['@attributes']['Code'])] = [
					'code' => $record['@attributes']['Code'],
					'name' => $record['Name'],
					'value' => $record['Value']
				];
			}
		}

		return $this->data;
	}

	public function __call($name, $arguments) {
		$name = strtoupper($name);
		return (isset($this->data[$name]))? $this->data[$name] : null;
	}

	public function __construct($getAll = true) {
		if($getAll) {
			$this->all();
		}
	}
}
