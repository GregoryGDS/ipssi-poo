<?php

namespace Ipssi\Evaluation;

class Adherents
{	
	public $name;
	public $listPret;

	public function __construct(string $name,array $listPret){
		$this->name=$name;
		$this->listPret=$listPret;
	}

	public function getAdherentName():string{
		return $this->name;
	}

	public function getListPretAdherent():array{
		return $this->listPret;
	}

	public function addPretToList($newPret){
		array_push($this->listPret, $newPret);
	}
}

