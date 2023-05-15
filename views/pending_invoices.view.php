<?php require("templates/header.php"); ?>
<?php if(isset($_GET['msg'])){ ?>
<script>
    Swal.fire(
        {
            icon:"success",
            title:"<?php echo $_GET['msg']?>"
        }
        );
</script>
<?php } ?>
        <div class="recipe-head container">
            <a class="black-button"href="<?php echo RUTA?>">
            <i class="fa-solid fa-house-chimney"></i>
            <p>Menu principal</p>
            </a>
            <a class="black-button"href="<?php echo RUTA?>new_pending_invoice.php">
            <i class="fa-solid fa-file-invoice"></i>
            <p>Agregar factura pendiente</p>
            </a>
        </div>
        <div class="table container">
        <?php if(count($pending_invoices) > 0): // Verificar si se encontraron resultados ?>
           
            <table class="table__content">
                <thead class="table__head">
                    <tr>
                        <th class="table__head-element"><h2>Receta</h2></th>
                        <th class="table__head-element"><h2>Paciente</h2></th>
                        <th class="table__head-element"><h2>Monto</h2></th>
                        <th class="table__head-element"><h2>Tarjeta</h2></th>
                        <th class="table__head-element"><h2>Acciones</h2></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pending_invoices as $pending_invoice):?>
                    <tr class="table__row">
                        <td><?php echo $pending_invoice["prescription_folio"]?></td>
                        <td class="center"><?php echo $pending_invoice["name"]?></td>
                        <td class="center">$<?php echo $pending_invoice["amount"]?></td>
                        <td><?php echo $pending_invoice["card_type"]?></td>
                        <td class="table__actions">
                            <a href="javascript:borrar(<?php echo $pending_invoice["invoice_id"]?>);" class="button-red"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                <?php else: // Si no hay resultados, mostrar mensaje ?>
                    <div class="center search-error">
                        <p>No se encontraron Facturas pendientes</p>
                    </div>
                   
                <?php endif; ?>
                </tbody>
                
            </table>
            
            </div>
            <script>
                function borrar(id){
                    Swal.fire({
                    title: '¿Seguro que deseas borrar la factura pendiente?',
                    text: "Esta acción no se puede revertir",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#007E07',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, borrar factura pendiente!',
                    cancelButtonText: 'No, cancelar!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        
                        window.location = "<?php echo RUTA?>delete_pending_invoice.php?delete_id="+id;
                        
                    }
                    })

                                    }
            </script>
<?php require("templates/footer.php"); ?>