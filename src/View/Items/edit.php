<?php
/**
 * @var \App\Resources\View $this
 * @var \App\Model\Entity\Item $item
 */
setlocale(LC_MONETARY, 'pt_br');
?>
<div class="col-sm-12">
    <a href="/itens" class="btn btn-success btn-sm float-right">
        <i class="fa fa-arrow-left"></i>
    </a>
    <h3>Alterar Item</h3>
    <hr>
</div>
<div class="col-sm-12">

    <form action="" method="post">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="name">Nome</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nome" value="<?= $item->name ?>" required>
            </div>
            <div class="form-group col-md-4">
                <label for="price">Preço</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="Preço" value="<?= number_format($item->price,2,',','.') ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="quantity">Quantidade</label>
                <input type="number" class="form-control" name="quantity" min="1" id="quantity" value="<?= $item->quantity ?>" placeholder="Descrição">
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

