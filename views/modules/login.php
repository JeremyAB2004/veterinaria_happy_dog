<link rel="stylesheet" href="views/css/login.css">

<!-- Contenido de la página -->
<main>
    <div class="formulario-login">
        <h2>Iniciar Sesión</h2>
        <form action="#" method="post">
            <div class="form-group">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Ingresa tu correo electrónico" required>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Ingresa tu contraseña" required>
            </div>
            <p><a href="recuperar-contrasena">¿Olvidaste tu contraseña?</a></p>
            <button type="submit" class="btn-uno" style="width: 100%;">Iniciar Sesión</button>
        </form>
    </div>
</main>
