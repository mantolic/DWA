<?php 

  $link = mysqli_connect("localhost","root","root","ljekarna");

  if(mysqli_connect_errno()) {
    printf("Connect faild: %s\n", mysqli_connect_error());
    exit();
  }

  $queryM = "SELECT COUNT(id) FROM pacijenti WHERE spol='M'";
  $queryZ = "SELECT COUNT(id) FROM pacijenti";

  if($resultM = mysqli_query($link,$queryM)) {
    $rowM = mysqli_fetch_array($resultM);
    $rM = $rowM[0];
    mysqli_free_result($resultM);
  }

  if($resultZ = mysqli_query($link,$queryZ)) {
    $rowZ = mysqli_fetch_array($resultZ);
    $rZ = $rowZ[0] - $rM;
    mysqli_free_result($resultZ);
  }
          
  mysqli_close($link);
 
  // create an array of values for the chart. These values 
  // could come from anywhere, POST, GET, database etc. 
  $values = array($rM,$rZ); 

  // now we get the number of values in the array. this will 
  // tell us how many columns to plot 
  $columns  = count($values); 

  // set the height and width of the graph imag
  $width = 300; 
  $height = 200; 


  $ukupno = $rM + $rZ;
  $postoM = $rM / $ukupno * 360;
  $postoZ = $rZ / $ukupno * 360;
  $muskarci = $rM / $ukupno * 100;
  $zene = $rZ / $ukupno * 100;
/*
  $image = imagecreatetruecolor(300, 300);
*/
$image = imagecreate(250, 250); 
 $background = imagecolorallocate($image, 255, 255, 255); 


  $navy = imagecolorallocate($image, 0x00, 0x00, 0x80);
  $darknavy = imagecolorallocate($image, 0x00, 0x00, 0x50);
  $red = imagecolorallocate($image, 0xFF, 0x00, 0x00);
  $darkred = imagecolorallocate($image, 0x90, 0x00, 0x00);

  for ($i = 170; $i > 150; $i--) {
    imagefilledarc($image, 150, $i, 200, 100, 0, $postoM, $darknavy, IMG_ARC_PIE);
    imagefilledarc($image, 150, $i, 200, 100, $postoM, 360 , $darkred, IMG_ARC_PIE);
  }

  imagefilledarc($image, 150, 150, 200, 100, 0, $postoM, $navy, IMG_ARC_PIE);
  imagefilledarc($image, 150, 150, 200, 100, $postoM, 360 , $red, IMG_ARC_PIE);
/*
  header('Content-type: image/png');

  imagepng($image);
  imagedestroy($image);*/
   imagepng( $image, "pie_chart.png", 0);
?>