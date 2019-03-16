<?php
/**
 * @var \App\Resources\View $this
 * @var \App\Model\Entity\Space[] $espacos
 */
?>
<div class="col-sm-12">
    <a href="/espacos/cadastrar" class="btn btn-success btn-sm float-right">
        <i class="fa fa-plus"></i>
    </a>
    <h3>Espaços</h3>
    <hr>
</div>
<div class="col-sm-12">
    <table class="table tableEspacos">
        <tbody>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Criado</th>
            <th>Atualizado</th>
            <th class="text-center">
                Ações
            </th>
        </tr>
        </tbody>
        <tbody>
        <?php foreach($espacos as $espaco): ?>
            <tr>
                <td><?= $espaco->id ?></td>
                <td><?= $espaco->name ?></td>
                <td><?= $espaco->telephone ?></td>
                <td><?= $espaco->created_at ?></td>
                <td><?= $espaco->updated_at ?></td>
                <td class="text-center">
                    <a class="btn btn-sm btn-warning" href="/espacos/editar/<?= $espaco->id ?>">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button class="btn btn-sm btn-danger btnApagar text-dark" data-id="<?= $espaco->id ?>">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

