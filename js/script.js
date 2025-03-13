document.getElementById('formRegistrarMascota').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const nombreMascota = document.getElementById('nombreMascota').value;
    const especieMascota = document.getElementById('especieMascota').value;
    const razaMascota = document.getElementById('razaMascota').value;
    const edadMascota = document.getElementById('edadMascota').value;
    const propietarioMascota = document.getElementById('propietarioMascota').value;
    
    // Aquí puedes agregar la lógica para guardar los datos en el sistema
    console.log(`Mascota registrada: ${nombreMascota}, ${especieMascota}, ${razaMascota}, ${edadMascota} años, Propietario: ${propietarioMascota}`);
});
