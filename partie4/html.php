#!/usr/bin/php
<?php
    $nom_fichier = "tableau.csv";
    $lignes = file($nom_fichier);
    $correspondance = file("nomp_codep.csv");
    $html = "";
    $cle = 0;

    echo "<!DOCTYPE html>\n";
    echo "<html lang=\"fr\">\n";
    echo "<head>\n";
    echo "\t<meta charset=\"UTF-8\">\n";
    echo "\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n";
    echo "\t<title>Classement JO Paris 2024</title>\n";
    echo "\t<link rel=\"stylesheet\" href=\"style.css\">";
    echo "</head>\n";
    echo "<body>\n";

    echo "\t<img src=\"logo_JO_Paris_2024.png\" alt=\"Image Logo JO Paris 2024\" title=\"Logo Jo 2024\">\n";

    echo "\t<table>\n";
    echo "\t\t<caption>Classement des pays aux JO de Paris 2024</caption>\n";
    echo "\t\t<tbody>\n";
    
    foreach ($lignes as $ligne) {
        $ISOcode = "";
        $ligne = explode(",", rtrim($ligne));
        $longueur = count($ligne);
        foreach ($correspondance as $codeP) {
            $codeP = explode(",", rtrim($codeP));
            if ($codeP[0] == $ligne[1]) {
                $ISOcode = $codeP[1];
            }
            
        }
    
        echo "\t\t\t<tr>\n";
        for ($i = 0; $i < $longueur; $i++) {
            if ($i == 1) {
                if ($ISOcode == ""){
                    echo "\t\t\t\t<td>" . $ligne[$i] . "</td>\n";
                }

                else {
                    //pour les drapeaux normaux
                    echo "\t\t\t\t<td>" . "<img src=\"dossier_drapeaux/$ISOcode.webp\" alt=\"Drapeau\" title=\"Drapeau $ligne[$i]\">" . " $ligne[$i]" . "</td>\n";

                    //pour les drapeaux flottant (enlever le commentaire et ajouter un commentaire sur l'echo précédent)
                    //echo "\t\t\t\t<td>" . "<img src=\"dossier_drapeaux_flottant/$ISOcode.webp\" alt=\"Drapeau\" title=\"Drapeau $ligne[$i]\">" . " $ligne[$i]" . "</td>\n";
                }
                
            }
            else {
                echo "\t\t\t\t<td>" . $ligne[$i] . "</td>\n";
            }
        }
        echo "\t\t\t</tr>\n";
    }

    echo "\t\t</tbody>\n";
    echo "\t</table>\n";
    echo "</body>\n";
?>