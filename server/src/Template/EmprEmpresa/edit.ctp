<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmprEmpresa $emprEmpresa
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $emprEmpresa->empr_codigo],
                ['confirm' => __('Are you sure you want to delete # {0}?', $emprEmpresa->empr_codigo)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Empr Empresa'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="emprEmpresa form large-9 medium-8 columns content">
    <?= $this->Form->create($emprEmpresa) ?>
    <fieldset>
        <legend><?= __('Edit Empr Empresa') ?></legend>
        <?php
            echo $this->Form->control('empr_documento');
            echo $this->Form->control('empr_razao_social');
            echo $this->Form->control('empr_ativacao');
            echo $this->Form->control('empr_created');
            echo $this->Form->control('empr_modified');
            echo $this->Form->control('empr_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
