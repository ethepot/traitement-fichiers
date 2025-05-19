#!/usr/bin/php
<?php

    $nom_tableau = "tableau.csv";
    $separateur = ",";
    $lignes = file($nom_tableau);
    $nouveau_tableau = "";

    foreach ($lignes as $ligne){ //on parcours le tableau "lignes" et on récupère chaque ligne du fichier

        $ligne = rtrim($ligne); //supprime les retours chariot et les sauts de ligne

        $champs = explode($separateur, $ligne);

        //on récupère le nombre de médailles pour chaque métal
        $or = $champs[1]; 
        $argent = $champs[2];
        $bronze = $champs[3];

        //on fait la somme de toutes les medailles en aillant préalablement modifier le type
        $somme = (int)$or + (int)$argent + (int)$bronze; 

        $nouvelle_ligne = $ligne.$separateur.$somme."\n";
        $nouveau_tableau = $nouveau_tableau.$nouvelle_ligne; //ajoute chaque nouvelle ligne dans un nouveau tableau
    }

    file_put_contents($nom_tableau, $nouveau_tableau); //remplace l'ancien tableau par le nouveau tableau 

?>