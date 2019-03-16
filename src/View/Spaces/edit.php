<?php
/**
 * @var \App\Resources\View $this
 * @var \App\Model\Entity\Space $espaco
 */
?>
<div class="col-sm-12">
    <a href="/espaco" class="btn btn-success btn-sm float-right">
        <i class="fa fa-arrow-left"></i>
    </a>
    <h3>Alterar Espaço</h3>
    <hr>
</div>
<div class="col-sm-12">

    <form action="" method="post">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="name">Nome</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nome" value="<?= $espaco->name ?>" required>
            </div>
            <div class="form-group col-md-4">
                <label for="telephone">Telefone</label>
                <input type="telephone" class="form-control" name="telephone" id="telephone" value="<?= $espaco->telephone ?>" placeholder="Telefone">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12 text-right">
                <button class="btn btn-md btn-success" type="submit"> Salvar </button>
            </div>
        </div>
    </form>

</div>
