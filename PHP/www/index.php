<?php 

echo '
<!DOCTYPE html>
<html>
<head>
    <title>Comma-Separated Numbers Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
<body>
<div class="mx-2">
    <h3>Enter a List of Comma-Separated Numbers</h3>
    
    <form method="post" action="" >
    
        <label for="numbers">Numbers:</label><br>
        <input type="text" id="numbers" name="numbers" required><br><br>
        <input type="submit" class="btn btn-primary" value="Submit">
    </form>

    </body>
    <div>
</html>


  ';


  if ($_POST) {
      $numbers = $_POST["numbers"];
      $re = '/^(?:\d+(?:,|$))+$/';
  
      if (preg_match($re, $numbers)) {
          $numbersArray = array_filter(array_map('intval', explode(",", $numbers)), function($value) {
              return $value !== 0 || $value === '0';
          });
          
          $numSum = array_sum($numbersArray);
          $numCount = count($numbersArray);
          
          function calculateAverage($sum, $count) {
              return $count > 0 ? $sum / $count : 0;
          }
  
          echo "<h2>Entered Numbers:</h2>";
          echo "<ul>";
          echo "<li><strong>Original list:</strong> " . implode(", ", $numbersArray) . "</li>";
          
          sort($numbersArray);
          echo "<li><strong>List in ascending order:</strong> " . implode(", ", $numbersArray) . "</li>";
          
          echo "<li><strong>Sum of all the numbers:</strong> " . $numSum . "</li>";
          echo "<li><strong>Average of all the numbers:</strong> " . calculateAverage($numSum, $numCount) . "</li>";
          echo "<li><strong>Highest number:</strong> " . max($numbersArray) . "</li>";
          echo "<li><strong>Lowest number:</strong> " . min($numbersArray) . "</li>";
          echo "</ul>";
      } else {
          echo "<h2 style='color:red;'>Please enter numbers separated by commas.</h2>";
      }
  }
  ?>
  