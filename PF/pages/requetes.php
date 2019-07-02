<?php
    $param = parse_ini_file('../db.ini');
    $pdo = new PDO($param['url'] , $param['user'] , $param['pass']);
    if(!isset($_POST["lvl"]) || $_POST["lvl"] == ""){
        echo "merci de rentrer un chiffre entre 1 et 5 !!!";
        return;
    }
    $lvl = $_POST['lvl'];
    $rqt = "UPDATE competence_utilisateur SET niveau = '$lvl' WHERE id_utilisateur = ".$id['id_utilisateur'];
    $stmt = $pdo->query($rqt);
    $id = $stmt->fetch();
    echo $prenom . '<br>';
?>