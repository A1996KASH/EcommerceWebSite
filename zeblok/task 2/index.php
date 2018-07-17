<?php
include("../include/header.php");

?>
<h1> Task 2 </h1>
<?php
$conn = new mysqli('localhost', 'bookbidi_akash', '9993164199', 'bookbidi_zeblok');
$sql = "SELECT *FROM car";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row

    $result_array = Array();
    while ($row = $result->fetch_assoc()) {
        $result_array[$row["car_name"]] = $row["car_color"];
    }
}

print_r($result_array);

// convert the PHP array into JSON format, so it works with javascript

$json_array = json_encode($result_array);
?>

<script>

    // now put it into the javascript

    var arrayObjects = <?php
echo $json_array; ?>;
    console.log(arrayObjects.indica);
</script>
<p>way to pass php array to  Javascript object<br>

  var arrayObjects = <?php
echo $json_array; ?>;
    console.log(arrayObjects.indica);
    <h2>Open console to check Output</h2>
</p>

</div>

</div>
</body>
</html>