<?php 
if (!empty($_POST['valeur']))
{
   $verif=false;
  $file=fopen('bd.txt','r');
  $don=fread($file,filesize('bd.txt'));
  $don=explode(';',$don);
  array_pop($don);
  foreach($don as $key=>$value)
  {
    if($value==$_POST['valeur'])
    {
      $verif='true';
    }
  }
  if(!$verif)
  {
    $file=fopen('bd.txt','a');
    fwrite($file,$_POST['valeur'].";");
    fclose($file);
    echo '';
  }
  else{
    echo '';
  }
}
if($_POST['valeu']=='recuperer')
{

  $file=fopen('bd.txt','r');
  $don=fread($file,filesize('bd.txt'));
  $don=explode(';',$don);
  array_pop($don);
  $don=json_encode($don);
  echo $don;
}
?>