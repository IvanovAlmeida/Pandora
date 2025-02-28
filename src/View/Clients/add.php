<?php
/**
 * @var \App\Resources\View $this
 * @var \App\Model\Entity\Client $client
 */
?>
<div class="col-sm-12">
    <a href="/clientes" class="btn btn-success btn-sm float-right">
        <i class="fa fa-arrow-left"></i>
    </a>
    <h3>Cadastrar novo Cliente</h3>
    <hr>
</div>
<div class="col-sm-12">

    <form action="" method="post">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="name">Nome</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nome" required>
            </div>
            <div class="form-group col-md-4">
                <label for="price">CPF</label>
                <input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF">
            </div>
            <div class="form-group col-md-4">
                <label for="price">CNPJ</label>
                <input type="text" class="form-control" name="cnpj" id="cnpj" placeholder="CNPJ">
            </div>
            <div class="form-group col-md-12">
                <hr>
                <h6>Contato</h6>
            </div>
            <div class="form-group col-md-4">
                <label for="telephone">Telefone</label>
                <input type="text" class="form-control" name="Contact[telephone]" id="telephone" placeholder="Telefone">
            </div>
            <div class="form-group col-md-8">
                <label for="email">E-Mail</label>
                <input type="email" class="form-control" name="Contact[email]" id="email" placeholder="E-Mail">
            </div>
            <div class="form-group col-md-12">
                <hr>
                <h6>Endereço</h6>
            </div>
            <div class="form-group col-md-8">
                <label for="address">Endereço</label>
                <input type="text" class="form-control" name="Contact[address]" id="address" placeholder="Endereço">
            </div>
            <div class="form-group col-md-4">
                <label for="city">Cidade</label>
                <input type="text" class="form-control" name="Contact[city]" id="city" placeholder="Cidade">
            </div>
            <div class="form-group col-md-4">
                <label for="state">Estado</label>
                <input type="text" class="form-control" name="Contact[state]" id="state" placeholder="Estado">
            </div>
            <div class="form-group col-md-4">
                <label for="country">País</label>
                <input type="text" class="form-control" name="Contact[country]" id="country" placeholder="País">
            </div>
            <div class="form-group col-md-4">
                <label for="zipCode">CEP</label>
                <input type="text" class="form-control" name="Contact[zipCode]" id="zipCode" placeholder="CEP">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12 text-right">
                <button class="btn btn-md btn-success" type="submit"> Salvar </button>
            </div>
        </div>
    </form>

</div>
