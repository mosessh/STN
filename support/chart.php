

<?php
    //address of the server where db is installed
    $servername = "localhost";
   
    $username = "u825147531_voucher";
    
    $password = "6~Aa#:1;7O:";
   
    $dbName = "u825147531_voucher";
  
    $conn = new mysqli($servername, $username, $password, $dbName);
     
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
     
    $query = "SELECT * from step3,step2";
   
    $result = $conn->query($query);
    //initialize the array to store the processed data
    $jsonArray = array();
    //check if there is any data returned by the SQL Query
    if ($result->num_rows > 0) {
      //Converting the results into an associative array
      while($row = $result->fetch_assoc()) {
        $jsonArrayItem = array();
        $jsonArrayItem['phone2'] = $row['phone2'];
         $jsonArrayItem['phone3'] = $row['phone3'];
        
        //append the above created object into the main array.
        array_push($jsonArray, $jsonArrayItem);
      }
    }
    //Closing the connection to DB
    $conn->close();
    //set the response content type as JSON
    header('Content-type: application/json');
    //output the return value of json encode using the echo function.
    echo json_encode($jsonArray);
?>


