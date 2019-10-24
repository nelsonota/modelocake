<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsuaUsuario[]|\Cake\Collection\CollectionInterface $usuaUsuario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Usua Usuario'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usuaUsuario index large-9 medium-8 columns content">
    <h3><?= __('Usua Usuario') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('usua_codigo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usua_nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usua_senha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usua_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usua_empr_codigo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usua_ativacao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usua_usua_codigo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usua_created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usua_modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usua_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuaUsuario as $usuaUsuario): ?>
            <tr>
                <td><?= $this->Number->format($usuaUsuario->usua_codigo) ?></td>
                <td><?= h($usuaUsuario->usua_nome) ?></td>
                <td><?= h($usuaUsuario->usua_senha) ?></td>
                <td><?= h($usuaUsuario->usua_email) ?></td>
                <td><?= $this->Number->format($usuaUsuario->usua_empr_codigo) ?></td>
                <td><?= h($usuaUsuario->usua_ativacao) ?></td>
                <td><?= $this->Number->format($usuaUsuario->usua_usua_codigo) ?></td>
                <td><?= h($usuaUsuario->usua_created) ?></td>
                <td><?= h($usuaUsuario->usua_modified) ?></td>
                <td><?= h($usuaUsuario->usua_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $usuaUsuario->usua_codigo]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usuaUsuario->usua_codigo]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usuaUsuario->usua_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $usuaUsuario->usua_codigo)]) ?>
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
