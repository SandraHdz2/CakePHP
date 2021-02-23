<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Salary $salary
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $salary->emp_no],
                ['confirm' => __('Are you sure you want to delete # {0}?', $salary->emp_no)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Salaries'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="salaries form large-9 medium-8 columns content">
    <?= $this->Form->create($salary) ?>
    <fieldset>
        <legend><?= __('Edit Salary') ?></legend>
        <?php
            echo $this->Form->control('emp_no', ['label'=>'Numero de empleado', 'type' => 'Number']);
            echo $this->Form->control('salary');
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
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
