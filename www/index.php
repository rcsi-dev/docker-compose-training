<!-- put in ./www directory -->

<html>
 <head>
  <title>Hello...</title>

  <!-- <meta charset="utf-8">  -->

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <h1>Hi! I'm happy</h1>

        <!-- MySQL -->
        <?php
        $conn_mysql = mysqli_connect('mysql_db', 'user', 'test', 'myDb');

        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          exit();
        }

        echo("<h2>Data from MySQL:</h2>");

        $query_mysql = "SELECT * From Person";
        $result_mysql = mysqli_query($conn_mysql, $query_mysql);

        echo '<table class="table table-striped">';
        echo '<thead><tr><th></th><th>id</th><th>name</th></tr></thead>';
        while($value_mysql = $result_mysql->fetch_array())
        {
            echo '<tr>';
            echo '<td><a href="#"><span class="glyphicon glyphicon-search"></span></a></td>';
            foreach($value_mysql as $element_mysql){
                echo '<td>' . $element_mysql . '</td>';
            }

            echo '</tr>';
        }
        echo '</table>';

        $result_mysql->close();

        mysqli_close($conn_mysql);

        ?>

        <!-- PostgreSQL -->
        <?php
        $conn_pg = pg_connect("host=postgres_db port=5432 dbname=pDb user=puser password=ptest");

        if (!$conn_pg) {
          echo "Failed to connect to PostgreSQL: " . pg_last_error();
          exit;
        }

        echo("<h2>Data from PostgreSQL:</h2>");

        $query_pg = "SELECT * From payments";
        $result_pg = pg_query($conn_pg, $query_pg);

        echo '<table class="table table-striped">';
        echo '<thead><tr><th></th><th>customer_name</th><th>processed_at</th><th>amount</th></tr></thead>';
        while($value_pg = pg_fetch_assoc($result_pg))
        {
            echo '<tr>';
            echo '<td><a href="#"><span class="glyphicon glyphicon-search"></span></a></td>';
            foreach($value_pg as $element_pg){
                echo '<td>' . $element_pg . '</td>';
            }

            echo '</tr>';
        }
        echo '</table>';

        pg_free_result($result_pg);
        pg_close($conn_pg);

        ?>
    </div>
</body>
</html>
