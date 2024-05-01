<div class="container mt-5">
    <?php
    $id = $_GET['id'] ?? "";
    
    $sql = "SELECT proprietarios.id, proprietarios.nome, proprietarios.email, proprietarios.telefone, pets.nome AS nome_pet, pets.especie, pets.raca, pets.idade FROM proprietarios LEFT JOIN pets ON proprietarios.id = pets.proprietario_id WHERE proprietarios.id = $id";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();

    $nome = $row['nome'];
    $email = $row['email'];
    $telefone = $row['telefone'];
    $nome_pet = $row['nome_pet'];
    $especie = $row['especie'];
    $raca = $row['raca'];
    $idade = $row['idade'];
    ?>

    <h2>Editar Proprietário e Pet</h2>
    <form method="POST" action="?page=salvar">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
            <label for="nome">Nome do Proprietário:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $telefone; ?>">
        </div>
        <div class="form-group">
            <label for="nome_pet">Nome do Pet:</label>
            <input type="text" class="form-control" id="nome_pet" name="nome_pet" value="<?php echo $nome_pet; ?>">
        </div>
        <div class="form-group">
            <label for="especie">Espécie:</label>
            <input type="text" class="form-control" id="especie" name="especie" value="<?php echo $especie; ?>">
        </div>
        <div class="form-group">
            <label for="raca">Raça:</label>
            <input type="text" class="form-control" id="raca" name="raca" value="<?php echo $raca; ?>">
        </div>
        <div class="form-group">
            <label for="idade">Idade:</label>
            <input type="number" class="form-control" id="idade" name="idade" value="<?php echo $idade; ?>">
        </div>
        <button type="submit" name="editar" class="btn btn-primary">Editar</button>
    </form>
</div>
