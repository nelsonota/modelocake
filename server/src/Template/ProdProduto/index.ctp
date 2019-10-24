<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProdProduto[]|\Cake\Collection\CollectionInterface $prodProduto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Prod Produto'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="prodProduto index large-9 medium-8 columns content">
    <h3><?= __('Prod Produto') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('prod_codigo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prod_codigo_externo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prod_descricao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prod_valor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prod_valor_custo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prod_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prod_empr_codigo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prod_usua_codigo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prod_created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prod_modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prod_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prodProduto as $prodProduto): ?>
            <tr>
                <td><?= $this->Number->format($prodProduto->prod_codigo) ?></td>
                <td><?= h($prodProduto->prod_codigo_externo) ?></td>
                <td><?= h($prodProduto->prod_descricao) ?></td>
                <td><?= $this->Number->format($prodProduto->prod_valor) ?></td>
                <td><?= $this->Number->format($prodProduto->prod_valor_custo) ?></td>
                <td><?= $this->Number->format($prodProduto->prod_status) ?></td>
                <td><?= $this->Number->format($prodProduto->prod_empr_codigo) ?></td>
                <td><?= $this->Number->format($prodProduto->prod_usua_codigo) ?></td>
                <td><?= h($prodProduto->prod_created) ?></td>
                <td><?= h($prodProduto->prod_modified) ?></td>
                <td><?= h($prodProduto->prod_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $prodProduto->prod_codigo]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $prodProduto->prod_codigo]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $prodProduto->prod_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $prodProduto->prod_codigo)]) ?>
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
