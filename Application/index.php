<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/auth.css">
    <title>Camiones</title>
</head>

<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="auth.php" method="POST">
			<h1>Crea una cuenta</h1><br>
			<input name="nombre" type="text" placeholder="Nombre" />
			<input name="correo" type="email" placeholder="Correo" />
			<input name="clave" type="password" placeholder="Contraseña" /><br>
			<button type="submit">Registrate</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="auth.php" method="POST">
			<h1>Inicia sesion</h1><br>
			<input name="correo" type="email" placeholder="Correo" />
			<input name="clave" type="password" placeholder="Contraseña" /><br>
			<button type="submit">Iniciar sesion</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Bienvenido otra vez!</h1>
				<p>Para manterte conectado con nosotros inicia sesion con tu informacion personal y de tu seguridad nos encargamos nosotros.</p>
				<button class="ghost" id="signIn">Inicia sesion</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hey, que tal!</h1>
				<p>Registrate con tus datos y empieza a registrar tus camiones.</p>
				<button class="ghost" id="signUp">Registrate</button>
			</div>
		</div>
	</div>
</div>


<script src="js/auth.js"></script>

</body>

</html>