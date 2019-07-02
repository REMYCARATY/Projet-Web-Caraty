
<?php
    //error_reporting(E_ALL);
    //ini_set('display_errors', 1);
    $param = parse_ini_file('../db.ini');
    $pdo = new PDO($param['url'] , $param['user'] , $param['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    if(!isset($_POST["prenom"]) || $_POST["prenom"] == ""){
        echo "merci de rentrer un prenom !!!";
        return;
    }
    if(!isset($_POST["mdp"]) || $_POST["mdp"] == ""){
        echo "merci de rentrer un mot de passe valide !!!";
        return;
    }
    $prenom = $_POST['prenom'];
    $mdp = hash ("md5",$_POST['mdp']);
    $rqt = "SELECT * FROM utilisateur WHERE prenom = ?; ";
    $stmt = $pdo->prepare($rqt);
    $stmt->execute([$prenom]);
    $id = $stmt->fetch(PDO::FETCH_ASSOC);
    $test = $id['mdp'];
    if ($prenom == $id["prenom"] && $mdp == $id["mdp"]){
        echo "génial";
        $rqt = "SELECT id_competence, niveau FROM competence_utilisateur WHERE id_utilisateur = ".$id['id_utilisateur'];
        $stmt = $pdo->query($rqt);
        $skills = $stmt->fetchAll();
        foreach($skills as $skill){
            $rqt = "SELECT libelle, logo FROM competence WHERE id_competence = ".$skill['id_competence'];
            $stmt = $pdo->query($rqt);
            $nom = $stmt->fetch();
            echo "<p>" . $nom['libelle'] . ", Niveau: " . $skill['niveau'] . "</p><br>";
            echo "<img src='" . $nom['logo'] . "'>";
            echo "<form action='requetes.php' method='POST'>
                <input name='lvl' type='texte'>
                <input type='submit' value='changer le niveau'>
                </form>";
    }
    }else{
        echo "ntm";
    }
?>