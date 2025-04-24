<?php
require_once "../models/blog.model.php";

class BlogController {
    public static function ctrObtenerBlogs() {
        return BlogModel::mdlObtenerBlogs();
    }

    public static function ctrGuardarBlog($datos) {
        return BlogModel::mdlGuardarBlog($datos);
    }


    /*public static function ctrConvertirEnNoticia($id_post) {
        return BlogModel::mdlConvertirEnNoticia($id_post);
    }

    public static function ctrObtenerNoticias() {
        return BlogModel::mdlObtenerNoticias();
    }*/
}
?>