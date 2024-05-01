<table class='table table-striped table-bordered table-responsive-md'>
    <thead class="thead-dark">
        <th scope="col">#</th>
        <th scope="col">Nome do Proprietário</th>
        <th scope="col">Email</th>
        <th scope="col">Telefone</th>
        <th scope="col">Nome do Pet</th>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT proprietarios.id, proprietarios.nome, proprietarios.email, proprietarios.telefone, pets.nome AS nome_pet FROM proprietarios LEFT JOIN pets ON proprietarios.id = pets.proprietario_id";
        $res = $conn->query($sql);

        while ($row = $res->fetch_assoc()) {
            echo "<tr>";
            echo "<th scope='row'>" . $row["id"] . "</th>";
            echo "<td>" . $row["nome"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["telefone"] . "</td>";
            echo "<td>" . $row["nome_pet"] . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
    <tfoot class="thead-dark">
        <a href="?page=novo" class="btn btn-success btn-sm mb-2">Novo Proprietário e Pet</a>

        <th scope="col">#</th>
        <th scope="col">Nome do Proprietário</th>
        <th scope="col">Email</th>
        <th scope="col">Telefone</th>
        <th scope="col">Nome do Pet</th>
    </tfoot>
</table>
