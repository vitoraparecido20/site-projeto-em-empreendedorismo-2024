<?php
$email = $_GET['email']; 
$senha = $_GET['senha']; 

#echo ('confere');
echo('<script>alert("Senha confere");</script>');
#aqui devemos ler o arquivo HTML de retornno
$file= fopen('../HTML/validalogin.html','r');
while(!feof($file)){
  $line = fgets($file);
  echo $line;
}
fclose($file);
?>