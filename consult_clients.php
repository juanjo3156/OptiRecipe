<?php 
    session_start();
    require('config/config.php');
    require('scripts/db.php');
    
    if (isset($_GET['search'])) {
        $searchQuery = $_GET['search'];
        $statement = $connection->prepare("SELECT * FROM patients WHERE name LIKE :searchQuery ORDER BY name ASC");
        $searchParam = '%' . $searchQuery . '%';
        $statement->bindParam(":searchQuery", $searchParam);
        $statement->execute();
        $patients = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $statement = $connection->prepare("SELECT * FROM patients ORDER BY name ASC");
        $statement->execute();
        $patients = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Obtener el número total de pacientes
    $totalPatients = $statement->rowCount();
    
    // Definir la cantidad de pacientes por página
    $patientsPerPage = 10;
    
    // Calcular el número total de páginas
    $totalPages = ceil($totalPatients / $patientsPerPage);
    
    // Obtener el número de página actual
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    $currentPage = max(1, min($currentPage, $totalPages)); // Asegurarse de que el número de página esté dentro del rango válido
    
    // Calcular el desplazamiento (offset) para la consulta SQL
    $offset = ($currentPage - 1) * $patientsPerPage;
    
    // Modificar la consulta SQL para incluir la paginación
    if (isset($_GET['search'])) {
        $searchQuery = $_GET['search'];
        $statement = $connection->prepare("SELECT * FROM patients WHERE name LIKE :searchQuery ORDER BY name ASC LIMIT :offset, :limit");
        $searchParam = '%' . $searchQuery . '%';
        $statement->bindParam(":searchQuery", $searchParam);
        $statement->bindParam(":offset", $offset, PDO::PARAM_INT);
        $statement->bindParam(":limit", $patientsPerPage, PDO::PARAM_INT);
    } else {
        $statement = $connection->prepare("SELECT * FROM patients ORDER BY name ASC LIMIT :offset, :limit");
        $statement->bindParam(":offset", $offset, PDO::PARAM_INT);
        $statement->bindParam(":limit", $patientsPerPage, PDO::PARAM_INT);
    }
    
    $statement->execute();
    $patients = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    require('views/consult_clients.view.php');
    ?>
    