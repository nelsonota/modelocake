<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClieCliente[]|\Cake\Collection\CollectionInterface $clieCliente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Clie Cliente'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clieCliente index large-9 medium-8 columns content">
    <h3><?= __('Clie Cliente') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('clie_codigo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clie_nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clie_cnpjcpf') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clie_insestrg') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clie_insmun') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clie_endereco') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clie_numero') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clie_complemento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clie_bairro') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clie_cidade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clie_usua_codigo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clie_empr_codigo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clie_created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clie_modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clie_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clieCliente as $clieCliente): ?>
            <tr>
                <td><?= $this->Number->format($clieCliente->clie_codigo) ?></td>
                <td><?= h($clieCliente->clie_nome) ?></td>
                <td><?= h($clieCliente->clie_cnpjcpf) ?></td>
                <td><?= h($clieCliente->clie_insestrg) ?></td>
                <td><?= h($clieCliente->clie_insmun) ?></td>
                <td><?= h($clieCliente->clie_endereco) ?></td>
                <td><?= h($clieCliente->clie_numero) ?></td>
                <td><?= h($clieCliente->clie_complemento) ?></td>
                <td><?= h($clieCliente->clie_bairro) ?></td>
                <td><?= h($clieCliente->clie_cidade) ?></td>
                <td><?= $this->Number->format($clieCliente->clie_usua_codigo) ?></td>
                <td><?= $this->Number->format($clieCliente->clie_empr_codigo) ?></td>
                <td><?= h($clieCliente->clie_created) ?></td>
                <td><?= h($clieCliente->clie_modified) ?></td>
                <td><?= h($clieCliente->clie_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $clieCliente->clie_codigo]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $clieCliente->clie_codigo]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clieCliente->clie_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $clieCliente->clie_codigo)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
