<?php	

include "DBconnection.php";

if (isset($_GET["lesson"])) {
  $lesson = $_GET["lesson"];

     
  $sql = "SELECT * FROM lessons WHERE lesson='$lesson'";;
  $result = $conn->query($sql);

  if($result) {
    while($row = $result->fetch_assoc()) {
      $sqlcontent = $row['content'];
      $sqlurl = $row['url'];
    }
    
    $myObj->content=$sqlcontent;
    $myObj->url=$sqlurl;
 
    $myJSON = json_encode($myObj);
    
    echo $myJSON;

  }
  else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
  }

}

