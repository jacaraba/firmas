<?PHP
   $data = file_get_contents('php://input');
   if ((file_put_contents("caras/".$_GET['fileName'],$data) === FALSE)) echo "File xfer failed.";

?>