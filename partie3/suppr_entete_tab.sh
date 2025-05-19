#!/bin/bash
tableau=$1

#on supprime les 3 premières lignes du tableau donc l'en-tête et le titre
nouveau_tableau=$(tail -n +4 < $tableau)
sudo rm $1
printf "%s\n" "$nouveau_tableau" > $tableau