
function restoreDefaultValues() {
    // Obtener los elementos de los campos del formulario
    var enterpriseNameInput = document.getElementById("enterprise_name");
    var enterpriseNameInput = document.getElementById("optometrist");
    var addressInput = document.getElementById("address");
    var phoneNumberInput = document.getElementById("phone");

    // Restablecer los valores por defecto
    enterpriseNameInput.value = 'OptiRecipe';
    addressInput.value = 'No definido';
    phoneNumberInput.value = 'No definido';
}