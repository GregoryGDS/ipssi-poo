<?php

namespace Ipssi\Evaluation;
use Ipssi\Evaluation\Oeuvres;

class Prets 
{
	private $infoOeuvre;
	private $adherent;
	private $dateDebutPret;
	private $dateFinPret;

	public function __construct(Oeuvres $infoOeuvre, Adherents $adherent, \DateTimeInterface $dateDebutPret){
		
		$this->infoOeuvre=$infoOeuvre;
		$this->adherent=$adherent;
		$this->dateDebutPret=$dateDebutPret;

		$this->dateFinPret=$this->dateDebutPret->add(new \DateInterval('P14D'));//ajout de 14 jours


	}

	public function PretEffectuer(){
		$p=$this->infoOeuvre;
		$p->setPretEffectuer();
		return $p;
	}

// class prêt hérite de oeuvre 
// dans prêt set quantité oeuvre ??? 
}

