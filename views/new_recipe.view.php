<?php require("templates/header.php");?>

<div class="container new_pacient_container">
    <h2>Nueva Receta</h2>
    <i class="fa-solid fa-file-circle-plus"></i>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="form-recipe" method="post">
        <div class="form-recipe__field">
            <label for="pacient_name">Paciente:</label>
            <input disabled id="pacient__name" type="text" value="<?php echo $patient_info["name"]?>">
            <input type="hidden" name="patient_id" value="<?php echo $patient_info['patient_id']; ?>">
        </div>
        <div class="form-recipe__field">
            <label for="creation_date">Fecha:</label>
            <input id="creation_date" type="date" name="date">
        </div>
        <div class="form-recipe__field">
            <label for="glass_type">Tipo de lente:</label>
            <select id="glass_type" name="glass_type">
                <!-- <option selected disabled>--seleccionar--</option> -->
                <option value="Monofocal">Monofocal</option>
                <option value="Bifocal">Bifocal</option>
                <option value="Progresiva">Progresiva</option>
            </select>
        </div>
            <div class="form-recipe__field">
            <table class="graduation_table">
                <tr>
                    <th></th>
                    <th>Esf</th>
                    <th>Cil</th>
                    <th>Eje</th>
                    <th>Alt</th>
                    <th>Add</th>
                    <th>Dnp</th>
                </tr>
                <tr>
                <th>OD</th>
                    <td><input type="text" id="esfera_od" name="sphere_right" ></td>
                    <td><input type="text" id="cilindro_od" name="cylinder_right" ></td>
                    <td><input type="text" id="eje_od" name="axis_right" ></td>
                    <td><input type="text" id="altura_od" name="height_right" ></td>
                    <td><input type="text" id="add_od" name="addition_right" ></td>
                    <td><input type="text" id="dnp_od" name="dnp_right" ></td>
                </tr>
                <tr>
                <th>OI</th>
                    <td><input type="text" id="esfera_oi" name="sphere_left" ></td>
                    <td><input type="text" id="cilindro_oi" name="cylinder_left" ></td>
                    <td><input type="text" id="eje_oi" name="axis_left" ></td>
                    <td><input type="text" id="altura_oi" name="height_left" ></td>
                    <td><input type="text" id="add_oi" name="addition_left" ></td>
                    <td><input type="text" id="dnp_oi" name="dnp_left" ></td>
                </tr>
            </table>
            </div>
            <div class="form-recipe__field">
            <label for="notes">Observaciones:</label>
            <textarea name="notes" id="notes" cols="35" rows="4"></textarea>
        </div>
        <div class="form-recipe__field">
            <label for="price">Precio:</label>
            <div class="price_content">
                <label for="">$</label>
                <input class="price_input" id="price" name="price" type="text" placeholder="precio total">
            </div>
        </div> 
        <div class="form-recipe__field">
            <input type="hidden" name="txtID" value="<?php echo $txtID; ?>">
            <input type="submit" class="submit-button" value="Agregar">
            
            <a href="<?php echo RUTA?>consult_recipe.php?txtID=<?php echo $patient_info["patient_id"]?>" class="cancel_button" value="Cancelar">Cancelar</a>
        </div>
        <?php if($error!=''):?>
                <div class="error">
                    <ul>
                        <?php echo $error?>
                    </ul>
                </div>
            <?php endif;?> 
    </form>
</div>
<?php require("templates/footer.php") ?>