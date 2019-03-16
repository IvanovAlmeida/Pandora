<?php
/**
 * @var \App\Resources\View $this
 * @var \App\Model\Entity\Reserve $reserve
 * @var \App\Model\Entity\Service[] $services
 * @var \App\Model\Entity\Client[] $clients
 * @var \App\Model\Entity\Item[] $items
 * @var \App\Model\Entity\Space[] $spaces
 */
?>
<div class="col-sm-12">
    <a href="/reservas" class="btn btn-success btn-sm float-right">
        <i class="fa fa-arrow-left"></i>
    </a>
    <h3>Realizar Reserva</h3>
    <hr>
</div>
<div class="col-sm-12">

    <form action="" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nome do Evento</label>
                <input type="text" class="form-control" name="eventName" id="name" placeholder="Nome" required>
            </div>
            <div class="form-group col-md-6">
                <label for="price">Cliente</label>
                <select name="client_id" class="form-control">
                    <option value=""> -- Escolha um Cliente --</option>
                    <?php foreach($clients as $client): ?>
                        <option value="<?= $client->id ?>"> <?= $client->name ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="price">Espaço</label>
                <select name="space_id" class="form-control">
                    <option value=""> -- Escolha um Espaço --</option>
                    <?php foreach($spaces as $space): ?>
                        <option value="<?= $space->id ?>"> <?= $space->name ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="eventDate">Data do Evento</label>
                <input type="date" class="form-control" name="eventDate" id="eventDate" placeholder="" required>
            </div>
            <div class="form-group col-md-6">
                <label for="price">Itens</label>
                <select name="Items[]" class="form-control" multiple>
                    <?php foreach($items as $item): ?>
                        <option value="<?= $item->id ?>"> <?= $item->name ?> ( R$ <?= number_format($item->price, 2, ',', '.') ?> ) </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="price">Serviços</label>
                <select name="Services[]" class="form-control" multiple>
                    <?php foreach($services as $service): ?>
                        <option value="<?= $service->id ?>"> <?= $service->name ?> ( R$ <?= number_format($service->price, 2, ',', '.') ?> ) </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="value">Valor</label>
                <input type="text" class="form-control" name="value" id="value" placeholder="" required>
            </div>
            <div class="form-group col-md-6">
                <label for="entry">Entrada</label>
                <input type="text" class="form-control" name="entry" id="entry" placeholder="" required>
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
    $('#value, #entry').maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
</script>
