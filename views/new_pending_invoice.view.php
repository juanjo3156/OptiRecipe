<?php require("templates/header.php"); ?>
<script>
    Swal.fire(
        {
            icon:"success",
            title:"<?php echo $_GET['msg']?>"
        }
        );
</script>
<div class="container form_new_container">
  <h2>Agregar factura pendiente</h2>
  <i class="fa-solid fa-file-invoice"></i>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="form-recipe__field">
      <label for="patient">Seleccionar paciente:</label>
      <select name="patient" id="patient">
        <option value="">Seleccione un paciente</option>
        <?php foreach ($patients as $patient): ?>
          <option value="<?php echo $patient['patient_id']; ?>"><?php echo $patient['name']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="form-recipe__field" id="recipe-container">
      <label for="recipe">Recetas asociadas:</label>
      <select name="recipe" id="recipe" disabled>
        <option value="">Seleccione un paciente primero</option>
      </select>
    </div>
    <div class="form-recipe__field" id="card-type-container">
      <label for="card_type">Tipo de tarjeta:</label>
      <select name="card_type" id="card_type">
        <option disabled selected>Escoge un tipo de tarjeta</option>
        <option value="Crédito">crédito</option>
        <option value="Débito">débito</option>
      </select>
    </div>

    <!-- Campo oculto para el ID de la receta -->
    <input type="hidden" name="recipe_id" id="recipe_id" value="">

    <div class="form-recipe__field">
      <input type="submit" value="Agregar" class="submit-button">
      <a href="<?php echo RUTA?>pending_invoices.php" class="cancel_button" value="Cancelar">Cancelar</a>

    </div>
  </form>
</div>



<script>
  // Obtener elementos del DOM
  const patientSelect = document.getElementById('patient');
  const recipeSelect = document.getElementById('recipe');
  const recipeIdInput = document.getElementById('recipe_id');

  // Evento de cambio del campo select del paciente
  patientSelect.addEventListener('change', function () {
    const patientId = patientSelect.value;

    // Hacer una petición AJAX para obtener las recetas asociadas al paciente seleccionado
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '<?php echo RUTA; ?>new_pending_invoice.php?patient_id=' + patientId, true);
    xhr.onload = function () {
      if (xhr.status === 200) {
        console.log(xhr.responseText); // Verificar la respuesta JSON en la consola
        // Limpiar las opciones anteriores del campo select de las recetas
        recipeSelect.innerHTML = '';

        // Obtener las recetas del servidor
        const recipes = JSON.parse(xhr.responseText);

        // Crear las opciones del campo select de las recetas
        if (recipes.length > 0) {
          recipeSelect.disabled = false;

          for (let i = 0; i < recipes.length; i++) {
            const option = document.createElement('option');
            option.value = recipes[i].prescription_id;
            option.textContent = recipes[i].folio;
            recipeSelect.appendChild(option);
          }
        } else {
          // Mostrar un mensaje si no hay recetas asociadas al paciente
          recipeSelect.disabled = true;
         
          const option = document.createElement('option');
          option.textContent = 'No hay recetas disponibles';
          recipeSelect.appendChild(option);
        }

      }
    };
    xhr.send();
    
  });
  
  // Evento de cambio del campo select de las recetas
  recipeSelect.addEventListener('change', function () {
  const selectedRecipeId = recipeSelect.value;
  const selectedRecipeFolio = recipeSelect.options[recipeSelect.selectedIndex].text;
  console.log(selectedRecipeId);
  console.log(selectedRecipeFolio);
  recipeIdInput.value = selectedRecipeId;
});

</script>

<?php require("templates/footer.php"); ?>
