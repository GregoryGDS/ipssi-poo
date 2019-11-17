<?php

require_once('vendor/autoload.php');
use Ipssi\Evaluation\Exception;
use Ipssi\Evaluation\Adherents;
use Ipssi\Evaluation\Oeuvres;
use Ipssi\Evaluation\Prets;

use Ipssi\Evaluation\Exception\QuantiteOeuvreException;
use Ipssi\Evaluation\Exception\LimiteDateException;



$climate = new League\CLImate\CLImate;
//adherents => nom / liste des prets (nom oeuvre/date limite restitution)
$adherents =array(
	new Adherents('test1',array(
		array('L\'Assomoir',new \DateTime('2019-11-15')),
		array('L\'oeuvre test',new \DateTime('2019-11-15'))
		),
	),
	new Adherents('test2',[]),
	new Adherents('test3',[]),
	new Adherents('testPbDate',array(
		array('L\'Assomoir',new \DateTime('2019-11-05')),
		),
	),
	
);
//nom de l'oeuvre et sa quantité disponible
$oeuvres=array(
	new Oeuvres('L\'Assomoir',2),
	new Oeuvres('L\'oeuvre test',1),
	new Oeuvres('Antigone',3),
);
//nom de l'oeuvre, nom de l'adhérent et date de début du prêt
//si une date de la liste de pret de l'adhérent est strictement suppérieur à 14 jours de la date du prêt qu'il souhaite fairen, on ne faite pas le prêt
$prets= array (
	new Prets($oeuvres[1],$adherents[2], new \DateTime('2019-11-15')),
	new Prets($oeuvres[1],$adherents[1], new \DateTime('2019-11-05')),
	new Prets($oeuvres[2],$adherents[1], new \DateTime('2019-11-25')),
	new Prets($oeuvres[2],$adherents[0], new \DateTime('2019-11-01')),
	new Prets($oeuvres[2],$adherents[3], new \DateTime('2019-11-22')),
);


foreach ($prets as $unPret) {
	try{

		echo PHP_EOL."=======================".PHP_EOL;
		echo "nom adherent : ".$unPret->getNomAdherent().PHP_EOL;
		echo "nom oeuvre : ".$unPret->getNomOeuvre().PHP_EOL;
		echo "quantité avant pret: ".$unPret->QuantiteOeuvre().PHP_EOL;
		$unPret->PretEffectuer();//set quantité 
		$unPret->setListPretToAdherent();//set liste
		echo "quantité après pret: ".$unPret->QuantiteOeuvre().PHP_EOL;
		echo "liste des prets: ".PHP_EOL;
		print_r($unPret->getPrets());
		
	}catch(QuantiteOeuvreException $e){
	   	echo 'ERROR QUANTITE: '.$e->getMessage();
	   	echo PHP_EOL;
	}catch(LimiteDateException $e){
		echo 'ERROR DATE RECEPTION : '.$e->getMessage();
	}catch (\TypeError $e){
	   	echo 'ERROR : '.$e->getMessage();
	   	echo PHP_EOL;
	}catch (\Throwable $e){
	   	echo 'UNKNOWN ERROR : '.$e->getMessage();
	   	echo PHP_EOL;
	}
}

/*========================================TEST========================================*/
/*
foreach ($adherents as $unadherent) {
	$listPret=$unadherent->getListPretAdherent();
	if (!empty($listPret)) {
		foreach ($listPret as $unPret) {
			var_dump($unPret);			
			$test=array($oeuvres[1],$adherents[2], new \DateTime('2019-11-22'));//date début pret

			$interval=date_diff($unPret[1], $test[2]);
			$interval=$interval->format('%R%a');
			var_dump($interval);

			if ($interval>14) {
				echo "imposible, un pret n'a pas été rendu";
			}else{
				echo "ok pret";
			}
		}
	}

}
*/

/*
$d1=new \DateTime('2019-11-05');//date limite restitution
$test=array($oeuvres[1],$adherents[2], new \DateTime('2019-11-22'));//date début pret
var_dump($d1);
var_dump($test);
$interval=date_diff($d1, $test[2]);
$interval=$interval->format('%R%a');
var_dump($interval);

if ($interval>14) {
	echo "imposible, un pret n'a pas été rendu";
}else{
	echo "ok pret";
}
*/