<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" href="../View/IMG/VRS2.png" type="image/x-icon" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../View/dist/css/bootstrap.min.css" />
    <title>Varosies &copy;</title>
</head>
<body onLoad="redireccionar()">


    <section class="container-fluid mt-5">
        <p class="text-center">Has cerrado tu sesión correctamente.</p>
        <p class="text-center">Redirigiendo al menu principal</p>
    </section>

    

</body>
</html>
<script>
  function redireccionar() {
    setTimeout("location.href='../View/load.php'", 3000);
  }
  </script>