<html>
<head>   
<link href="assets/dropzone.css" type="text/css" rel="stylesheet" />
<script src="assets/dropzone.js"></script>
<Title>Checking File</Title>
</head>
<body>
<?php
  date_default_timezone_set('Asia/Jakarta');
  $files = scandir("f1");
  $oldfolder = "f1/";
  $newfolder = "f2/";
  foreach($files as $fname) {
      if($fname != '.' && $fname != '..') {
          $url1=$_SERVER['REQUEST_URI'];
          header("Refresh: 5; URL=$url1");
          $link = mysqli_connect("localhost","root","","file") or die("Error " . mysqli_error($link));
          $date = date("Y-m-d H:i:s", filemtime($fname));
          $query = "INSERT INTO datafile VALUES (NULL,'".$fname."','".$date."' )";
          $link->query($query);   
          rename($oldfolder.$fname, $newfolder.$fname);
          
      }else {
          echo ' 
                <h3>File Belum Tersedia</H3>
                <p>Silahkan Upload </br>
                <button><a href="up.php">Upload</a></button></p>';
      }    
  }
?>
</body>
</html>
 


