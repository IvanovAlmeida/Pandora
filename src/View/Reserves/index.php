<?php
/**
 * @var \App\Resources\View $this
 * @var \App\Model\Entity\Reserve[] $reserves
 */
?>
<div class="col-sm-12">
    <a href="/reservas/cadastrar" class="btn btn-success btn-sm float-right">
        <i class="fa fa-plus"></i>
    </a>
    <h3>Reservas</h3>
    <hr>
</div>
<div class="col-sm-12">
    <table class="table tableClients">
        <tbody>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Valor</th>
            <th>Entrada</th>
            <th>Data</th>
            <th class="text-center">
                Ações
            </th>
        </tr>
        </tbody>
        <tbody>
        <?php foreach($reserves as $reserve): ?>
            <tr>
                <td><?= $reserve->id ?></td>
                <td><?= $reserve->eventName ?></td>
                <td>R$ <?= number_format($reserve->value, 2, ',', '.') ?></td>
                <td>R$ <?= number_format($reserve->entry, 2, ',', '.') ?></td>
                <td><?= $reserve->eventDate ?></td>
                <td class="text-center">
                    <!--
                    <a class="btn btn-sm btn-warning" href="/clientes/editar/<?= $reserve->id ?>">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button class="btn btn-sm btn-danger btnApagar text-dark" data-id="<?= $reserve->id ?>">
                        <i class="fa fa-trash"></i>
                    </button>
                    -->
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>