<?php

require_once('vendor/autoload.php');

$climate = new League\CLImate\CLImate;

class Diviseur {
    public function division(int $index, int $diviseur)
    {
        $valeurs = [17, 12, 15, 38, 29, 157, 89, -22, 0, 5];
        $Max_valeur=count($valeurs)-1;
        if (!isset($valeurs[$index])) {
            throw new ExceptionNotIn("La valeur de l'index donné n'existe pas, saisir un index entre 0 et ".$Max_valeur);
        }
        if ($diviseur===0) {
        	throw new DivisionByZeroError("Division par 0 impossible, saisir un autre diviseur");
        }
        return $valeurs[$index] / $diviseur;
    }
}

do{

	$input = $climate->input("Entrez l’indice de l’entier à diviser : ");
	$index = $input->prompt();

	$input = $climate->input("Entrez le diviseur : ");
	$diviseur = $input->prompt();

	try{
		$resultat=(new Diviseur())->division($index, $diviseur);
		$climate->output("Le résultat de la division est : " . $resultat);

	}catch (ExceptionNotIn $e){
	   	echo 'ERROR : '.$e->getMessage();
	   	echo PHP_EOL;
	}catch (\DivisionByZeroError $e){
	   	echo 'ERROR DIVISION : '.$e->getMessage();
	   	echo PHP_EOL;
	}catch (\TypeError $e){
	   	echo 'ERROR TYPE : La valeur n\'est pas un nombre';
	   	echo PHP_EOL;
	}catch (\Throwable $e){
	   	echo 'UNKNOWN ERROR : '.$e->getMessage();
	   	echo PHP_EOL;
	}

}while (isset($resultat)===false);


class DiviseurExercice1Exception extends \Exception {

}

class  ExceptionNotIn extends DiviseurExercice1Exception {
   
}