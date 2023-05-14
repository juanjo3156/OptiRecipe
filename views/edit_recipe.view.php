<?php require("templates/header.php") ?>
<div class="container form_new_container">
    <h2>Editar Receta</h2>
    <i class="fa-solid fa-file-pen"></i>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="form-recipe" method="post">
        <div class="form-recipe__field">
            <label for="pacient_name">Paciente:</label>
            <input disabled id="pacient__name" type="text" value="<?php echo $patient_info["name"]?>">
        </div>
        <div class="form-recipe__field">
            <label for="age">Edad:</label>
            <input name ="age" class="form-recipe__age" id="age" type="number" value="<?php echo $recipe_info["age"] ?>">
        </div>
        <div class="form-recipe__field">
            <label for="creation_date">Fecha de creación:</label>
            <input id="creation_date" type="date" name="date" value="<?php echo $recipe_info["date"]?>">
        </div>
        <div class="form-recipe__field">
            <label for="glass_type">Tipo de lente:</label>
            <select id="glass_type" name="glass_type" value="<?php echo $recipe_info["glass_type"]?>">
                <!-- <option selected disabled>--seleccionar--</option> -->
                <option value="Monofocal" <?php if ($recipe_info["glass_type"] == "Monofocal") echo "selected"; ?>>Monofocal</option>
                <option value="Bifocal" <?php if ($recipe_info["glass_type"] == "Bifocal") echo "selected"; ?>>Bifocal</option>
                <option value="Progresiva"<?php if ($recipe_info["glass_type"] == "Progresiva") echo "selected"; ?>>Progresiva</option>
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
                    <td><input type="text" id="esfera_od" name="sphere_right" value="<?php echo $recipe_info["sphere_right"]?>"></td>
                    <td><input type="text" id="cilindro_od" name="cylinder_right" value="<?php echo $recipe_info["cylinder_right"]?>"></td>
                    <td><input type="text" id="eje_od" name="axis_right" value="<?php echo $recipe_info["axis_right"]?>"></td>
                    <td><input type="text" id="altura_od" name="height_right" value="<?php echo $recipe_info["height_right"]?>"></td>
                    <td><input type="text" id="add_od" name="addition_right" value="<?php echo $recipe_info["addition_right"]?>"></td>
                    <td><input type="text" id="dnp_od" name="dnp_right" value="<?php echo $recipe_info["dnp_right"]?>"></td>
                </tr>
                <tr>
                <th>OI</th>
                    <td><input type="text" id="esfera_oi" name="sphere_left" value="<?php echo $recipe_info["sphere_left"]?>"></td>
                    <td><input type="text" id="cilindro_oi" name="cylinder_left" value="<?php echo $recipe_info["cylinder_left"]?>"></td>
                    <td><input type="text" id="eje_oi" name="axis_left" value="<?php echo $recipe_info["axis_left"]?>"></td>
                    <td><input type="text" id="altura_oi" name="height_left" value="<?php echo $recipe_info["height_left"]?>"></td>
                    <td><input type="text" id="add_oi" name="addition_left" value="<?php echo $recipe_info["addition_left"]?>"></td>
                    <td><input type="text" id="dnp_oi" name="dnp_left" value="<?php echo $recipe_info["dnp_left"]?>"></td>
                </tr>
            </table>
            </div>
            <div class="form-recipe__field">
            <label for="notes">Observaciones:</label>
            <textarea name="notes" id="notes" cols="35" rows="4" ><?php echo $recipe_info["notes"]?></textarea>
        </div>
        <div class="form-recipe__field">
            <label for="product_description">Descripción del producto:</label>
            <textarea name="product_description" id="product_description"  rows="4"cols="30"><?php echo $recipe_info["product_description"] ?></textarea>
            </div>
        <div class="form-recipe__field">
            <label for="price">Precio:</label>
            <div class="price_content">
                <label for="">$</label>
                <input class="price_input" id="price" name="price" type="text" placeholder="precio total" value="<?php echo $recipe_info["price"]?>" >
            </div>
        </div> 
        <?php if($error!=''):?>
                <div class="error">
                    <ul>
                        <?php echo $error?>
                    </ul>
                </div>
            <?php endif;?> 
        <div class="form-recipe__field">
            <input type="hidden" name="txtID" value="<?php echo $txtID; ?>">
            <input type="submit" class="save_button" value="Actualizar receta">
            
            <a href="<?php echo RUTA?>consult_recipe.php?txtID=<?php echo $patient_info["patient_id"]?>" class="cancel_button" value="Cancelar">Cancelar</a>
            
        </div>
        
    </form>
</div>
<?php require("templates/footer.php") ?>