<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsuaUsuario $usuaUsuario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Usua Usuario'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="usuaUsuario form large-9 medium-8 columns content">
    <?= $this->Form->create($usuaUsuario) ?>
    <fieldset>
        <legend><?= __('Add Usua Usuario') ?></legend>
        <?php
            echo $this->Form->control('usua_nome');
            echo $this->Form->control('usua_senha');
            echo $this->Form->control('usua_email');
            echo $this->Form->control('usua_empr_codigo');
            echo $this->Form->control('usua_ativacao');
            echo $this->Form->control('usua_usua_codigo');
            echo $this->Form->control('usua_created');
            echo $this->Form->control('usua_modified');
            echo $this->Form->control('usua_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
