<?php
require_once 'dev/connect.php';
session_start();
var_dump($_POST);

echo "<hr>";


var_dump($_SESSION);


unset($_SESSION['id_user']);
if (isset($_SESSION['id_user']))
{

}
else{
echo " <a href='inscription.php'><button class='btn-recherche' type=submit>Inscription</button></a>";
echo "<a href='connexion.php'><button class='btn-recherche' type=submit>Connexion</button></a>";}
$id=$_POST['nom'];
$personne=$_POST['couchage'];
$sql="SELECT * FROM `hebergement` WHERE id_hebergement=$id AND couchage>=$personne";
$query=$db->prepare($sql);
$query->execute();
$result=$query->fetchAll(PDO::FETCH_ASSOC);

echo "<hr>";
var_dump($result);
echo "<hr>";?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="gitebonbon.css">
</head>
<body>
    


<div class="list">
<?php
foreach ($result as $hebergement) { ?>
    <div class="a"><span class=h1><?=$hebergement['nom'];?><hr></span><hr></div>

    <div class="b"></span>Description:<?=$hebergement['description']; ?><hr>Prix:<?=$hebergement['prix']; ?>€ /pers.  Capacité:<?=$hebergement['couchage']; ?><hr>
                    <?= ($hebergement['animaux'] == "1") ? "<img src='image/animauxpictorouge.png' width='50'>" : "<img src='image/animauxpicto.png' width='50'>";  ?>
                    <?= ($hebergement['wifi'] == "1") ? "<img src='image/wifipictorouge.png' width='50'>" : "<img src='image/wifipicto.png' width='50'>";  ?>
                    <?= ($hebergement['fumeur'] == "1") ? "<img src='image/fumeurpictorouge.png' width='50'>" : "<img src='image/fumeurpicto.png' width='50'>";  ?>
                    <?= ($hebergement['piscine'] == "1") ? "<img src='image/piscinepictorouge.png' width='50'>" : "<img src='image/piscinepicto.png' width='50'>";  ?>
                    <?= ($hebergement['taxi'] == "1") ? "<img src='image/taxipictorouge.png' width='50'>" : "<img src='image/taxipicto.png' width='50'>";  ?>
                    <?= ($hebergement['douche'] == "1") ? "<img src='image/douchepictorouge.png' width='50'>" : "<img src='image/douchepicto.png' width='50'>";  ?>
                    </div>

    <div class="c"></span><img src='<?php echo "dev/photo/".$hebergement['photo1'] ?>'><hr></div>
<?php }


require_once 'dev/close.php';
?>
</div>
</body>
</html>