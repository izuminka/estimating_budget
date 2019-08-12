<html>
  <head>
    <title>main</title>
    <style>
      table, th, td
      {
        border: 0.5px solid black;
      }
    </style>
  </head>
  <body>
  <?php
    function checkConnection($link)
    // check the connection to the db
    {
      if (!$link)
      {
        die(mysql_error());;
      }
      echo 'Connection is succesful!';
    }

    // set up the acess to the database
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'names_phones';
    $link = mysqli_connect($host, $user, $password, $db_name);
    // checkConnection($link);

    // access the db
    $table = 'test2';
    $query = "SELECT * FROM $table";
    $result = mysqli_query($link, $query);
    $n = mysqli_num_rows($result);

    // display the contents
    echo "<table>";
    echo "<tr>
    <th>index</th><th>first name</th><th>last name</th><th>phone</th>
    </tr>";
    for ($i =0; $i < $n; $i++)
    {
      $row = mysqli_fetch_array($result);
      // echo "<p><b>".($i + 1).$row['title']."</b><br>";
      // echo "First Name: ".$row['first_name']."<br>";
      // echo "Last Name: ".$row['last_name']."<br>";
      // echo "Phone Number: ".$row['phone']."<br></p>";
      echo "<tr>";
      echo "<td>".($i + 1).$row['title']."</td>";
      echo "<td>".$row['first_name']."</td>";
      echo "<td>".$row['last_name']."</td>";
      echo "<td>".$row['phone']."</td>";
      echo "</tr>";
    }
    echo "</table>";

    if ($n == 0) echo "Empty.";
  ?>

  <!-- add a button for new entry -->
  <form action="add_form.html" method="post">
  <tr><td></td><td><input type="submit" value="Add new entry?"></td></tr>

  <!-- close the connection -->
  <?php mysql_close($link); ?>
  </body>
  </html>
