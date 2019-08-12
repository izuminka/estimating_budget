<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> add row to db</title>
  </head>
  <body>
    <?php
      function checkConnection($link)
      { // check the connection to the db
        if (!$link)
        {
          die(mysql_error());;
        }
        echo "Connection is succesful!";
      }

      function addRow($link, $query)
      { // add the row, check if added
        if (mysqli_query($link, $query))
        {
            echo "New record created successfully";
        }
        else
        {
            echo "Error";
        }
      }

      // open connection
      $host = 'localhost';
      $user = 'root';
      $password = '';
      $db_name = 'names_phones';
      $link = mysqli_connect($host, $user, $password, $db_name);
      checkConnection($link);
      echo "<br/>\n";

      // add a query, get variables from the add_form.html
      $f_name =  $_POST["first_name"];
      $l_name = $_POST["last_name"];
      $p_num =  $_POST["phone"];
      $table_n = 'test2';
      $query = "INSERT INTO $table_n VALUES ('$f_name', '$l_name', '$p_num')";
      addRow($link, $query);

      mysqli_close($link);
    ?>
  <!-- redirect the page to main.php -->
  <meta http-equiv="refresh" content="0; url=main.php" />
  </body>
</html>
