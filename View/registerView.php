<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../View/IMG/VRS2.png" type="image/x-icon" />
    <!-- CSS Generales -->
    <link rel="stylesheet" href="../View/CSS/footer.css" />
    <link rel="stylesheet" href="../View/CSS/navbar.css" />
    <!-- CSS De la Pagina -->
    <link rel="stylesheet" href="../View/CSS/login.css" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../View/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <title>VAROSI STORE</title>
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
                <li>
                    <a href="../Controller/wishlist.php"><i class="bi bi-search-heart"></i></a>
                </li>
                <li>
                    <a href="../Controller/carrito.php"><i class="bi bi-bag"></i></a>
                </li>
                <li>
                    <a href="../Controller/register.php" target="_blank"><i class="bi bi-person-circle"></i></a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="login__container">
        <div class="formulario__container">
            <?php
				//  Comprobaremos si el usuario ha iniciado sesión antes o esta como invitado
				if ($_SESSION['logueado'] == false){
			?>
            <!-- Contenedor de titulo, texto y mensaje de error -->
            <div class="texto__container">
                <h1>Registrate</h1>
                <p>Registrate para tener tus compras guardadas</p>
                <p id="error-message" class="error-message"><?php echo  (!isset($_SESSION['error'])) ? '' : $_SESSION['error'];  ?></p>
            </div>

            <!-- Formulario -->
            <form action="../Controller/validations/RegisterValidation.php" method="post">
    <div class="formulario__grid">
        <!-- Contenedor Izquierdo (Usuario y Correo) -->
        <div class="formulario__columna">
            <!-- Usuario -->
            <div class="form-group">
                <label for="usuario" class="form-label">Usuario</label>
                <small>El nombre de usuario será quien te identifique</small>
                <input type="text" id="usuario" class="form-control" name="usuario" placeholder="Introduce tu usuario" /> <br>
            </div>

            <!-- Correo Electrónico -->
            <div class="form-group">
                <label for="correo" class="form-label">Correo Electrónico</label>
                <small>Ingresa tu correo personal</small>
                <input type="email" id="correo" class="form-control" name="correo" placeholder="Introduce tu correo electrónico" /> <br>
            </div>
        </div>

        <!-- Contenedor Derecho (Contraseñas) -->
        <div class="formulario__columna">
            <!-- Contraseña -->
            <div class="form-group">
                <label for="contrasena" class="form-label">Contraseña</label>
                <small>Nunca compartas tus contraseñas</small>
                <input type="password" id="contrasena" class="form-control" name="contrasena" placeholder="Introduce tu contraseña" /> <br>
            </div>

            <!-- Confirmar Contraseña -->
            <div class="form-group">
                <label for="confirmarContraseña" class="form-label">Escribe de nuevo tu contraseña</label>
                <small>Confirma que tu contraseña es correcta</small> 
                <input type="password" id="confirmarContraseña" class="form-control" name="confirmarContraseña" placeholder="Repite tu contraseña" />
            </div>
        </div>
    </div>

    <!-- Checkbox -->
    <div class="form-group d-flex flex-row mt-3">
        <input type="checkbox" id="terminos" name="terminos" class="form-check"/>
        <label for="terminos" class="form-label mx-3">Acepto los términos y condiciones</label>
    </div>

    <div class="form-group d-flex flex-row">
        <input type="checkbox" name="promociones" id="promociones" class="form-check "/>
        <label for="promociones" class="form-label mx-3">Quiero recibir promociones y ofertas especiales</label>
    </div>

    <!-- Contenedor Botones -->
    <div class="form-group formulario__botones">
        <input type="submit" value="Enviar" class="boton__login"/>
        <a href="../Controller/login.php">Ya tengo cuenta</a>
    </div>
</form>

                <?php
                 							}else{
								 ?>
                                 <div class="texto__container">
                                     <h1>HOLA, <?php echo strtoupper($_SESSION['nombreUsuario']);?></h1>
                                     <p>Estás en tu cuenta. Puedes acceder a tus pedidos y ver tus datos personales.</p>
                                     <p>Si deseas cerrar sesión pulsa <a href="../Controller/cerrar__sesion.php">aquí</a></p>
                                 </div>

         <?php 
         }
         ?>	
    </main>

    <!-- Footer -->

		<footer class="footer__container ">
			<h4 class="footer__title">Varosi Urban Style</h4>
			<section class="footer__section">
				<div class="footer__contact">
					<p class="footer__tp">SUPPORT</p>
					<p>
						<a href="mailto:helpvrs@varosi.com">vrs@varosi.com</a>
					</p> 

				-</div>
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

    <script src="../View/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../View/JS/registerValidations.js"></script>
</body>

</html>