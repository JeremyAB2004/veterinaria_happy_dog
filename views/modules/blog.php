<link rel="stylesheet" href="views/css/blog.css">

<section id="blog" class="container my-5">
    <div class="blog-header" style="background-color: var(--light-color); border-left: 5px solid var(--primary-color); padding: 20px; border-radius: 5px; margin-bottom: 30px;">
        <h2 style="color: var(--third-color); font-weight: bold; margin-bottom: 15px;">Publicar Blog</h2>
        <p style="color: var(--dark-color); font-size: 16px;">Comparte tus ideas y conocimientos con la comunidad</p>
    </div>
    
    <form id="formBlog" style="background-color: white; padding: 25px; border-radius: 8px; box-shadow: 0 3px 10px rgba(0,0,0,0.1);">
        <div class="mb-3">
            <label for="titulo" class="form-label" style="font-weight: 600; color: var(--third-color);">Título:</label>
            <input type="text" id="titulo" name="titulo" class="form-control" required style="border: 1px solid #ddd; padding: 10px; border-radius: 5px;">
        </div>
        
        <div class="mb-3">
            <label for="contenido" class="form-label" style="font-weight: 600; color: var(--third-color);">Contenido:</label>
            <textarea id="contenido" name="contenido" class="form-control" rows="6" required style="border: 1px solid #ddd; padding: 10px; border-radius: 5px;"></textarea>
        </div>

        <?php if ($usuarioLogueado): ?>
            <div class="mb-3">
                <label for="autor" class="form-label" style="font-weight: 600; color: var(--third-color);">Autor:</label>
                <input type="text" id="autor" name="autor" class="form-control" value="<?php echo htmlspecialchars($usuarioLogueado['nombre']) ?>" required style="border: 1px solid #ddd; padding: 10px; border-radius: 5px;" readonly>
            </div>
        <?php else: ?>
            <div class="mb-3">
                <label for="autor" class="form-label" style="font-weight: 600; color: var(--third-color);">Autor:</label>
                <input type="text" id="autor" name="autor" class="form-control" required style="border: 1px solid #ddd; padding: 10px; border-radius: 5px;">
            </div>
        <?php endif; ?>
        
        <button type="submit" class="btn" style="background-color: var(--primary-color); color: white; padding: 10px 25px; border: none; border-radius: 5px; font-weight: 600; transition: all 0.3s ease;">
            <i class="fas fa-paper-plane"></i> Publicar Blog
        </button>
    </form>
</section>

<section id="lista-blogs" class="container my-5">
    <div class="blog-list-header" style="background-color: var(--light-color); border-left: 5px solid var(--secondary-color); padding: 20px; border-radius: 5px; margin-bottom: 30px;">
        <h2 style="color: var(--third-color); font-weight: bold;">Blogs Publicados</h2>
        <p style="color: var(--dark-color); font-size: 16px;">Explora el contenido compartido por nuestra comunidad</p>
    </div>
    
    <div id="blogs-container" style="background-color: white; padding: 15px; border-radius: 8px; box-shadow: 0 3px 10px rgba(0,0,0,0.1);">
        <!-- Aquí se cargarán dinámicamente los blogs -->
    </div>
</section>

<script src="views/js/blog.js"></script>