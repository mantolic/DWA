<?php 

  $link = mysqli_connect("localhost","root","root","ljekarna");

  if(mysqli_connect_errno()) {
    printf("Connect faild: %s\n", mysqli_connect_error());
    exit();
  }

  $query = "SELECT krvnaGrupa, count(id) FROM podaci GROUP BY krvnaGrupa";
  
  $i=0;
  if($result = mysqli_query($link,$query)) {
    while($row = mysqli_fetch_array($result)){
      $values[] = $row[1];
    }
    mysqli_free_result($result);
  }
          
  mysqli_close($link);

  // tell us how many columns to plot 
    $columns  = count($values); 

  // set the height and width of the graph image 

    $width = 300; 
    $height = 200; 

  // Set the amount of space between each column 
    $padding = 5; 

  // Get the width of 1 column 
    $column_width = $width / $columns ; 

  // set the graph color variables 
    $im        = imagecreate($width,$height); 
    $gray      = imagecolorallocate ($im,0xcc,0xcc,0xcc); 
    $gray_lite = imagecolorallocate ($im,0xee,0xee,0xee); 
    $gray_dark = imagecolorallocate ($im,0x7f,0x7f,0x7f); 
    $white     = imagecolorallocate ($im,0xff,0xff,0xff); 

  // set the background color of the graph 
    imagefilledrectangle($im,0,0,$width,$height,$white); 


  // Calculate the maximum value we are going to plot 
  $max_value = max($values);

  // loop over the array of columns 
    for($i=0;$i<$columns;$i++) 
        {
    // set the column hieght for each value 
        $column_height = ($height / 100) * (( $values[$i] / $max_value) *100); 
    // now the coords
        $x1 = $i*$column_width; 
        $y1 = $height-$column_height; 
        $x2 = (($i+1)*$column_width)-$padding; 
        $y2 = $height; 

        // write the columns over the background 
        imagefilledrectangle($im,$x1,$y1,$x2,$y2,$gray); 

        // This gives the columns a little 3d effect 
        imageline($im,$x1,$y1,$x1,$y2,$gray_lite); 
        imageline($im,$x1,$y2,$x2,$y2,$gray_lite); 
        imageline($im,$x2,$y1,$x2,$y2,$gray_dark); 
        } 
/*
   // set the correct png headers 
  header ("Content-type: image/png"); 
  // spit the image out the other end 
  imagepng($im);*/

  imagepng( $im, "bar_chart.png", 0); 
  imagedestroy($im); 
?>