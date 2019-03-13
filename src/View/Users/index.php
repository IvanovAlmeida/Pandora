<?php
/**
 * @var \App\Resources\View $this;
 * @var \App\Model\Entity\User[] $users
 */
?>
<div class="col-sm-12">
    <a href="/users/cadastrar" class="btn btn-success btn-sm float-right">
        <i class="fa fa-plus"></i>
    </a>
    <h3>Usuários</h3>
    <hr>
</div>
<div class="col-sm-12">
    <table class="table">
        <tbody>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>E-Mail</th>
            <th>Criado</th>
            <th>Atualizado</th>
        </tr>
        </tbody>
        <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <td><?= $user->id ?></td>
                <td><?= $user->username ?></td>
                <td><?= $user->email ?></td>
                <td><?= $user->created_at ?></td>
                <td><?= $user->updated_at ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>