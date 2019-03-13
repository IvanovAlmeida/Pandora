<?php
/**
 * @var \App\Resources\View $this;
 * @var \App\Model\Entity\User $user
 */
?>
<div class="col-sm-12">
    <a href="/users" class="btn btn-success btn-sm float-right">
        <i class="fa fa-arrow-left"></i>
    </a>
    <h3>Cadstrar Novo Usuário</h3>
    <hr>
</div>
<div class="col-sm-12">

    <form action="" method="post">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="username">Usuário</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Usuário">
            </div>
            <div class="form-group col-md-4">
                <label for="password">Senha</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Senha">
            </div>
            <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12 text-right">
                <button class="btn btn-md btn-success" type="submit"> Salvar </button>
            </div>
        </div>
    </form>

</div>
