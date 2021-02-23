<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Title $title
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Title'), ['action' => 'edit', $title->emp_no]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Title'), ['action' => 'delete', $title->emp_no], ['confirm' => __('Are you sure you want to delete # {0}?', $title->emp_no)]) ?> </li>
        <li><?= $this->Html->link(__('List Titles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Title'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="titles view large-9 medium-8 columns content">
    <h3><?= h($title->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($title->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Emp No') ?></th>
            <td><?= $this->Number->format($title->emp_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('From Date') ?></th>
            <td><?= h($title->from_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('To Date') ?></th>
            <td><?= h($title->to_date) ?></td>
        </tr>
    </table>
</div>
