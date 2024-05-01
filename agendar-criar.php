<h1>NOVO AGENDAMENTO</h1>

<form action="?page=agendar-salvar" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Data e Hora</label>
        <input type="datetime-local" name="data_hora" class="form-control">
    </div>
    <div class="mb-3">
        <label for="servico">Serviço</label>
        <select name="servico" id="servico" class="form-control">
            <option value="">*Selecione um serviço</option>
            <option value="consulta">Consulta</option>
            <option value="banho">Banho</option>
            <option value="tosa">Tosa</option>
            <option value="vacina">Vacinação</option>
            <option value="exame">Exames</option>
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
                echo "<option value='{$row["id"]}'>{$row["nome"]}</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="">*Selecione um status</option>
            <option value="agendado">Agendado</option>
            <option value="concluido">Concluído</option>
            <option value="cancelado">Cancelado</option>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">
            Enviar
        </button>
    </div>
</form>