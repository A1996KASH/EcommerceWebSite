<?php
header('Access-Control-Allow-Origin: *');
ob_start();

// Create connection

$conn = new mysqli("localhost", "bookbidi_akash", "9993164199", "bookbidi_zeblok");

// Check connection

if ($conn->connect_error)
    {
    die("Connection failed: " . $conn->connect_error);
    }

$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method)
    {
case 'POST':
    if (isset($_POST["apikey"]) && isset($_POST["sensorName"]) && isset($_POST["sensorData"]))
        {
			$key = $_POST['apikey'];
			$sql = "SELECT * from users where apikey ='$key'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
        $apikey_1 = filter_var($_POST["apikey"], FILTER_SANITIZE_STRING);
        $sensorName_1 = filter_var($_POST["sensorName"], FILTER_SANITIZE_STRING);
        $sensorData_1 = filter_var($_POST["sensorData"], FILTER_SANITIZE_STRING);
        $apikey_2 = filter_var($apikey_1, FILTER_SANITIZE_STRIPPED);
        $sensorName_2 = filter_var($sensorName_1, FILTER_SANITIZE_STRIPPED);
        $sensorData_2 = filter_var($sensorData_1, FILTER_SANITIZE_STRIPPED);
        $apikey = mysqli_real_escape_string($conn, $apikey_2);
        $sensorData = mysqli_real_escape_string($conn, $sensorData_2);
        $sensorName = mysqli_real_escape_string($conn, $sensorName_2);
        $sql = "INSERT INTO task3 (apikey,sensorName,sensorData)
                            VALUES ('$apikey', '$sensorName', '$sensorData')";
        if ($conn->query($sql) === TRUE)
            {
            $response = array(
                'status' => 1,
                'status_message' => 'inserted successfully!'
            );
            echo json_encode($response);
            }
          else
            {
            $response = array(
                'status' => 2,
                'status_message' => 'Your data is not stored some error occured '
            );
            echo json_encode($response);
            }
		}
		else{
			 $response = array(
                'status' => 3,
                'status_message' => 'Your API key is Invalid '
            );
			 echo json_encode($response);
		}
		}
 
      else
        {
        $response = array(
            'status' => 0,
            'status_message' => 'Your data is not posted'
        );
        }

    break;

default:

    // Invalid Request Method

    header("HTTP/1.0 405 Method Not Allowed");
    break;
    }
	
		
// Close database connection

mysqli_close($conn);
?>
