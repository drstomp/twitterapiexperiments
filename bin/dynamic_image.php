<?php

 $n1 = $_GET['n1'];
 //$n2 = $_GET['n2'];
 
 $timestamp = time();
 
 $image = 'poseidon_image_2_bubble.jpg';
 
 $im = new Imagick($image);
 
 $draw = new ImagickDraw();
 $draw->setFillColor('#ffffff');
 $draw->setFontSize(24);
 $draw->setFont('Arial');
 
 $im->annotateImage($draw,390,90,0,$n1);
 
 $im->setImageFormat('png');
 
 header('Content-type: image/png');
 // Write the image to disk and give it a timestamp for name
 //$im->writeImage($timestamp.'.png');
 echo $im;



?>