<?php
/*$new_file_name="1516967871904446.zip";
$random_digit = 'extract_files';
$path= $random_digit.'/'.$new_file_name;*/
$zip = new ZipArchive;
  $res = $zip->open('two files.zip');print_r($res);exit;
  if ($res === TRUE) {
     $zip->extractTo('extract_files/');
     $zip->close();
     echo 'extraction successful';
     } else {
     echo 'extraction error';
     }

?>
<?php 
/*$file_name = $HTTP_POST_FILES['ufile']['name'];
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
   }*/
   
?>