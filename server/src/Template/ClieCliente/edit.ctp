<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClieCliente $clieCliente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $clieCliente->clie_codigo],
                ['confirm' => __('Are you sure you want to delete # {0}?', $clieCliente->clie_codigo)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Clie Cliente'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="clieCliente form large-9 medium-8 columns content">
    <?= $this->Form->create($clieCliente) ?>
    <fieldset>
        <legend><?= __('Edit Clie Cliente') ?></legend>
        <?php
            echo $this->Form->control('clie_nome');
            echo $this->Form->control('clie_cnpjcpf');
            echo $this->Form->control('clie_insestrg');
            echo $this->Form->control('clie_insmun');
            echo $this->Form->control('clie_endereco');
            echo $this->Form->control('clie_numero');
            echo $this->Form->control('clie_complemento');
            echo $this->Form->control('clie_bairro');
            echo $this->Form->control('clie_cidade');
            echo $this->Form->control('clie_usua_codigo');
            echo $this->Form->control('clie_empr_codigo');
            echo $this->Form->control('clie_created');
            echo $this->Form->control('clie_modified');
            echo $this->Form->control('clie_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
