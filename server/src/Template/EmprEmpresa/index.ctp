<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmprEmpresa[]|\Cake\Collection\CollectionInterface $emprEmpresa
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Empr Empresa'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="emprEmpresa index large-9 medium-8 columns content">
    <h3><?= __('Empr Empresa') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('empr_codigo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empr_documento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empr_razao_social') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empr_ativacao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empr_created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empr_modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empr_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($emprEmpresa as $emprEmpresa): ?>
            <tr>
                <td><?= $this->Number->format($emprEmpresa->empr_codigo) ?></td>
                <td><?= h($emprEmpresa->empr_documento) ?></td>
                <td><?= h($emprEmpresa->empr_razao_social) ?></td>
                <td><?= h($emprEmpresa->empr_ativacao) ?></td>
                <td><?= h($emprEmpresa->empr_created) ?></td>
                <td><?= h($emprEmpresa->empr_modified) ?></td>
                <td><?= h($emprEmpresa->empr_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $emprEmpresa->empr_codigo]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $emprEmpresa->empr_codigo]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $emprEmpresa->empr_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $emprEmpresa->empr_codigo)]) ?>
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
