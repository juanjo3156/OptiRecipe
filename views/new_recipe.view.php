<?php require("templates/header.php") ?>
<div class="container new_pacient_container">
        <h2>Nueva Receta</h2>
        <i class="fa-solid fa-file-circle-plus"></i>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="form-recipe" method="post">
            <div class="form-recipe__field">
                <label for="pacient_name">Paciente:</label>
                <input disabled id="pacient__name" type="text" value="<?php echo "Juan José Ruiz Cruz"?>">
            </div>
            <div class="form-recipe__field">
                <label for="creation_date">Fecha:</label>
                <input id="creation_date" type="date">
            </div>
            <div class="form-recipe__field">
                <label for="glass_type">Tipo de lente:</label>
                <select id="glass_type">
                    <option selected disabled>--seleccionar--</option>
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
                    <th>Prisma</th>
                    <th>Eje</th>
                    <th>Alt</th>
                    <th>Add</th>
                    <th>Dnp</th>
                </tr>
                <tr>
                <th>OD</th>
                    <td><input type="text" id="esfera_od" name="esfera_od" ></td>
                    <td><input type="text" id="cilindro_od" name="cilindro_od" ></td>
                    <td><input type="text" id="prisma_od" name="prisma_od" ></td>
                    <td><input type="text" id="eje_od" name="eje_od" ></td>
                    <td><input type="text" id="altura_od" name="altura_od" ></td>
                    <td><input type="text" id="add_od" name="add_od" ></td>
                    <td><input type="text" id="dnp_od" name="dnp_od" ></td>
                </tr>
                <tr>
                <th>OI</th>
                    <td><input type="text" id="esfera_oi" name="esfera_oi" ></td>
                    <td><input type="text" id="cilindro_oi" name="cilindro_oi" ></td>
                    <td><input type="text" id="prisma_oi" name="prisma_oi" ></td>
                    <td><input type="text" id="eje_oi" name="eje_oi" ></td>
                    <td><input type="text" id="altura_oi" name="altura_oi" ></td>
                    <td><input type="text" id="add_oi" name="add_oi" ></td>
                    <td><input type="text" id="dnp_oi" name="dnp_oi" ></td>
                </tr>
            </table>
            </div>
            <div class="form-recipe__field">
                
                <label for="notes">Obvervaciones:</label>
                <textarea name="" id="notes" cols="35" rows="4"></textarea>
            </div>
        
            <div class="form-recipe__field">
                <label for="price">Precio:</label>
                <div class="price_content">
                    <label for="">$</label>
                    <input class="price_input" id="price" type="text" placeholder="precio total">
                </div>
            </div> 
            <div class="form-recipe__field">
                <input type="submit" class="submit-button " value="Agregar">
            </div>
            
        </form>
    </div>
<?php require("templates/footer.php") ?>