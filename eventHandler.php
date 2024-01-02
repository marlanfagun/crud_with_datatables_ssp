<?php

//Incluir arquivo configuração do banco de dados
require_once 'dbConnect.php';

//Recuperar JSON do POST body
$jsonStr = file_get_contents('php://input');
$jsonObj = json_decode($jsonStr);

if ($jsonObj->request_type == 'addEditUser') {
    $user_data = $jsonObj->user_data;
    $nome = !empty($user_data[0]) ? $user_data[0] : '';
    $salario = !empty($user_data[1]) ? $user_data[1] : '';
    $idade = !empty($user_data[2]) ? $user_data[2] : '';
    $id = !empty($user_data[3]) ? $user_data[3] : 0;

    $err = '';
    if (empty($nome)) {
        $err .= 'Por favor digite o nome. <br/>';
    }
    if (empty($salario)) {
        $err .= 'Por favor digite o salário. <br/>';
    }
    if (empty($idade)) {
        $err .= 'Por favor digite a idade. <br/>';
    }

    if (!empty($user_data) && empty($err)) {
        if (!empty($id)) {
            //Update usuários no banco de dados
            $sqlQ = "UPDATE usuarios SET nome = :nome, salario = :salario, idade = :idade WHERE id = :id";
            $stmt = $conn->prepare($sqlQ);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":salario", $salario);
            $stmt->bindValue(":idade", $idade);
            $stmt->bindValue(":id", $id);
            $update = $stmt->execute();

            if ($update) {
                $output = [
                    'status' => 1,
                    'msg' => 'Usuário atualizado com sucesso!'
                ];
                echo json_encode($output);
            } else {
                echo json_encode(['error' => 'Falha ao atualizar dados do usuário!']);
            }
        } else {
            $dt_registro = date('Y-m-d H:s:i');
            $dt_exclusao = NULL;
            $sqlQ = "INSERT INTO usuarios SET nome = :nome, salario = :salario, idade = :idade, dt_registro = :dt_registro, dt_exclusao = :dt_exclusao";
            $stmt = $conn->prepare($sqlQ);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":salario", $salario);
            $stmt->bindValue(":idade", $idade);
            $stmt->bindValue(":dt_registro", $dt_registro);
            $stmt->bindValue(":dt_exclusao", $dt_exclusao);
            $insert = $stmt->execute();

            if($insert){
                $output = [
                    'status' => 1,
                    'msg' => 'Usuário cadastrado com sucesso!'
                ];
                echo json_encode($output);
            }else{
                echo json_encode(['error' => 'Falha ao cadastrar novo usuário!']);
            }
        }
    } else {
        echo json_encode(['error' => trim($err, '<br/>')]);
    }
} elseif ($jsonObj->request_type == 'deleteUser') {
    $id = $jsonObj->user_id;

    $sql = "DELETE FROM usuarios WHERE id=$id";
    $delete = $conn->query($sql);
    if($delete) {
        $output= [
            'status' => 1,
            'msg' => 'Usuário excluído com sucesso!'
        ];
        echo json_encode($output);
    } else {
        echo json_encode(['error' => 'Falha ao deletar registro de usuário!']);
    }
}
