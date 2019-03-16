<?php
/**
 * @var \App\Resources\View $this
 * @var \App\Model\Entity\Service[] $services
 */
?>

<div class="col-sm-12">
    <a href="/servicos/cadastrar" class="btn btn-success btn-sm float-right">
        <i class="fa fa-plus"></i>
    </a>
    <h3>Serviços</h3>
    <hr>
</div>
<div class="col-sm-12">
    <table class="table tableServices">
        <tbody>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Descrição</th>
            <th class="text-center">
                Ações
            </th>
        </tr>
        </tbody>
        <tbody>
        <?php foreach($services as $service): ?>
            <tr>
                <td><?= $service->id ?></td>
                <td><?= $service->name ?></td>
                <td><?= $service->price ?></td>
                <td><?= $service->description?></td>
                <td class="text-center">
                    <a class="btn btn-sm btn-warning" href="/servicos/editar/<?= $service->id ?>">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button class="btn btn-sm btn-danger btnApagar text-dark" data-id="<?= $service->id ?>">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

