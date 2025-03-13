
//Registrar a la mascota
document.getElementById('formRegistrarMascota').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const nombreMascota = document.getElementById('nombreMascota').value;
    const especieMascota = document.getElementById('especieMascota').value;
    const razaMascota = document.getElementById('razaMascota').value;
    const edadMascota = document.getElementById('edadMascota').value;
    const propietarioMascota = document.getElementById('propietarioMascota').value;
    
  
    console.log(`Mascota registrada: ${nombreMascota}, ${especieMascota}, ${razaMascota}, ${edadMascota} años, Propietario: ${propietarioMascota}`);
});


//Consultar a las mascotas
document.getElementById('formConsultarHistorial').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const buscarMascota = document.getElementById('buscarMascota').value;
    
   
    console.log(`Buscando historial de la mascota: ${buscarMascota}`);
    
    //Simulación
    const historial = `
        <h3>Historial de ${buscarMascota}</h3>
        <p>Vacunación: 10/01/2025</p>
        <p>Consulta: 15/02/2025 - Diagnóstico: Infección bacteriana</p>
    `;
    document.getElementById('historialMascota').innerHTML = historial;
});

//Editar a las mascotas
document.getElementById('formEditarMascota').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const nombreMascota = document.getElementById('nombreMascota').value;
    const especieMascota = document.getElementById('especieMascota').value;
    const razaMascota = document.getElementById('razaMascota').value;
    const edadMascota = document.getElementById('edadMascota').value;
    const propietarioMascota = document.getElementById('propietarioMascota').value;
   
    console.log(`Datos de la mascota actualizados: ${nombreMascota}, ${especieMascota}, ${razaMascota}, ${edadMascota} años, Propietario: ${propietarioMascota}`);
    
    const datosActualizados = {
        nombre: nombreMascota,
        especie: especieMascota,
        raza: razaMascota,
        edad: edadMascota,
        propietario: propietarioMascota
    };
    console.log('Datos guardados en el sistema:', datosActualizados);
});


//Gestión de citas
//Agendar citas
document.getElementById('formAgendarCita').addEventListener('submit', function(event) {
    event.preventDefault();

    const mascotaCita = document.getElementById('mascotaCita').value;
    const fechaCita = document.getElementById('fechaCita').value;
    const horaCita = document.getElementById('horaCita').value;
    const motivoCita = document.getElementById('motivoCita').value;

    console.log(`Cita agendada para: ${mascotaCita}, Fecha: ${fechaCita}, Hora: ${horaCita}, Motivo: ${motivoCita}`);
});

//Citas programadas
document.addEventListener('DOMContentLoaded', function() {
    console.log('Cargando citas programadas...');

    // Simulación 
    const citas = [
        { mascota: 'Firulais', fecha: '2025-04-15', hora: '10:00', motivo: 'Vacunación' },
        { mascota: 'Misu', fecha: '2025-04-16', hora: '11:30', motivo: 'Consulta general' }
    ];

    const listaCitas = document.getElementById('listaCitas');
    citas.forEach(cita => {
        const citaElemento = document.createElement('div');
        citaElemento.className = 'cita mb-3';
        citaElemento.innerHTML = `<p><strong>Mascota:</strong> ${cita.mascota}</p>
                                  <p><strong>Fecha:</strong> ${cita.fecha}</p>
                                  <p><strong>Hora:</strong> ${cita.hora}</p>
                                  <p><strong>Motivo:</strong> ${cita.motivo}</p>`;
        listaCitas.appendChild(citaElemento);
    });
});

//Modificar las citas
document.getElementById('formModificarCita').addEventListener('submit', function(event) {
    event.preventDefault();
    const buscarCita = document.getElementById('buscarCita').value;
    console.log(`Buscando cita: ${buscarCita}`);
    
    // Simulación
    const detalleCita = `
        <h3>Detalles de la Cita</h3>
        <p><strong>Mascota:</strong> Firulais</p>
        <p><strong>Fecha:</strong> 2025-04-15</p>
        <p><strong>Hora:</strong> 10:00</p>
        <p><strong>Motivo:</strong> Vacunación</p>
        <button class="btn btn-warning mb-2" id="btnModificar">Modificar</button>
        <button class="btn btn-danger" id="btnCancelar">Cancelar</button>
    `;
    document.getElementById('detalleCita').innerHTML = detalleCita;

    document.getElementById('btnModificar').addEventListener('click', function() {
        // Lógica para modificar la cita
        console.log('Modificando cita...');
    });

    document.getElementById('btnCancelar').addEventListener('click', function() {
        // Lógica para cancelar la cita
        console.log('Cancelando cita...');
    });
});

//Reseñas
//Publicar reseña
document.getElementById('formPublicarExperiencia').addEventListener('submit', function(event) {
    event.preventDefault();

    const nombreCliente = document.getElementById('nombreCliente').value;
    const experienciaCliente = document.getElementById('experienciaCliente').value;

    console.log(`Experiencia publicada por: ${nombreCliente}, Detalle: ${experienciaCliente}`);
});

//Calificar
document.getElementById('formCalificarServicios').addEventListener('submit', function(event) {
    event.preventDefault();

    const nombreCliente = document.getElementById('nombreCliente').value;
    const calificacion = document.getElementById('calificacion').value;
    const comentarios = document.getElementById('comentarios').value;


    console.log(`Calificación enviada por: ${nombreCliente}, Calificación: ${calificacion}, Comentarios: ${comentarios}`);
});
