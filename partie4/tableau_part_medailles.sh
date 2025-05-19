#!/bin/bash

sudo docker container run -d --name TableauPHP bigpapoo/sae103-wget -c "sleep 99999"

sudo docker cp part_medailles.php TableauPHP:/data
sudo docker cp tableau.csv TableauPHP:/data

sudo docker exec TableauPHP php part_medailles.php

sudo docker cp TableauPHP:/data/tableau.csv ./

sudo docker stop TableauPHP
sudo docker rm TableauPHP