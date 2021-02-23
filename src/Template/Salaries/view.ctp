<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Salary $salary
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Salary'), ['action' => 'edit', $salary->emp_no]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Salary'), ['action' => 'delete', $salary->emp_no], ['confirm' => __('Are you sure you want to delete # {0}?', $salary->emp_no)]) ?> </li>
        <li><?= $this->Html->link(__('List Salaries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Salary'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="salaries view large-9 medium-8 columns content">
    <h3><?= h($salary->emp_no) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Emp No') ?></th>
            <td><?= $this->Number->format($salary->emp_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Salary') ?></th>
            <td><?= $this->Number->format($salary->salary) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('From Date') ?></th>
            <td><?= h($salary->from_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('To Date') ?></th>
            <td><?= h($salary->to_date) ?></td>
        </tr>
    </table>
</div>
