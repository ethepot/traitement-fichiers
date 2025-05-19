#!/usr/bin/php
<?php

    $nom_fichier = "tableau.csv"; 
    $lignes = file($nom_fichier);
    $separateur = ",";
    $nouveau_tableau = "";
    $cle = 0;
    $classement = 1;
    
    foreach ($lignes as $ligne){ //on parcours le tableau "lignes" et on récupère chaque ligne du fichier
        
        $ligne = rtrim($ligne); //supprime les retours chariot et les sauts de ligne
        $place = $classement; 

        if ($cle > 1) {
            $old_ligne_tab = explode($separateur, $lignes[$cle - 1]); //on stock l'ancienne ligne pour ensuite la comparer
            $ligne_tab = explode($separateur, $ligne);

            //on test si l'ancienne ligne est la même que la nouvelle occurence si c'est le cas alors le classement = "-"
            if ($old_ligne_tab[1] == $ligne_tab[1] && $old_ligne_tab[2] == $ligne_tab[2] && $old_ligne_tab[3] == $ligne_tab[3] && $old_ligne_tab[4] == $ligne_tab[4]){
                $place = "-";
            }
        }

        $nouvelle_ligne = $place . $separateur . $ligne . "\n"; 
        $nouveau_tableau = $nouveau_tableau.$nouvelle_ligne; //ajoute chaque nouvelle ligne dans un nouveau tableau

        $cle += 1;
        $classement += 1;
    }

    file_put_contents($nom_fichier, $nouveau_tableau); //remplace l'ancien tableau par le nouveau tableau 

?>