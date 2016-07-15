<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test App</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="stylesheets/styles.css">
  </head>

  <body>



    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Test App</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#about"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container donaciones">
      <h2>Registro de Donaciones</h2>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDonaciones">Agregar Donación</button>
      <table class="table table-bordered table-striped">
        <thead>
          
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Donación($)</th>
          </tr>
        </thead>
        <tbody>
          <?php

            $servername = "localhost";
            $username = "admin";
            $password = "1991";
            $dbname = "practica_php";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT numero, nombre, apellido, donacion FROM donaciones";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr> <th scope='row'>" . $row['numero']. "</th><td>" . $row['nombre']. "</td><td>" . $row['apellido']. "</td><td>" .$row['donacion']. "</td></tr>";
                }
            }
            $conn->close();
          ?>
          <tr>
            <th scope="row">1</th>
            <td>Juan</td>
            <td>Perez</td>
            <td>50</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Rodrigo</td>
            <td>Castro</td>
            <td>65</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Jose</td>
            <td>Sanchez</td>
            <td>45</td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalDonaciones" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="post" action="connection.php">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Ingresar Donación</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <input type="text" class="form-control" id="inputNombre" name="inputNombre" placeholder="Nombre">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="inputApellido" name="inputApellido" placeholder="Apellido">
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">$</div>
                    <input type="text" class="form-control" id="inputCantidad" name="inputCantidad" placeholder="Cantidad">
                    <div class="input-group-addon">.00</div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>