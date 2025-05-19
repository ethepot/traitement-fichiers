#!/bin/bash

sudo docker container run -d --name wgetContainer bigpapoo/sae103-wget -c "sleep 99999"

sudo docker cp script_normal_flag.php wgetContainer:/data
sudo docker cp script_waving_flag.php wgetContainer:/data
sudo docker cp codes_pays.txt wgetContainer:/data

sudo docker exec wgetContainer php script_normal_flag.php
sudo docker exec wgetContainer php script_waving_flag.php

sudo docker cp wgetContainer:/data/dossier_drapeaux ./
sudo docker cp wgetContainer:/data/dossier_drapeaux_flottants ./

sudo docker stop wgetContainer
sudo docker rm wgetContainer