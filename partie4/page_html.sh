#!/bin/bash

sudo docker container run -d --name phpToHTML bigpapoo/sae103-wget -c "sleep 99999"

sudo docker cp html.php phpToHTML:/data
sudo docker cp php_to_html.sh phpToHTML:/data
sudo docker cp tableau.csv phpToHTML:/data
sudo docker cp nomp_codep.csv phpToHTML:/data

sudo docker exec phpToHTML bash php_to_html.sh

sudo docker cp phpToHTML:/data/index.html ./

sudo docker stop phpToHTML
sudo docker rm phpToHTML