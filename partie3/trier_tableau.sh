#!/bin/bash
nom_fichier=$1

#on tri sur le champs 2,3 puis 4 numériquement -n et dans l'ordre décroissant -r 
#puis sur le champ 1 pour le trier par ordre alphabétique
nouveau_tableau=$(sort -t ',' -k 2,2nr -k 3,3nr -k 4,4nr -k 1,1 < $nom_fichier)
printf "%s\n" "$nouveau_tableau" > $nom_fichier