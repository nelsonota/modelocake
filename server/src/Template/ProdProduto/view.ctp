<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProdProduto $prodProduto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Prod Produto'), ['action' => 'edit', $prodProduto->prod_codigo]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Prod Produto'), ['action' => 'delete', $prodProduto->prod_codigo], ['confirm' => __('Are you sure you want to delete # {0}?', $prodProduto->prod_codigo)]) ?> </li>
        <li><?= $this->Html->link(__('List Prod Produto'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prod Produto'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="prodProduto view large-9 medium-8 columns content">
    <h3><?= h($prodProduto->prod_codigo) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Prod Codigo Externo') ?></th>
            <td><?= h($prodProduto->prod_codigo_externo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prod Descricao') ?></th>
            <td><?= h($prodProduto->prod_descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prod Codigo') ?></th>
            <td><?= $this->Number->format($prodProduto->prod_codigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prod Valor') ?></th>
            <td><?= $this->Number->format($prodProduto->prod_valor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prod Valor Custo') ?></th>
            <td><?= $this->Number->format($prodProduto->prod_valor_custo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prod Status') ?></th>
            <td><?= $this->Number->format($prodProduto->prod_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prod Empr Codigo') ?></th>
            <td><?= $this->Number->format($prodProduto->prod_empr_codigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prod Usua Codigo') ?></th>
            <td><?= $this->Number->format($prodProduto->prod_usua_codigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prod Created') ?></th>
            <td><?= h($prodProduto->prod_created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prod Modified') ?></th>
            <td><?= h($prodProduto->prod_modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prod Deleted') ?></th>
            <td><?= h($prodProduto->prod_deleted) ?></td>
        </tr>
    </table>
</div>
