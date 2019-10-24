<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsuaUsuario $usuaUsuario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Usua Usuario'), ['action' => 'edit', $usuaUsuario->usua_codigo]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Usua Usuario'), ['action' => 'delete', $usuaUsuario->usua_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $usuaUsuario->usua_codigo)]) ?> </li>
        <li><?= $this->Html->link(__('List Usua Usuario'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usua Usuario'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usuaUsuario view large-9 medium-8 columns content">
    <h3><?= h($usuaUsuario->usua_codigo) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Usua Nome') ?></th>
            <td><?= h($usuaUsuario->usua_nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usua Senha') ?></th>
            <td><?= h($usuaUsuario->usua_senha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usua Email') ?></th>
            <td><?= h($usuaUsuario->usua_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usua Codigo') ?></th>
            <td><?= $this->Number->format($usuaUsuario->usua_codigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usua Empr Codigo') ?></th>
            <td><?= $this->Number->format($usuaUsuario->usua_empr_codigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usua Usua Codigo') ?></th>
            <td><?= $this->Number->format($usuaUsuario->usua_usua_codigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usua Ativacao') ?></th>
            <td><?= h($usuaUsuario->usua_ativacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usua Created') ?></th>
            <td><?= h($usuaUsuario->usua_created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usua Modified') ?></th>
            <td><?= h($usuaUsuario->usua_modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usua Deleted') ?></th>
            <td><?= h($usuaUsuario->usua_deleted) ?></td>
        </tr>
    </table>
</div>
