<?php include('templates/header.php');?>
<div class="instructions container">
    <h2 class="instructions__tittle">
        ¿Cómo usar Opti-Recipe?
    </h2>
    <div class="instructions__content">
        <h2 class="instructions__subtitle-line">Menu principal</h2>
        <img class="img"src="src/img/principal_menu.png" alt="">

        <div class="instructions__step">
        <p class="instructions__text">Dentro del menu principal podemos encontrar los botones:</p>
        <ul class="instructions__list">
            <li class="instructions__list-li">Recetas de los pacientes</li>
            <li>Facturas pendientes</li>
            <li>Configuración de la óptica</li>
        </ul>
        <p class="instructions__text">Al acceder a cada uno de ellos podremos encontrar los siguientes apartados:</p>

        </div>
        
        <h2 class="instructions__subtitle">Recetas de los pacientes</h2>
        

        <img class="img"src="src/img/recetas_de_los_pacientes.png" alt="">
        <div class="instructions__step">
        <p class="instructions__text">En este apartado podremos obtener la lista de pacientes que se encuentran registrados en nuestro software, así como tambien agregar nuevos pacientes,ver su historial de recetas, editarlos y eliminarlos.<p>
        <!-- <img class="img__middle"src="src/img/lista_pacientes.png" alt=""> -->
        <p class="instructions__text"> En la cabecera de este apartado veremos los siguientes botones: </p>
        <ul class="instructions__list">
            <li class="instructions__list-li">Menu principal</li>
            <li>Agregar paciente</li>
            <li>Barra de búsqueda por nombre</li>
        </ul>
        <p class="instructions__text">El botón de menu principal permite regresar al menu principal de la aplicación:</p>
        <img class="img__little"src="src/img/boton_menu_principal.png" alt="">
        <p class="instructions__text">El botón de agregar paciente nos permite agregar un nuevo paciente a nuestra lista: </p>
        <img class="img__little"src="src/img/boton_agregar_paciente.png" alt="">
        <p class="instructions__text">La barra de búsqueda permite buscar pacientes por su nombre o iniciales</p>
        <img class="img__middle"src="src/img/barra_busqueda.png" alt="">
        </div>
        <h2 class="instructions__subtitle">Uso de las búsquedas</h2>
        <div class="instructions__step">
        <p class="instructions__text">Para realizar una búsqueda basta con ingresar el nombre del paciente en nuestra barra de búsqueda, puede ser su nombre completo o solo una parte de su nombre</p>
        <img class="img__middle"src="src/img/barra_busqueda.png" alt="">
        <p class="instructions__text">Sí la búsqueda no se realiza correctamente o no se encuentra ningun dato con los términos proporcionados veremos esta leyenda, que nos permitirá regresar a la lista completa de los pacientes:</p>
        <img class="img__middle"src="src/img/busqueda_error.png" alt="">

        
        </div>
        <h2 class="instructions__subtitle">Agregar paciente</h2>
        <div class="instructions__step">
        <img class="img__middle"src="src/img/nuevo_paciente.png" alt="">

        <p class="instructions__text">En este apartado encontraremos un formulario en el que podremos agregar a un nuevo paciente ingresando los siguientes campos: </p>

        <ul class="instructions__list">
            <li class="instructions__list-li">Nombre: el cual es el nombre de nuestro paciente</li>
            <li>Numero de teléfono</li>
            <li>Fecha de nacimiento</li>
            <li>Dirección: la dirección de domicilio de nuestro paciente</li>
            <li>Correo electrónico.</li>
        </ul>
        <p class="instructions__text">Contamos con dos botones:</p>
        <ul class="instructions__list">
            <li class="instructions__list-li">Agregar: que permite agregar al paciente una vez hayamos rellenado e formulario.</li>
            <li>Cancelar: que cancela el llenado del formulario y nos regresa a la lista de pacientes.</li>
        </ul>
        <p class="instructions__text">El único dato obligatorio para agregar un paciente es su nombre y el si este campo queda vació nos saldrá un error:</p>
        <img class="img__middle"src="src/img/error_paciente.png" alt="">

        </div>
        <h2 class="instructions__subtitle">Listado de pacientes:</h2>
        <img class="img"src="src/img/lista_pacientes.png" alt="">
        
        <div class="instructions__step">
        <p class="instructions__text">En esta sección podremos ver un listado de los pacientes con sus respectivos botones que nos permiten gestionar a los pacientes.</p>
        <p class="instructions__text">En la tabla podemos observar los datos más relevantes de los pacientes:</p>

        <ul class="instructions__list">
            <li>Nombre</li>
            <li>Teléfono</li>
            <li>Correo electrónico</li>
            <li>Acciones</li>
        </ul>
        <p class="instructions__text">En la columna de acciones encontraremos tres botones: </p>
        
        <p class="instructions__text">Ver historial del paciente:</p>
        <img class="img__mini"src="src/img/boton_historial_paciente.png" alt="">
        <p class="instructions__text">Este boton permite entrar a ver el historial de recetas de nuestro paciente.</p>
        <p class="instructions__text">Editar paciente:</p>
        <img class="img__mini"src="src/img/boton_editar_paciente.png" alt="">
        <p class="instructions__text">Este boton permite entrar a un formulario donde podremos editar los datos del paciente agregado:</p>
        <img class="img__middle"src="src/img/editar_paciente.png" alt="">
        <p class="instructions__text">En este formulario podremos ver los mismos campos que tenemos al agregar a un nuevo paciente. Aquí encontraremos el boton de "Actualizar paciente" que actualiza los datos que editemos y "cancelar" que nos devolvera al menu principal sin guardar los cambios de la edición del paciente.</p>

        <p class="instructions__text">Borrar paciente:</p>
        <img class="img__mini"src="src/img/boton_eliminar_paciente.png" alt="">
        <p class="instructions__text">Esta sección permite eliminar un paciente de la lista, esta acción sera irreversible y también borrara el historial de recetas del paciente.</p>

        </div>
        </div>
    </div>
</div>
<?php include('templates/footer.php'); ?>