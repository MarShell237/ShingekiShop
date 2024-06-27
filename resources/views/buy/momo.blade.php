
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>momo</title>
    <link href="login_signin.css" rel="stylesheet">
    <style>
        h1,
        h2,
        h4,
        h3 {
            color: rgb(199, 149, 84);
        }
        
        form {
            justify-content: center;
            align-items: center;
            margin: 150px;
            display: grid;
        }
    </style>
</head>

<body style="background-color:  rgb(12, 14, 43);">
<?php
extract($_POST);
if(isset($submite)){
$_SESSION['montent']=$montant;
$con=mysqli_connect('localhost','root','','mysql');
if(!$con){
    die("error".mysqli_connect_error());
    
}
   $nom=$_SESSION['nom'];
  // $montent=mysqli_query($con,"SELECT solde FROM client WHERE username=' $nom'");

    mysqli_query($con,"UPDATE client SET solde='$montant'  WHERE username='$nom'");

//session_destroy();
}
?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <div>
            <h1>VEUILLEZ LIRE ET SUIVRE ATTENTIVEMENT LES ETAPES SUIVANTES</h1>
            <h3>veuillez entrez le montant</h3>
            <input type="text" name="montant" ><br>

            <h3>entrez l'ID de transaction <a href="mailto:Cicerobouonou46@gmail.com">ici</a>apres avoir suivie les etape ci-dessous</h3>

        </div>
        <h2><u>etape pour le depot:</u></h2>
        <ul>
            <li>
                <h4>aller dans l'appliquation telephone </h4>
            </li>
            <li>
                <h4> tapez le code</h4> <strong>*126#</strong>
                <h4>puis suivre les etapes</h4>
            </li>
            <li>
                <h4>le numero du destinnataire est:</h4> <strong>651876033</strong></li>
            <li>
                <h4>le nom est: </h4><strong>kendjou richard</strong> </li>
        </ul>
        <input type="submit"  name="submite"  style="height: 20px; width: 60px; background-color: blanchedalmond; color: black; " value="confirme">
    </form>
</body>

</html>