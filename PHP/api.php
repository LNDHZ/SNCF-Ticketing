<?php

    $nom =$_POST['nom'];
    $mdp= $_POST['mdp'];

    $mysqlClient = new PDO(
        'mysql:host=localhost;dbname=appsncf;charset=utf8',
        'root',
        ''
    );



    $mysqlClient->query("INSERT INTO utilisateur (nom,mdp,prenom,mail,cp) VALUES ('".$nom."','".$mdp."','Helene','helene@sncf.fr','okokokok');");



    // $res = $mysqlClient->query("SELECT * FROM utilisateur");
    // $utilisateurs = "";
    // foreach($res as $ligne){
    //     $utilisateurs .= $ligne['nom'] . " " . $ligne['mdp'] . " " . $ligne['mail'] ."</br>";
    // }

    //redirection sur page d'acceuil
    header("Location:http://localhost");
    exit();
?>