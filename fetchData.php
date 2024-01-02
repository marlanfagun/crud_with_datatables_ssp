<?php
//Include the configuration file
include_once 'config.php';

// Database connection info 
$dbDetails = array(
    'host' => DB_HOST,
    'user' => DB_USER,
    'pass' => DB_PASS,
    'db'   => DB_NAME
);

// DB table to use 
$table = 'usuarios';

// Table's primary key 
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array(

    array('db' => 'id', 'dt' => 0),
    array(
        'db'        => 'nome',
        'dt'        => 1,
        'formatter' => function ($d, $row) {
            return '<a style="text-decoration:none;color:#000;" href="#" target="_blank"> '. $d .'</a>';
        }
    ),
    array('db' => 'salario', 'dt' => 2),
    array('db' => 'idade', 'dt' => 3),
    array(
        'db'        => 'dt_registro',
        'dt'        => 4,
        'formatter' => function ($d, $row) {
            if ($d === null) {
                return '';
            } else {
                return date('d/m/Y', strtotime($d));
            }
        }
    ),
    array(
        'db'        => 'dt_exclusao',
        'dt'        => 5,
        'formatter' => function ($d, $row) {
            if ($d === null) {
                return '';
            } else {
                return date('d/m/Y', strtotime($d));
            }
        }
    ),
    array(
        'db'        => 'dt_registro',
        'dt'        => 6,
        'formatter' => function ($dt_registro, $row) {
            $dt_exclusao = $row['dt_exclusao']; // Obtendo o valor de 'dt_exclusao' desta linha

            // Verificando se 'dt_exclusao' é nulo
            if ($dt_exclusao === null) {
                $dt_exclusao = date('Y-m-d'); // Usando a data atual se 'dt_exclusao' for nulo
            }

            // Calculando a diferença em dias se ambos 'dt_registro' e 'dt_exclusao' forem válidos
            if ($dt_registro !== null && $dt_exclusao !== null) {
                $diff = abs(strtotime($dt_exclusao) - strtotime($dt_registro));
                $diferenca_dias = floor($diff / (60 * 60 * 24)); // Calculando a diferença em dias
                return $diferenca_dias . ' dias';
            }

            return ''; // Retornando vazio se não for possível calcular a diferença em dias
        }
    ),
    array(
        'db'        => 'id',
        'dt'        => 7,
        'formatter' => function ($d, $row) {
            return ' 
                <a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="editData('.htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8').')">Editar</a>&nbsp; 
                <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="deleteData('.$d.')">Deletar</a> 
            ';
        }
    )
);

// Include SQL query processing class 
require 'ssp.class.php';

// Output data as json format 
echo json_encode(
    SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
);
