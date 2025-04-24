<link rel="stylesheet" href="views/css/registro.css">

<!-- Contenido de la página -->
<main>
    <div class="formulario-contacto">
        <h2>Registro de Usuario</h2>
        <form id="formRegistro" method="post">
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre Completo</label>
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingresa tu nombre" required>
            </div>
            <form >
            <div class="form-group">
                <label for="primer_apellido" class="form-label">Primer apellido</label>
                <input type="text" id="primer_apellido" name="primer_apellido" class="form-control" placeholder="Ingresa tu primer apellido" required>
            </div>
            <div class="form-group">
                <label for="segundo_apellido" class="form-label">Segundo apellido</label>
                <input type="text" id="segundo_apellido" name="segundo_apellido" class="form-control" placeholder="Ingresa tu segundo apellido" required>
            </div>
            <div class="form-group">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" class="form-control" placeholder="Ingresa tu número de teléfono" required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Ingresa tu correo electrónico" required>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Ingresa tu contraseña" required>
            </div>
            <button type="submit" class="btn-uno" style="width: 100%;">Registrarse</button>
        </form>
        <div id="mensajeRegistro" style="margin-top: 10px;"></div>
    </div>
</main>

<script src="views/js/registro.js"></script>