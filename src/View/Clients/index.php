<?php
/**
 * @var \App\Resources\View $this
 * @var \App\Model\Entity\Client[] $clients
 */
?>
<div class="col-sm-12">
    <a href="/clientes/cadastrar" class="btn btn-success btn-sm float-right">
        <i class="fa fa-plus"></i>
    </a>
    <h3>Clientes</h3>
    <hr>
</div>
<div class="col-sm-12">
    <table class="table tableClients">
        <tbody>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>CPF / CNPJ</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th class="text-center">
                Ações
            </th>
        </tr>
        </tbody>
        <tbody>
        <?php foreach($clients as $client): ?>
            <tr>
                <td><?= $client->id ?></td>
                <td><?= $client->name ?></td>
                <td><?= (strlen($client->cpf) > 0) ? $client->cpf : $client->cnpj ?></td>
                <td><?= $client->telephone ?></td>
                <td><?= $client->email ?></td>
                <td class="text-center">
                    <a class="btn btn-sm btn-warning" href="/clientes/editar/<?= $client->id ?>">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button class="btn btn-sm btn-danger btnApagar text-dark" data-id="<?= $client->id ?>">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
