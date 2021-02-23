<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Title $title
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Titles'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="titles form large-9 medium-8 columns content">
    <?= $this->Form->create($title) ?>
    <fieldset>
        <legend><?= __('Add Title') ?></legend>
        <?php
            echo $this->Form->control('emp_no', ['label'=>'Numero de empleado', 'type' => 'Number']);
            echo $this->Form->control('title',['label' => 'Nombre del titulo', 'type' => 'text']);
            echo $this->Form->control('from_date',[
                'label' => 'Fecha de inicio',
                'type' => 'date',
                'empty' => true,
                'minYear' => date('Y') - 50,
                'maxYear' => date('Y') + 50,
                'monthNames' => false
            ]);
            echo $this->Form->control('to_date', [
                'label' => 'Fecha final',
                'type' => 'date',
                'empty' => true,
                'minYear' => date('Y') - 50,
                'maxYear' => date('Y') + 50,
                'monthNames' => false
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
