#!/bin/bash

sudo docker container run -d --name HTMLtoPdf bigpapoo/sae103-html2pdf sleep "99999"

sudo docker cp index.html HTMLtoPdf:/data
sudo docker cp dossier_drapeaux HTMLtoPdf:/data
sudo docker cp dossier_drapeaux_flottants HTMLtoPdf:/data
sudo docker cp logo_JO_Paris_2024.png HTMLtoPdf:/data
sudo docker cp style.css HTMLtoPdf:/data

sudo docker exec HTMLtoPdf weasyprint /data/index.html /data/index.pdf

sudo docker cp HTMLtoPdf:/data/index.pdf ./

sudo docker stop HTMLtoPdf
sudo docker rm HTMLtoPdf

#Il me dit dit que le fichier index.html existe pas pourtant je pense bien le copier dans le docker

