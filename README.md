# IPSSI POO
> évaluation


Pour répondre à l'évalution il faut ouvir une Pull Request sur ce dépôt.
Pensez bien à lancer la commande `composer install`

Le titre de votre Pull Request __DOIT__ contenir votre nom et prénom.

## Installation
- Faire un fork
- Récupérer le code de votre fork sur votre machine
- Déplacez vous à la racine de votre fork sur votre machine
- Lancez la commande
```
composer install
```

## Exercice 1
Le fichier `exercice1.php` contient du code dont les erreurs ne sont pas gérées.
Vous devez :
- identifier les cas d'erreurs
- empécher que le script plante lors d'un cas d'exception (afficher un message spécifique par erreur)
- redemander la saisi à l'utilisateur tant qu'il saisi des cas d'exceptions.

## Exercice 2
Soit un document dans lequel on peut insérer des éléments.

- Un élément à une position (x, y) en pixel sur le document
- Il existe les éléments : texte, forme (étoile, nuage) et image
- On peut modifier la couleur des éléments texte et forme ainsi que la couleur du document
- Une couleur est exprimé en RGB

Faire les class nécessaire pour pouvoir afficher un compte rendu complet de la composition d'un document.

## Exercice 3
Structure interne de la bibliothèque.
Un adhérent peut empréter un exemplaire d'une oeuvre de la façon suivante :
s'il reste un exemplaire dans la bibliothèque, l'un des exemplaires de l'oeuvre est prété à l'adhérent. 
Le prêt à une durée limitée de deux semaine, si un adhérent souhaite emprinter un exemplaire, il ne doit pas avoir de prêt en cours dont la date limite de restitution est déjà passé.