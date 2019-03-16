<?php
/**
 * @var \App\Resources\View $this;
 */
?>
<div class="col-sm-12">
    <a href="/servicos" class="btn btn-success btn-sm float-right">
        <i class="fa fa-arrow-left"></i>
    </a>
    <h3>Cadastrar Novo Serviço</h3>
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
                <label for="price">Preço</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="Preço">
            </div>
            <div class="form-group col-md-4">
                <label for="description">Descrição</label>
                <input type="description" class="form-control" name="description" id="description" placeholder="Descrição">
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
    $('#price').maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
</script>