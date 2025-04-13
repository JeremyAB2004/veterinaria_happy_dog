<!-- Contenido de la página -->
<main>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Clientes agregar</li>
            </ol>
        </div>
    </nav>
    <!-- Sección: Gestión de Usuarios -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Gestión de Usuarios</h2>
            <p class="text-center">Administra los usuarios del sistema, asignando permisos y roles.</p>
            <form>
                <div class="mb-3">
                    <label for="usuario" class="form-label">Nombre de Usuario</label>
                    <input type="text" class="form-control" id="usuario" required>
                </div>
                <div class="mb-3">
                    <label for="rol" class="form-label">Rol</label>
                    <select class="form-control" id="rol">
                        <option>Administrador</option>
                        <option>Veterinario</option>
                        <option>Recepcionista</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-uno">Asignar Rol</button>
            </form>
        </div>
    </section>
</main>