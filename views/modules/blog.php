<main>
    <section id="blog" class="container my-5">
        <h2>Publicar Blog</h2>
        <form id="formBlog">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" id="titulo" name="titulo" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="contenido" class="form-label">Contenido:</label>
                <textarea id="contenido" name="contenido" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="autor" class="form-label">Autor:</label>
                <input type="text" id="autor" name="autor" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Publicar Blog</button>
        </form>
    </section>

    <section id="lista-blogs" class="container my-5">
        <h2>Blogs Publicados</h2>
    </section>
</main>

<script src="views/js/blog.js"></script>