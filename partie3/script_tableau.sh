#!/bin/bash

bash convertir_xlsx_csv.sh tableau.xlsx
bash suppr_entete_tab.sh tableau.csv
bash trier_tableau.sh tableau.csv

sudo docker container run --name phpContainer -d bigpapoo/sae103-excel2csv tail -f /dev/null
sudo docker cp somme_medailles.php phpContainer:/app
sudo docker cp classement.php phpContainer:/app
sudo docker cp tableau.csv phpContainer:/app

sudo docker exec phpContainer php somme_medailles.php
sudo docker exec phpContainer php classement.php
sudo docker cp phpContainer:/app/tableau.csv ./

sudo docker container stop phpContainer
sudo docker container rm phpContainer