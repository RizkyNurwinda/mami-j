<!DOCTYPE html>
<html>
  <head>
    <title>IMPORT CSV FILE TO MYSQL</title>
  </head>
  <body>
    <form method='post' enctype='multipart/form-data'>
      <input type="file" name="file" />
      <input type="submit" name="importFile" value="IMPORT">
    </form>
  </body>
</html>
<?php
if(isset($_POST['importFile'])){
  $MIME_types = array(
                      'text/x-comma-separated-values', 
                      'text/comma-separated-values', 
                      'application/octet-stream', 
                      'application/vnd.ms-excel', 
                      'application/x-csv', 
                      'text/x-csv', 
                      'text/csv', 
                      'application/csv', 
                      'application/excel', 
                      'application/vnd.msexcel', 
                      'text/plain'
                     );
  if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$MIME_types)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
           $dbhost='localhost';
           $dbuser='root';
           $dbpass='';
           $dbname='insert_data';
           $db=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
           $sql="LOAD DATA LOCAL INFILE '".addslashes($_FILES['file']['tmp_name'])."' "
               ."INTO TABLE pertanyaan "
               ."FIELDS TERMINATED BY ',' "
               ."LINES TERMINATED BY '\n' ";
           $db->query($sql) or 
           die("Fail to import data file to db, error number [".$db->errno."] : ".$db->error." {$sql}");
           echo 'import data successfully';
        }
  }
} ?>