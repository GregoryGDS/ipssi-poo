<?php

require_once('vendor/autoload.php');

use Ipssi\Evaluation\Adherents;
use Ipssi\Evaluation\Oeuvres;
use Ipssi\Evaluation\Prets;

$climate = new League\CLImate\CLImate;


$adherents =array(
	new Adherents('test1',[]),
	new Adherents('test2',[]),
	new Adherents('test3',[]),
);

$oeuvres=array(
	new Oeuvres('L\'Assomoir',2),
	new Oeuvres('L\'oeuvre test',1),
	new Oeuvres('Antigone',3),
);

$prets= new Prets($oeuvres[1],$adherents[2], new \DateTime('2019-11-15'));

$prets2= new Prets($oeuvres[1],$adherents[1], new \DateTime('2019-11-15'));


//var_dump($oeuvres[1]->getQuantiteOeuvre());

var_dump($prets->PretEffectuer());

//var_dump($oeuvres[1]->getQuantiteOeuvre());

var_dump($prets2->PretEffectuer());



/*
$date = new DateTime('2019-11-01');
$date->add(new DateInterval('P14D'));//ajout de 14 jour
echo $date->format('Y-m-d') . "\n";


*/
