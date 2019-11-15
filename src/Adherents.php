<?php

namespace Ipssi\Evaluation;

class Adherents
{	
	public $name;
	public $listPret;


	public function __construct(string $name,array $listPret =[]){
		$this->name=$name;
		$this->listPret=$listPret;
	}

	public function getName(){
		return $this->name;
	}

	public function getListPret(){
		return $this->listPret;
	}
}

