 <!-- Contenido de la página -->
 <main>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
        </div>
    </nav>

    

    <section id="blog" class="container my-5">
        <h2>Publica un Comentario</h2>
        <form action="submit_comment.php" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="comentario" class="form-label">Comentario:</label>
                <textarea id="comentario" name="comentario" class="form-control" rows="4" required></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Enviar Comentario</button>
        </form>
    </section>
</main>