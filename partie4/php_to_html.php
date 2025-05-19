<?php

    //on récupère le résultat du script html.php

    $fichier = shell_exec("php html.php");

    //on met le résultat dans un fichier indexx.html
    file_put_contents("index.html", $fichier);
?>