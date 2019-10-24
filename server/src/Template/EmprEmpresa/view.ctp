<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmprEmpresa $emprEmpresa
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Empr Empresa'), ['action' => 'edit', $emprEmpresa->empr_codigo]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Empr Empresa'), ['action' => 'delete', $emprEmpresa->empr_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $emprEmpresa->empr_codigo)]) ?> </li>
        <li><?= $this->Html->link(__('List Empr Empresa'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empr Empresa'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="emprEmpresa view large-9 medium-8 columns content">
    <h3><?= h($emprEmpresa->empr_codigo) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Empr Documento') ?></th>
            <td><?= h($emprEmpresa->empr_documento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empr Razao Social') ?></th>
            <td><?= h($emprEmpresa->empr_razao_social) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empr Codigo') ?></th>
            <td><?= $this->Number->format($emprEmpresa->empr_codigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empr Ativacao') ?></th>
            <td><?= h($emprEmpresa->empr_ativacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empr Created') ?></th>
            <td><?= h($emprEmpresa->empr_created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empr Modified') ?></th>
            <td><?= h($emprEmpresa->empr_modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empr Deleted') ?></th>
            <td><?= h($emprEmpresa->empr_deleted) ?></td>
        </tr>
    </table>
</div>
