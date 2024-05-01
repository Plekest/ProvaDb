<div class="container mt-5">
    <?php
    $id = $_GET['id'] ?? "";
    $sql = "SELECT * FROM agendamentos WHERE id = {$id}";
    $res = $conn->query($sql);
    $agendamento = $res->fetch_assoc();

    if (!$agendamento) {
        echo "<h1>Agendamento não encontrado</h1>";
        echo "<a href='?page=agenda' class='btn btn-primary'>Voltar</a>";
        exit;
    }
    ?>

    <h2>Editar Agendamento</h2>
    <form action="?page=agendar-salvar" method="POST">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?= $agendamento['id'] ?>">
        <div class="mb-3">
            <label>Data e Hora</label>
            <input type="datetime-local" name="data_hora" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($agendamento['data_hora'])) ?>">
        </div>
        <div class="mb-3">
            <label for="servico">Serviço</label>
            <select name="servico" id="servico" class="form-control">
                <option value="">*Selecione um serviço</option>
                <option value="consulta" <?= $agendamento['servico'] == 'consulta' ? 'selected' : '' ?>>Consulta</option>
                <option value="banho" <?= $agendamento['servico'] == 'banho' ? 'selected' : '' ?>>Banho</option>
                <option value="tosa" <?= $agendamento['servico'] == 'tosa' ? 'selected' : '' ?>>Tosa</option>
                <option value="vacina" <?= $agendamento['servico'] == 'vacina' ? 'selected' : '' ?>>Vacinação</option>
                <option value="exame" <?= $agendamento['servico'] == 'exame' ? 'selected' : '' ?>>Exames</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="pet_id">Pet</label>
            <select name="pet_id" id="pet_id" class="form-control">
                <option value="">*Selecione um pet</option>
                <?php
                $sql = "SELECT * FROM pets";
                $res = $conn->query($sql);
                while ($row = $res->fetch_assoc()) {
                    $selected = $row["id"] == $agendamento['pet_id'] ? 'selected' : '';
                    echo "<option value='{$row["id"]}' {$selected}>{$row["nome"]}</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="">*Selecione um status</option>
                <option value="agendado" <?= $agendamento['status'] == 'agendado' ? 'selected' : '' ?>>Agendado</option>
                <option value="concluido" <?= $agendamento['status'] == 'concluido' ? 'selected' : '' ?>>Concluído</option>
                <option value="cancelado" <?= $agendamento['status'] == 'cancelado' ? 'selected' : '' ?>>Cancelado</option>
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">
                Enviar
            </button>
        </div>
    </form>
</div>