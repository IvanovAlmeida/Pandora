<?php
/**
 * @var \App\Resources\View $this;
 * @var \stdClass[] $users
 */
?>
<div class="col-sm-12">
    <h3>Usuários</h3>
    <hr>
</div>
<div class="col-sm-12">
    <div class="row">
        <table class="table">
            <tbody>
            <tr>
                <th>#</th>
                <th>Nome</th>
            </tr>
            </tbody>
            <tbody>
            <?php foreach($users as $user): ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->name ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>