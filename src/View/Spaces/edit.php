<?php
/**
 *
 * @var \App\Resources\View $this
 * @var \App\Model\Entity\Space $space
 *
 */
?>
<div class="col-sm-12">
    <a href="/espaco" class="btn btn-success btn-sm float-right">
        <i class="fa fa-arrow-left"></i>
    </a>
    <h3>Editar Espaço</h3>
    <hr>
</div>
<div class="col-sm-12">

    <form action="" method="post">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="name">Nome</label>
                <input type="text" class="form-control" name="name" id="name" value="<?= $space->name ?>" placeholder="Nome" required>
            </div>
            <div class="form-group col-md-12">
                <hr>
                <h6>Contato</h6>
                <input type="hidden" name="Contact[id]"  value="<?= $space->contact_id ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="telephone">Telefone</label>
                <input type="text" class="form-control" name="Contact[telephone]" id="telephone" value="<?= $space->Contact->telephone ?>" placeholder="Telefone">
            </div>
            <div class="form-group col-md-8">
                <label for="email">E-Mail</label>
                <input type="email" class="form-control" name="Contact[email]" id="email"  value="<?= $space->Contact->email ?>" placeholder="E-Mail">
            </div>
            <div class="form-group col-md-12">
                <hr>
                <h6>Endereço</h6>
            </div>
            <div class="form-group col-md-8">
                <label for="address">Endereço</label>
                <input type="text" class="form-control" name="Contact[address]" id="address" value="<?= $space->Contact->address ?>" placeholder="Endereço">
            </div>
            <div class="form-group col-md-4">
                <label for="city">Cidade</label>
                <input type="text" class="form-control" name="Contact[city]" id="city" value="<?= $space->Contact->city ?>" placeholder="Cidade">
            </div>
            <div class="form-group col-md-4">
                <label for="state">Estado</label>
                <input type="text" class="form-control" name="Contact[state]" id="state" value="<?= $space->Contact->state ?>" placeholder="Estado">
            </div>
            <div class="form-group col-md-4">
                <label for="country">País</label>
                <input type="text" class="form-control" name="Contact[country]" id="country" value="<?= $space->Contact->country ?>" placeholder="País">
            </div>
            <div class="form-group col-md-4">
                <label for="zipCode">CEP</label>
                <input type="text" class="form-control" name="Contact[zipCode]" id="zipCode" value="<?= $space->Contact->zipCode ?>" placeholder="CEP">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12 text-right">
                <button class="btn btn-md btn-success" type="submit"> Salvar </button>
            </div>
        </div>
    </form>

</div>
<script>
    $('#telephone').mask('(99) 9999-9999');
    $('#zipCode').mask('99.999-999');
</script>
