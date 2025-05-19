#!/bin/bash

nom_fichier=$1
nom_nouveau_fichier=$(echo $nom_fichier | cut -d "." -f 1)

sudo docker container run --name excel2csv -d bigpapoo/sae103-excel2csv tail -f /dev/null

sudo docker cp $nom_fichier excel2csv:/app

sudo docker exec excel2csv ssconvert $nom_fichier $nom_nouveau_fichier.csv

sudo docker cp excel2csv:/app/$nom_nouveau_fichier.csv ./

sudo docker container stop excel2csv

sudo docker container rm excel2csv