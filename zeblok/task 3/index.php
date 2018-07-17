<?php
include("../include/header.php");

?>
<form action="api.php" method="POST">
    <div class="form-group">
      <label for="text">Api key:</label>
      <input type="text" class="form-control" placeholder="enter apiKey pass by post method" name="apikey">
    </div>
     <div class="form-group">
      <label for="text">Sensor name:</label>
      <input type="text" class="form-control" placeholder="enter sensorName to pass by post method" name="sensorName">
    </div>
     <div class="form-group">
      <label for="text"> Sensor Data:</label>
      <input type="text" class="form-control" placeholder="enter sensorData by post method" name="sensorData">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>

</div>

</div>
</body>
</html>