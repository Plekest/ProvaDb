<table class='table table-striped table-bordered table-responsive-md'>
    <thead class="thead-dark">
        <th scope="col">#</th>
        <th scope="col">pet</th>
        <th scope="col">servico</th>
        <th scope="col">Data e Hora</th>
        <th scope="col">Status</th>
        <th scope="col">Ações</th>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM agendamentos";
        $res = $conn->query($sql);
        while ($row = $res->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row["id"]}</td>";
            $petId = $row["pet_id"];
            $query = "SELECT nome FROM pets WHERE id = $petId";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                $pet = $result->fetch_assoc();
                echo "<td>{$pet["nome"]}</td>";
            } else {
                echo "<td>N/A</td>";
            }
            echo "<td>{$row["servico"]}</td>";
            echo "<td>{$row["data_hora"]}</td>";
            echo "<td>{$row["status"]}</td>";
            echo "<td>";
            echo "<a href='?page=editar-agenda&id=" . $row["id"] . "' class='btn btn-primary btn-sm'>Editar</a> ";
            echo "<a href='?page=excluir-agenda&id=" . $row["id"] . "&acao=excluir' class='btn btn-danger btn-sm' onclick='return confirm(\"Deseja realmente excluir este registro?\");'>Excluir</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>

    </tbody>
    <tfoot class="thead-dark">
        <a href="?page=agendar-criar" class="btn btn-success btn-sm mb-2">Agendar</a>

        <th scope="col">#</th>
        <th scope="col">pet</th>
        <th scope="col">servico</th>
        <th scope="col">Data e Hora</th>
        <th scope="col">Status</th>
        <th scope="col">Ações</th>
    </tfoot>
</table>