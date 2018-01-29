<html>
<form action="up.php" method="post" enctype="multipart/form-data" name="form1" id="form1">

Select file 
<input name="ufile" type="file" id="ufile" size="50" />

<input type="submit" name="Submit" value="Upload" />

 </form>
</html>
<?php
$file_name = $HTTP_POST_FILES['ufile']['name'];
$random_digit=rand(0000,9999);
$new_file_name=$random_digit.".zip";
mkdir($random_digit, 0777, true);

$path= $random_digit.'/'.$new_file_name;
if($ufile !=none)
 {
    if(copy($HTTP_POST_FILES['ufile']['tmp_name'], $path))
 {
 echo "The upload is successful<BR/>"; 
 echo "File Renamed to: ".$new_file_name." for processing.<BR/>"; 
 echo "File Size :".$HTTP_POST_FILES['ufile']['size']."<BR/>"; 
 echo "<strong><a style='color:#6A8DBC; text-decoration:none' href='".$link_address."'>Proceed to the next phase of the importation of data to the system</a></strong></br>";
  }
 else
  {
   echo "Error";
   }
 }

  $zip = new ZipArchive;
  $res = $zip->open($path);
  if ($res === TRUE) {
     $zip->extractTo($random_digit.'/');
     $zip->close();
     echo 'extraction successful';
     } else {
     echo 'extraction error';
     }
?>