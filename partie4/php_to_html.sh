#!/bin/bash

html=$(php html.php)
printf "%s" "$html" > index.html