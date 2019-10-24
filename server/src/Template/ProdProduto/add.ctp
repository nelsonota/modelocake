<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProdProduto $prodProduto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Prod Produto'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="prodProduto form large-9 medium-8 columns content">
    <?= $this->Form->create($prodProduto) ?>
    <fieldset>
        <legend><?= __('Add Prod Produto') ?></legend>
        <?php
            echo $this->Form->control('prod_codigo_externo');
            echo $this->Form->control('prod_descricao');
            echo $this->Form->control('prod_valor');
            echo $this->Form->control('prod_valor_custo');
            echo $this->Form->control('prod_status');
            echo $this->Form->control('prod_empr_codigo');
            echo $this->Form->control('prod_usua_codigo');
            echo $this->Form->control('prod_created');
            echo $this->Form->control('prod_modified');
            echo $this->Form->control('prod_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
