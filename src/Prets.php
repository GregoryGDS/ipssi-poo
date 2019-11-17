<?php

namespace Ipssi\Evaluation;
use Ipssi\Evaluation\Oeuvres;
use Ipssi\Evaluation\Adherents;
use Ipssi\Evaluation\Exception\QuantiteOeuvreException;
use Ipssi\Evaluation\Exception\LimiteDateException;


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

	public function PretEffectuer():void{
		$oeuvre=$this->infoOeuvre;
		$listPret=$this->adherent;
		$listPret=$listPret->getListPretAdherent();
		$dateDebutPret=$this->dateDebutPret;

		if ($oeuvre->getQuantiteOeuvre()<=0) {
            throw new QuantiteOeuvreException("C'est oeuvre n'est plus disponible pour le moment");
		}

		if (!empty($listPret)) {
			foreach ($listPret as $unPret) {
				$interval=date_diff($unPret[1], $dateDebutPret);
				$interval=$interval->format('%R%a');
				if ($interval>14) {
           			throw new LimiteDateException("Pret imposible, un autre pret n'a pas été rendu dans les temps");
				}
			}
		}
		$oeuvre->setPretEffectuer();
	}

	public function setListPretToAdherent():void{
		$oeuvreName=$this->getNomOeuvre();
		$dateFinPret=$this->dateFinPret;
		$newPret=array($oeuvreName,$dateFinPret);
		$this->adherent->addPretToList($newPret);
	}

	public function getNomOeuvre():string{
		$oeuvreName=$this->infoOeuvre;
		return $oeuvreName->getNameOeuvre();
	}
	public function getNomAdherent():string{
		$adherentName=$this->adherent;
		return $adherentName->getAdherentName();
	}

	public function QuantiteOeuvre():int{
		$qteOeuvre=$this->infoOeuvre;
		return $qteOeuvre->getQuantiteOeuvre();
	}

	public function getPrets():array{
		$listPrets=$this->adherent;
		return $listPrets->getListPretAdherent();
	}
}

