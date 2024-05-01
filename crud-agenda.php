<?php
// CRUD 
switch ($_REQUEST["acao"]) {
    case "cadastrar":
        $data_hora = $_POST["data_hora"];
        $servico = $_POST["servico"];
        $pet_id = $_POST["pet_id"];
        $status = $_POST["status"];

        $sql = "INSERT INTO agendamentos (
                data_hora, 
                servico, 
                pet_id,
                status
            ) VALUES ('{$data_hora}', '{$servico}', '{$pet_id}', '{$status}')";

        $res = $conn->query($sql);

        if ($res) {
            echo "Dados inseridos com sucesso!";
            sleep(5);
            header("Location: index.php");
        } else {
            echo "Erro ao inserir dados na tabela agendamentos: " . mysqli_error($conn);
        }
        break;
    case "editar":
        $data_hora = $_POST["data_hora"];
        $servico = $_POST["servico"];
        $pet_id = $_POST["pet_id"];
        $status = $_POST["status"];

        $sql = "UPDATE agendamentos 
                        SET 
                            data_hora = '{$data_hora}', 
                            servico = '{$servico}',
                            pet_id = '{$pet_id}',
                            status = '{$status}'
                        WHERE 
                            id = " . $_REQUEST["id"];
        $res = $conn->query($sql);
        if ($res) {
            echo "Dados atualizados com sucesso!";
            sleep(5);
            header("Location: index.php");
        } else {
            echo "Erro ao atualizar dados na tabela agendamentos: " . mysqli_error($conn);
        }
        break;

    case "excluir":
        $sql = "DELETE FROM agendamentos WHERE id = " . $_REQUEST["id"];
        $res = $conn->query($sql);
        if ($res) {
            echo "Registro excluído com sucesso!";
            sleep(5);
            header("Location: index.php");
        } else {
            echo "Erro ao excluir registro na tabela agendamentos: " . mysqli_error($conn);
        }
        break;
    default:
        echo "Ação não permitida";
        break;
}
