
<?php
//open
$a=fopen('mytext.txt',"r");
echo $a."<br>";

if(!$a){
    die("not have file");
}
//fgets()
echo fgets($a);
echo"<br>";
echo"<br>";
//fgetc()
while($c=fgetc($a)){
    echo$c;
    if($c=="e"){
        break;
    }
}
echo"<br>";
echo"<br>";


$content=fread($a,6);
echo $content;
fclose($a);

?>


