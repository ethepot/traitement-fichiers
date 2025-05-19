#!/usr/bin/php
<?php

    $nom_tableau = "tableau.csv";
    $separateur = ",";
    $lignes = file($nom_tableau);
    $nouveau_tableau = "";
    $total_medailles = 0;

    foreach ($lignes as $ligne){ //on parcours le tableau "lignes" et on récupère chaque ligne du fichier

        $champs = explode($separateur, $ligne);

        //on prend la somme de toutes les medailles d'un pays et on l'ajoute au total
        $somme = $champs[5]; 
        $total_medailles += $somme;
    }

    foreach ($lignes as $ligne){ //on parcours le tableau "lignes" et on récupère chaque ligne du fichier

        $ligne = rtrim($ligne); //supprime les retours chariot et les sauts de ligne

        $champs = explode($separateur, $ligne);

        //on récupère le nombre total de médailles pour un pays
        $medailles = $champs[5];

        //on fait la somme de toutes les medailles en aillant préalablement modifier le type
        $part_medailles = (($medailles / $total_medailles) * 100);
        $part_medailles = round($part_medailles, 1);

        $nouvelle_ligne = $ligne.$separateur.$part_medailles."%\n";
        $nouveau_tableau = $nouveau_tableau.$nouvelle_ligne; //ajoute chaque nouvelle ligne dans un nouveau tableau
    }
    file_put_contents($nom_tableau, $nouveau_tableau); //remplace l'ancien tableau par le nouveau tableau 

?>