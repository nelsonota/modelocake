<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClieCliente $clieCliente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Clie Cliente'), ['action' => 'edit', $clieCliente->clie_codigo]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Clie Cliente'), ['action' => 'delete', $clieCliente->clie_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $clieCliente->clie_codigo)]) ?> </li>
        <li><?= $this->Html->link(__('List Clie Cliente'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clie Cliente'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clieCliente view large-9 medium-8 columns content">
    <h3><?= h($clieCliente->clie_codigo) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Clie Nome') ?></th>
            <td><?= h($clieCliente->clie_nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clie Cnpjcpf') ?></th>
            <td><?= h($clieCliente->clie_cnpjcpf) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clie Insestrg') ?></th>
            <td><?= h($clieCliente->clie_insestrg) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clie Insmun') ?></th>
            <td><?= h($clieCliente->clie_insmun) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clie Endereco') ?></th>
            <td><?= h($clieCliente->clie_endereco) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clie Numero') ?></th>
            <td><?= h($clieCliente->clie_numero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clie Complemento') ?></th>
            <td><?= h($clieCliente->clie_complemento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clie Bairro') ?></th>
            <td><?= h($clieCliente->clie_bairro) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clie Cidade') ?></th>
            <td><?= h($clieCliente->clie_cidade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clie Codigo') ?></th>
            <td><?= $this->Number->format($clieCliente->clie_codigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clie Usua Codigo') ?></th>
            <td><?= $this->Number->format($clieCliente->clie_usua_codigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clie Empr Codigo') ?></th>
            <td><?= $this->Number->format($clieCliente->clie_empr_codigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clie Created') ?></th>
            <td><?= h($clieCliente->clie_created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clie Modified') ?></th>
            <td><?= h($clieCliente->clie_modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clie Deleted') ?></th>
            <td><?= h($clieCliente->clie_deleted) ?></td>
        </tr>
    </table>
</div>
