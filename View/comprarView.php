<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" href="../View/IMG/VRS2.png" type="image/x-icon">
	<!-- CSS Generales -->
	<link rel="stylesheet" href="../View/CSS/footer.css">
	<link rel="stylesheet" href="../View/CSS/navbar.css">
	<!-- CSS De la Pagina -->
    <link rel="stylesheet" href="../View/CSS/compra.css">
	<link rel="stylesheet" href="../View/CSS/cards.css">



	<!-- Bootstrap -->
	<link rel="stylesheet" href="../View/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <title>Varosies &copy;</title>
</head>
<body>
    <!-- Barra de navegación -->
		<nav class="menu-container">
			<!-- Burger menu -->
			<input type="checkbox" aria-label="Toggle menu" />
			<span></span>
			<span></span>
			<span></span>
	
			<!-- Logo -->
			<a href="../View/load.php" class="menu-logo">
				<img src="../View/IMG/VRS2.png" alt="Varosies" width="50px" />
			</a>
	
			<!-- Enlaces -->
			<div class="menu">
				<ul>
					<li><a href="../View/coleccionesView.php"> Colecciones </a></li>
					<li><a href="../View/contactanos.php"> Contactanos </a></li>
				</ul>
				<!-- Iconos enlaces -->
				<ul>
					<li><a href="../Controller/wishlist.php"><i class="bi bi-search-heart"></i></a></li>
					<li><a href="../Controller/carrito.php"><i class="bi bi-bag"></i></a></li>
					<li><a href="../Controller/register.php" target="_blank"><i class="bi bi-person-circle"></i></a></li>
				</ul>
			</div>
		</nav>

        <main class="contenedor">
    <section class="contenedor__datosCompra">
        <h2>Datos Bancarios</h2>
		<form id="formularioPago">
        <label for="nombre">Nombre y Apellidos:</label>
        <input type="text" id="nombre" name="nombre" >
        <span class="error" id="errorNombre"></span>

        <label for="numeroCuenta">Número de Cuenta:</label>
        <input type="text" id="numeroCuenta" name="numeroCuenta" >
        <span class="error" id="errorNumeroCuenta"></span>

        <label for="dni">DNI / Identificación:</label>
        <input type="text" id="dni" name="dni" >
        <span class="error" id="errorDni"></span>

        <label for="fechaExpiracion">Fecha de Expiración (MM/AA):</label>
        <input type="text" id="fechaExpiracion" name="fechaExpiracion" placeholder="MM/AA" >
        <span class="error" id="errorFechaExpiracion"></span>

        <label for="codigoSeguridad">Código de Seguridad (CVV):</label>
        <input type="password" id="codigoSeguridad" name="codigoSeguridad" >
        <span class="error" id="errorCodigoSeguridad"></span>

        <button type="submit" class="boton__confirmar">Confirmar Pago</button>
    </form>
    </section>

    <section class="contenedor__datosProducto">
	<h2>Cesta</h2>
        <!-- Aquí irán los datos del producto -->
		<?php
        // Si el usuario es invitado se le ofrecera iniciar sesión
        if($userId == 0){
            echo '<p class="descripcion-producto my-4 text-center">Inicia sesión o registrate para tener guardado tus compras ';
            echo '<a href="../Controller/login.php">Aquí</a></p>';
        }
        

        foreach ($miCarrito as $idProducto) {
            $producto = Producto::getProductoById($idProducto);
            echo '<div class="contenedor-compra"><img src="'.$producto->getImagen().'" alt="'.$producto->getNombre().'" class="imagen-compra">';
            echo '<div class="informacion-producto">';
            echo '<h3 class="titulo-compra">'. $producto->getNombre().'</h3>';
            echo '<p class="precio-producto">Precio: '.$producto->getPrecio().'€</p>';
            echo '<p id="cantidad-'.$producto->getId().'">'.$cantidadProductos[$producto->getId()].' unidades</p>';          
            echo '</div></div>';
        }
        
        ?>
    </section>

	
</main>

<hr>
<!-- 4 Productos aleatorios -->
<div class="container-fluid">
<!-- Información Contenedores --> 
                <div class="enlaces-cards">
            <p class="titulo-cards">PRODUCTOS RECOMENDADOS</p>
        </div>
		<div class="contenedor__cards">
 <?php
  foreach ($productos as $producto) {
    echo '<div class="product-card">';
    echo '<img src="'.$producto->getImagen().'" alt="'.$producto->getNombre().'" class="product-image">';
    echo '<div class="product-info">';
    echo '<h3 class="product-name">'.$producto->getNombre().'</h3>';
    echo '<p class="product-price">'.$producto->getPrecio().'€</p>';
    echo '<a class="add-to-cart-btn" href="../Controller/detalleProducto.php?id='.$producto->getId().'"><i class="bi bi-arrow-up-circle"></i></a>';
    echo '</div>';
    echo '</div>';

  } 

 ?>
            </div>
</div>


    
         <!-- Footer -->
		<footer class="footer__container ">
			<h4 class="footer__title">Varosi Urban Style</h4>
			<section class="footer__section">
				<div class="footer__contact">
					<p class="footer__tp">SUPPORT</p>
					<p>
						<a href="mailto:helpvrs@varosi.com">vrs@varosi.com</a>
					</p> 
				</div>
				<div class="footer__politics">
					<p class="footer__tp">POLICIES</p>
					<p>
						<a href="../View/Policies/termsCondicions.html">Terms and Conditions</a>
					</p>
					<p>
						<a href="../View/Policies/devoluciones.html">Devolutions Policy</a>
					</p>
					<p><a href="../View/Policies/cookies.html">Cookie Policy</a></p>
					<p><a href="../View/Policies/privacidad.html">Privacy Policy</a></p>
				</div>
				<div class="footer__social-media">
					<a href="#"><i class="bi bi-tiktok"></i></a>
					<a href="https://www.instagram.com/varosies/?utm_source=ig_web_button_share_sheet"><i
							class="bi bi-instagram"></i></a>
					<a href="#"><i class="bi bi-twitter-x"></i></a>
				</div>
			</section>
			<section class="footer__bottom">
				<p>&copy; 2024 Varosi Urban Style. All rights reserved.</p>
			</section>
		</footer>
</body>
</html>
<script src="../View/dist/js/bootstrap.bundle.min.js"></script>
<script src="../View/JS/cardValidation.js"></script>

