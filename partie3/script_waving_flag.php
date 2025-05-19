#!/usr/bin/php
<?php

    $lines = file("codes_pays.txt"); //fichier txt qui contient tous les codes des pays

    $BASE_URL="https://flagcdn.com/80x60/"; //on récupère la base du lien
    $EXTENSION=".webp"; //on récupère l'extension du drapeau
    $DOSSIER="dossier_drapeaux_flottants";

    mkdir($DOSSIER); //créer un dossier qui a pour nom $DOSSIER

    foreach($lines as $codePays){ //on parcourt toutes les lignes du fichier code_pays

        $codePays = rtrim($codePays);

        $URL = $BASE_URL . $codePays . $EXTENSION; //on concataine la base + le code du pays + l'extension

        $commande = "wget " . $URL . " -P " . $DOSSIER . "\n"; //on utilise -P pour mettre dans le $DOSSIER les drapeaux

        exec($commande); //on execute la chaine $commande 

    }

?>