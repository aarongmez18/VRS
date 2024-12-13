<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" href="../View/IMG/VRS2.png" type="image/x-icon" />
    <!-- CSS Generales -->
    <link rel="stylesheet" href="../View/CSS/footer.css" />
    <link rel="stylesheet" href="../View/CSS/navbar.css" />
    <!-- CSS de la página -->
    <link rel="stylesheet" href="../View/CSS/listaDeseos.css" />


    <!-- Bootstrap -->
    <link rel="stylesheet" href="../View/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <title>Lista de deseos</title>
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
					<li><a href="../Controller/collections.php"> Coleccion </a></li>
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

        <!-- Cabecera -->
        <header class="header__container text-center">
            <h1 class="header__title">Listado de deseos</h1>
        </header>

                <!-- Contenedor de la alerta -->
                <div class="contenedor__alertas">
            <div id="custom-alert" class="custom-alert hidden">
                Producto añadido al carrito.
            </div>
            <div id="custom-alert" class="custom-alert hidden">
                Producto añadido a la lista de deseos.
            </div>
         </div>


        <?php
        //  Si no hay ningun producto enseñaremos un mensaje en el caso contrario mostraremos los productos
        if (!$producto) {
            echo '<main class="container text-center mb-5">';
            echo '<h2 class="titulo-lista-deseos mt-5">No tienes productos en tu lista.</h2>';
            echo '<p class="descripcion-producto ">Agrega tus productos en favoritos para esperar siempre al mejor precio.</p>';
            // Si el usuario es cuenta invitado se le ofrecera iniciar sesión
            if($userId == 0){
                echo '<p class="descripcion-producto mt-5">Inicia sesión o registrate para tener guardado tus compras ';
                echo '<a href="../Controller/login.php">Aquí</a></p>';
            }
            echo '</main>';
        }else {
?>
         

        <main class="container mb-5">

        <h2 class="titulo-lista-deseos">Mis deseos</h2>
        <?php
        // Si el usuario es invitado se le ofrecera iniciar sesión
        if($userId == 0){
            echo '<p class="descripcion-producto my-4 text-center">Inicia sesión o registrate para tener guardado tus compras ';
            echo '<a href="../Controller/login.php">Aquí</a></p>';
        }
        

        foreach ($misDeseos as $idProducto) {
            $producto = Producto::getProductoById($idProducto);
            echo '<div class="fila"><img src="'.$producto->getImagen().'" alt="'.$producto->getNombre().'" class="imagen-producto">';
            echo '<div class="informacion-producto">';
            echo '<h3 class="nombre-producto">Nombre del producto: '. $producto->getNombre().'</h3>';
            echo '<p class="precio-producto">Precio: '.$producto->getPrecio().'€</p>';
            echo '<p class="descripcion-producto">Producto disponible</p><div class="botones-carrito">';
            // Boton para eliminar de la lista
            ?>
            <a id="wishlist-btn-<?php echo $producto->getId(); ?>" class="enlace" onclick="eliminar(<?php echo $userId; ?>, <?php echo $producto->getId(); ?>)">Eliminar</a>
            <a id="wishlist-btn-<?php echo $producto->getId(); ?>" class="enlace" onclick="event.preventDefault(); addToCart(<?php echo $userId; ?>, <?php echo $producto->getId(); ?>)">Añadir al carrito</a>
            <?php 
            // Boton para añadir al carrito
            // Boton para ver el detalle del producto
            echo '<a class="enlace boton-detalle" href="../Controller/detalleProducto.php?id='.$idProducto.'">Ver detalle</a>';

            echo '</div></div></div>';
        } 
        ?>

    </div>
        </main>
        <?php
                        //Mostrar la cantidad de productos que exite en total    
                        echo '<div class="text-center my-3">Total de productos '.count($misDeseos).'</div>';
        }
        ?>

    
        


    
    <!-- Footer -->

    <footer class="footer__container">
        <h4 class="footer__title">Varosi Urban Style</h4>
        <section class="footer__section">
            <div class="footer__contact">
                <p class="footer__tp">SUPPORT</p>
                <p>
                    <a href="mailto:helpvrs@varosi.com">vrs@varosi.com</a>
                </p>
                <!-- <p><i class="bi bi-telephone-fill"></i> +34 611 42 40 82</p> -->
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

<!-- Javascript Bootstrap -->
<script src="../View/dist/js/bootstrap.bundle.min.js"></script>
<script src="../View/JS/agregarAjax.js"></script>
