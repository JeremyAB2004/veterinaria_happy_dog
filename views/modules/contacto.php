<link rel="stylesheet" href="views/css/contacto.css">

<!-- Contenido de la página -->
<main>
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contacto</li>
            </ol>
        </div>
    </nav>

    <!-- Sección de Contacto -->
    <section class="py-5" style="background-color: var(--light-color); border-radius: 8px; margin: 20px 0;">
        <div class="container">
            <div class="contact-header text-center mb-5">
                <h2 style="color: var(--third-color); font-weight: 700; margin-bottom: 15px; position: relative; display: inline-block;">
                    ¿Tienes alguna pregunta?
                    <span style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%); width: 60px; height: 3px; background-color: var(--accent-color);"></span>
                </h2>
                <p style="color: var(--dark-color); font-size: 18px; max-width: 600px; margin: 20px auto 0;">Estamos aquí para ayudarte. Contáctanos por nuestras redes sociales o envíanos un mensaje directo.</p>
            </div>

            <div class="row justify-content-center">
                <!-- Tarjeta de contacto -->
                <div class="col-lg-8">
                    <div style="background-color: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); padding: 30px; position: relative; overflow: hidden;">
                        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 5px; background: linear-gradient(to right, var(--primary-color), var(--secondary-color));"></div>
                        
                        <!-- Redes Sociales -->
                        <div class="social-links text-center mb-4">
                            <h4 style="color: var(--third-color); margin-bottom: 20px; font-size: 20px;">Síguenos en redes sociales</h4>
                            <div class="d-flex justify-content-center">
                                <a href="https://www.facebook.com/HappyDogVet" target="_blank" class="mx-3" style="text-decoration: none;">
                                    <div style="background-color: var(--light-color); width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; border: 2px solid var(--primary-color);">
                                        <img src="views/img/facebook-icon.png" alt="Facebook" width="35">
                                    </div>
                                    <p style="margin-top: 8px; color: var(--dark-color); font-size: 14px; font-weight: 500;">Facebook</p>
                                </a>
                                <a href="https://www.instagram.com/HappyDogVet" target="_blank" class="mx-3" style="text-decoration: none;">
                                    <div style="background-color: var(--light-color); width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; border: 2px solid var(--secondary-color);">
                                        <img src="views/img/instagram-icon.png" alt="Instagram" width="35">
                                    </div>
                                    <p style="margin-top: 8px; color: var(--dark-color); font-size: 14px; font-weight: 500;">Instagram</p>
                                </a>
                                <a href="https://wa.me/50672254473" target="_blank" class="mx-3" style="text-decoration: none;">
                                    <div style="background-color: var(--light-color); width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; border: 2px solid var(--accent-color);">
                                        <img src="views/img/whatsApp-icon.png" alt="WhatsApp" width="35">
                                    </div>
                                    <p style="margin-top: 8px; color: var(--dark-color); font-size: 14px; font-weight: 500;">WhatsApp</p>
                                </a>
                            </div>
                        </div>

                        <hr style="border-color: #eee; margin: 30px 0;">

                        <!-- Email -->
                        <div class="email-contact text-center">
                            <h4 style="color: var(--third-color); margin-bottom: 20px; font-size: 20px;">Envíanos un correo</h4>
                            <p style="color: var(--dark-color); margin-bottom: 25px;">Para consultas, reservas o cualquier información adicional</p>
                            <a href="mailto:contacto@happydog.com" class="btn" style="background: linear-gradient(to right, var(--primary-color), var(--secondary-color)); color: white; padding: 12px 30px; border-radius: 50px; font-weight: 600; text-decoration: none; transition: all 0.3s ease; border: none; box-shadow: 0 4px 10px rgba(113, 181, 216, 0.3);">
                                <i class="far fa-envelope" style="margin-right: 8px;"></i> contacto@happydog.com
                            </a>
                        </div>
                        
                        <div class="contact-info mt-5 pt-4 border-top" style="border-color: #eee !important;">
                            <div class="row text-center">
                                <div class="col-md-4 mb-3">
                                    <div style="color: var(--primary-color); font-size: 24px; margin-bottom: 10px;">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <h5 style="color: var(--third-color); font-size: 16px; font-weight: 600;">Dirección</h5>
                                    <p style="color: var(--dark-color); font-size: 14px;">Del Colegio de Ingenieros y Arquitectos en Curridabat, 500 metros Norte y 300 metros al Este.
                                    Campus San Pedro, San José, Costa Rica.</p>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div style="color: var(--primary-color); font-size: 24px; margin-bottom: 10px;">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <h5 style="color: var(--third-color); font-size: 16px; font-weight: 600;">Teléfono</h5>
                                    <p style="color: var(--dark-color); font-size: 14px;">(+123) 456 7890</p>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div style="color: var(--primary-color); font-size: 24px; margin-bottom: 10px;">
                                        <i class="far fa-clock"></i>
                                    </div>
                                    <h5 style="color: var(--third-color); font-size: 16px; font-weight: 600;">Horario</h5>
                                    <p style="color: var(--dark-color); font-size: 14px;">Lun-Vie: 9am-6pm<br>Sáb: 9am-2pm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        
    </style>
</main>