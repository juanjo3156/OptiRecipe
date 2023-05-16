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
      <select name="patient" id="patient" class="invoice_use">
        <option value="">Seleccione un paciente</option>
        <?php foreach ($patients as $patient): ?>
          <option value="<?php echo $patient['patient_id']; ?>"><?php echo $patient['name']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-recipe__field" id="recipe-container">
      <label for="recipe">Recetas asociadas:</label>
      <select name="recipe" id="recipe" disabled >
        <option value="">Seleccione un paciente primero</option>
      </select>
    </div>
    <div class="form-recipe__field" >
      <label for="rfc">RFC:</label>
      <input type="text" name="rfc" id="rfc">
    </div>
    <div class="form-recipe__field" >
      <label for="in_name">A nombre de:</label>
      <input type="text" name="in_name" id="in_name">
    </div>
    
    <div class="form-recipe__field" id="card-type-container">
      <label for="card_type">Tipo de tarjeta:</label>
      <select name="card_type" id="card_type" class="invoice_use">
        <option disabled selected>Escoge un tipo de tarjeta</option>
        <option value="Crédito">crédito</option>
        <option value="Débito">débito</option>
      </select>
    </div>
    <div class="form-recipe__field" >
      <label for="invoice_use">Uso de factura:</label>
      <select name="invoice_use" id="invoice_use" class="invoice_use">
        <option disabled selected>Escoge uso de factura</option>
        <option value="G01 Adquisición de mercancías">G01 Adquisición de mercancías</option>
        <option value="G02 Devoluciones, descuentos o bonificaciones">G02 Devoluciones, descuentos o bonificaciones</option>
        <option value="G03 Gastos en general">G03 Gastos en general</option>
        <option value="I01 Construcciones">I01 Construcciones</option>
        <option value="I02 Mobiliario y equipo de oficina por inversiones">I02 Mobiliario y equipo de oficina por inversiones </option>
        <option value="I03 Equipo de transporte">I03 Equipo de transporte</option>
        <option value="I04 Equipo de cómputo y accesorios">I04 Equipo de cómputo y accesorios </option>
        <option value="I05 Dados, troqueles, moldes, matrices y herramental">I05 Dados, troqueles, moldes, matrices y herramental </option>
        <option value="I06 Comunicaciones telefónicas">I06 Comunicaciones telefónicas</option>
        <option value="I07 Comunicaciones satelitales">I07 Comunicaciones satelitales </option>
        <option value="I08 Otra maquinaria y equipo">I08 Otra maquinaria y equipo  </option>
        <option value="D01 Honorarios médicos, dentales y gastos hospitalarios.">D01 Honorarios médicos, dentales y gastos hospitalarios.  </option>
        <option value="D02 Gastos médicos por incapacidad o discapacidad">D02 Gastos médicos por incapacidad o discapacidad   </option>
        <option value="D03 Gastos funerales.">D03 Gastos funerales.   </option>
        <option value="D04 Donativos">D04 Donativos</option>
        <option value="D05 Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación).">D05 Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación).</option>
        <option value="D06 Aportaciones voluntarias al SAR.">D06 Aportaciones voluntarias al SAR.</option>
        <option value=">D07 Primas por seguros de gastos médicos.">D07 Primas por seguros de gastos médicos. </option>
        <option value="D08 Gastos de transportación escolar obligatoria.">D08 Gastos de transportación escolar obligatoria. </option>
        <option value="D09 Depósitos en cuentas para el ahorro.">D09 Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones.  </option>
        <option value="D10 Pagos por servicios educativos (colegiaturas)">D10 Pagos por servicios educativos (colegiaturas)  </option>
        <option value="CP01 Pagos">CP01 Pagos  </option>
        <option value="CN01 Nomina">CN01 Nomina</option>
        <option value="S01 Sin Efectos Fiscales">S01 Sin Efectos Fiscales</option>
        
      </select>
    </div>
    

    <!-- Campo oculto para el ID de la receta -->
    <input type="hidden" name="recipe_id" id="recipe_id" value="">
    <?php if($error!=''):?>
                <div class="error">
                    <ul>
                        <?php echo $error?>
                    </ul>
                </div>
            <?php endif;?> 
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
