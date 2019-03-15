<?php
/**
 * @var \App\Resources\View $this
 * @var \App\Model\Entity\Item[] $items
 */
?>
<div class="col-sm-12">
    <a href="/itens/cadastrar" class="btn btn-success btn-sm float-right">
        <i class="fa fa-plus"></i>
    </a>
    <h3>Itens</h3>
    <hr>
</div>
<div class="col-sm-12">
    <table class="table tableItens">
        <tbody>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Criado</th>
            <th>Atualizado</th>
            <th class="text-center">
                Ações
            </th>
        </tr>
        </tbody>
        <tbody>
        <?php foreach($items as $item): ?>
            <tr>
                <td><?= $item->id ?></td>
                <td><?= $item->name ?></td>
                <td><?= $item->price ?></td>
                <td><?= $item->quantity ?></td>
                <td><?= $item->created_at ?></td>
                <td><?= $item->updated_at ?></td>
                <td>
                    <button class="btn btn-sm btn-danger btnApagar" data-id="<?= $item->id ?>">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

