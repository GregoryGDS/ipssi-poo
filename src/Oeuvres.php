<?php

namespace Ipssi\Evaluation;

class Oeuvres
{
	private $nameOeuvre;
	private $quantiteOeuvre;

	public function __construct(string $nameOeuvre, int $quantiteOeuvre){
		$this->nameOeuvre=$nameOeuvre;
		$this->quantiteOeuvre=$quantiteOeuvre;
	}

	public function getNameOeuvre(){
		return $this->nameOeuvre;
	}

	public function getQuantiteOeuvre(){
		return $this->quantiteOeuvre;
	}

	public function setPretEffectuer(){
		$this->quantiteOeuvre=$this->quantiteOeuvre-1;
	}
}

