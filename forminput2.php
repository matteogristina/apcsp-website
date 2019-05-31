<!DOCTYPE html>
<html>
  <head>
    <title>Area of Circle</title>
  </head>


  <body>

    <h1>Form Input - Demo 2</h1>
    <p>Demo of how to take form input and pass it to a program - all in a single page</p>

    <?php
       // define variables and set to empty values
       $arg1 = $arg2 = $output = $retc = "";

       if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $smaller = test_input($_POST["smaller"]);
         $larger = test_input($_POST["larger"]);
         exec("~/dev/cdemo/areaOfCircle2.c" . $smaller . " " . $larger, $output, $retc); 
       }

       function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
       }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Arg1: <input type="text" name="arg1"><br>
      Arg2: <input type="text" name="arg2"><br>
      <br>
      <input type="submit" value="Go!">
    </form>

    <?php
       // only display if return code is numeric - i.e. exec has been called
       if (is_numeric($retc)) {
         echo "<h2>Your Input:</h2>";
         echo $smaller;
         echo "<br>";
         echo $larger;
         echo "<br>";
 //what it will output      
         echo "<h2>Program Output (an array):</h2>";
         foreach ($output as $line) {
           echo $line;
           echo "<br>";
         }
       
         echo "<h2>Program Return Code:</h2>";
         echo $retc;
       }
    ?>
    
  </body>
</html>
