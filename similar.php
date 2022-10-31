<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE); //to avoid unwanted notices
session_start();
require('connection.php'); 
$flag=FALSE;


$query="SELECT * FROM `volunteer_details`";
$result=mysqli_query($con,$query);

while($row_fetch=mysqli_fetch_assoc($result))
{
    $percent=round(compareImages($_SESSION["path"], $row_fetch['image']));

    if($percent>98){
        $flag=TRUE;
        break;
    }
    else{
        $flag=FALSE;
    }
}
    if($flag)
    {
        $_SESSION["Pincode"]=$row_fetch['pin_code'];
        $_SESSION["UserName"]=$row_fetch['username']; //to join the table
        echo"
                <script>
                window.location.href='Information.php';
                </script>
                ";
    }
    else
    {
        echo"
                <script>
                window.location.href='Response.html';
                </script>
                ";
    }
    function compareImages($pathA, $pathB)//
    {
        $accuracy=90; //Set accuracy of comparison
        $bim = imagecreatefrompng($pathA);  //load base image from internet create comparison points
        $bimX = imagesx($bim);
        $bimY = imagesy($bim);
        $pointsX = $accuracy*5;
        $pointsY = $accuracy*5;
        $sizeX = round($bimX/$pointsX);
        $sizeY = round($bimY/$pointsY);
        $im = imagecreatefrompng($pathB); //load second image from internetloop through each point and compare the color of that point
        $y = 0;
        $matchcount = 0;
        $num = 0;
        for ($i=0; $i <= $pointsY; $i++){
            $x = 0;
            for($n=0; $n <= $pointsX; $n++){
                $rgba = imagecolorat($bim, $x, $y);
                $colorsa = imagecolorsforindex($bim, $rgba);
                $rgbb = imagecolorat($im, $x, $y);
                $colorsb = imagecolorsforindex($im, $rgbb);
                if(colorComp($colorsa['red'], $colorsb['red']) && colorComp($colorsa['green'], $colorsb['green']) && colorComp($colorsa['blue'], $colorsb['blue'])){
                  $matchcount ++;
                }
                $x += $sizeX;
                $num++;
            }
            $y += $sizeY;
          }
          $rating = $matchcount*(100/$num);
          return $rating;
    }
    function colorComp($color, $c){
          if($color >= $c-2 && $color <= $c+2){
            return true;
          }else{
            return false;
          }
    }
?>