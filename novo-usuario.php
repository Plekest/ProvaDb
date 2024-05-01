<h1>NOVO USUARIO</h1>

<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control">
    </div>
    <div class="mb-3">
        <label>E-mail</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label>Telefone</label>
        <input type="tel" name="telefone" class="form-control">
    </div>
    <div class="mb-3">
        <label>Nome do Pet</label>
        <input type="text" name="nomePet" class="form-control">
    </div>
    <div class="mb-3">
        <label>Espécie</label>
        <input type="text" name="especie" class="form-control">
    </div>
    <div class="mb-3">
        <label>Raça</label>
        <input type="text" name="raca" class="form-control">
    </div>
    <div class="mb-3">
        <label>Idade</label>
        <input type="number" name="idadePet" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">
            Enviar
        </button>
    </div>
</form>