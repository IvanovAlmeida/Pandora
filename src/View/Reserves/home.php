<?php
/**
 * @var \App\Resources\View $this
 * @var \App\Model\Entity\Reserve[] $proximos
 */
?>
<div class="col-sm-12">
    <h3>Últimas Reservas</h3>
    <hr>
</div>
<div class="col-sm-12">
    <div class="row">
        <?php foreach($proximos as $proximo): ?>
        <div class="col-sm-4 mb-4">
            <div class="card border-primary">
                <div class="card-header">
                    <?= $proximo->eventName ?>
                </div>
                <div class="card-body">
                    Data: <?= $proximo->eventDate ?> <br>
                    Cliente: <?= $proximo->name ?> <br>
                    Entrada: R$ <?= number_format($proximo->entry, 2, ',','.') ?><br>
                    Valor Total: R$ <?= number_format($proximo->value, 2, ',','.') ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>