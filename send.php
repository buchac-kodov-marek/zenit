<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>
    <?php

$meno = $_POST["name"];
$email = $_POST["mail"];
$adresa = $_POST["address"];
$sprava = $_POST["message"];

$cas = date('d.m. H:i' , time());



if (!ctype_alpha(str_replace(' ', '', $meno)) || strlen($meno) > 64) {
    // header("Location: ./index.html");
    echo "<script>history.back();
    // alert('meno nemôže obsahovať iné znaky ako znaky abecedy a nemôže mať viac znakov ako 64');
    </script>";
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    // header("Location: ./index.html");
    echo "<script>history.back()</script>";
}
if (!ctype_alnum($adresa)) {
    
    echo "<script>history.back()</script>";
    // header("Location: ./index.html");
} 
if(strlen($sprava) <3 || strlen($sprava) > 256){
    // header("Location: ./index.html");
    echo "<script>history.back()</script>";

}




echo $meno . " " . $email . " " . $adresa . " " . $sprava;






$fileName = "contact.txt";
$fp = fopen($fileName, "r");
$fileContent = fread($fp, filesize($fileName));

$novy_kontent = $fileContent . "\n" . $email ."::". $meno ."::". $adresa . "::" . $sprava . "::" . $cas;

$file = fopen("contact.txt", "w") or die("Unable to open file!");

 fwrite($file, $novy_kontent);
fclose($file);
header("Location: ./index.html");
?>


</body>
</html>