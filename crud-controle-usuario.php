<?php
// CRUD 
switch ($_REQUEST["acao"]) {
    case "cadastrar":
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $nomePet = $_POST["nomePet"];
        $especie = $_POST["especie"];
        $raca = $_POST["raca"];
        $idadePet = $_POST["idadePet"];

        $sql = "INSERT INTO proprietarios (
                nome, 
                email, 
                telefone
            ) VALUES ('{$nome}', '{$email}', '{$telefone}')";

        $res = $conn->query($sql);

        if ($res) {
            $proprietario_id = mysqli_insert_id($conn);
            $sql = "INSERT INTO pets (
                    nome, 
                    especie, 
                    raca, 
                    idade, 
                    proprietario_id
                ) VALUES ('{$nomePet}', '{$especie}', '{$raca}', '{$idadePet}', '{$proprietario_id}')";

            $res = $conn->query($sql);
            if ($res) {
                echo "Dados inseridos com sucesso!";
                sleep(5);
                header("Location: index.php");
            } else {
                echo "Erro ao inserir dados na tabela pets: " . mysqli_error($conn);
            }
        } else {
            echo "Erro ao inserir dados na tabela proprietarios: " . mysqli_error($conn);
        }
        break;
    case "editar":
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $nome_pet = $_POST["nome_pet"];
        $especie = $_POST["especie"];
        $raca = $_POST["raca"];
        $idade = $_POST["idade"];

        // Atualizar proprietario
        $sql = "UPDATE proprietarios 
                        SET 
                            nome = '{$nome}', 
                            email = '{$email}',
                            telefone = '{$telefone}'
                        WHERE 
                            id = " . $_REQUEST["id"];
        $res = $conn->query($sql);

        // Atualizar pet
        $sql = "UPDATE pets 
                        SET 
                            nome = '{$nome_pet}', 
                            especie = '{$especie}',
                            raca = '{$raca}',
                            idade = '{$idade}'
                        WHERE 
                            proprietario_id = " . $_REQUEST["id"];
        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Editado com Sucesso!')</script>";
            print "<script>location.href='?page=listar'</script>";
        } else {
            print "<script>alert('Não foi possivel Editar!')</script>";
            print "<script>location.href='?page=listar'</script>";
        }
        break;
    case "excluir":
        // Excluir pet
        $sql = "DELETE FROM pets WHERE proprietario_id =" . $_REQUEST["id"];
        $res = $conn->query($sql);

        // Excluir proprietario
        $sql = "DELETE FROM proprietarios WHERE id =" . $_REQUEST["id"];
        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Excluido com Sucesso!')</script>";
            print "<script>location.href='?page=listar'</script>";
        } else {
            print "<script>alert('Não foi possivel Excluir!')</script>";
            print "<script>location.href='?page=listar'</script>";
        }
        break;
}
