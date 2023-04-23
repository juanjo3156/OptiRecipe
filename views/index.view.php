<?php include('templates/header.php');?>
<!-- Sección principal del programa donde se mostrara el menu principal -->
<h2 class="container tittle">Escoge una opción</h2>
<div class="container content">
    <div class="content__grid">
        <a href="<?php echo RUTA?>consult_clients.php"class="content__option">
            <div>
                <p>Consultar Recetas</p>
                <i class="fa-solid fa-list"></i>
            </div>
        </a>
        <a href="#"class="content__option">
            <div>
                
                <p>Nueva Receta</p>
                <i class="fa-solid fa-sheet-plastic"></i>
            </div>
            
        </a>
        <a href="#"class="content__option">
            <div>
                <p>Facturas Pendientes</p>
                <i class="fa-solid fa-file-invoice"></i>
            </div>
            
        </a>
        <a href="#"class="content__option">
            <div>
                <p>Configuraciones</p>
                <i class="fa-solid fa-sliders"></i>
                
            </div>
            
        </a>
    </div>
</div>

<?php include('templates/footer.php'); ?>