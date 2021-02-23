<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Salary[]|\Cake\Collection\CollectionInterface $salaries
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Salary'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="salaries index large-9 medium-8 columns content">
    <h3><?= __('Salaries') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('emp_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('salary') ?></th>
                <th scope="col"><?= $this->Paginator->sort('from_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('to_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($salaries as $salary): ?>
            <tr>
                <td><?= $this->Number->format($salary->emp_no) ?></td>
                <td><?= $this->Number->format($salary->salary) ?></td>
                <td><?= h($salary->from_date) ?></td>
                <td><?= h($salary->to_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $salary->emp_no, $salary->from_date->format('Y-m-d')]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $salary->emp_no, $salary->from_date->format('Y-m-d')]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $salary->emp_no, $salary->from_date->format('Y-m-d')], ['confirm' => __('Are you sure you want to delete # {0}?', $salary->emp_no)]) ?>
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
