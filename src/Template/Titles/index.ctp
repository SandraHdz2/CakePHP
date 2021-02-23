<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Title[]|\Cake\Collection\CollectionInterface $titles
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Title'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="titles index large-9 medium-8 columns content">
    <h3><?= __('Titles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('emp_no','No. Empleado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title','Titulo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('from_date','Fecha de inicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('to_date','Fecha final') ?></th>
                <th scope="col" class="actions"><?= __('Acciones','Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($titles as $title): ?>
            <tr>
                <td><?= $this->Number->format($title->emp_no) ?></td>
                <td><?= h($title->title) ?></td>
                <td><?= h($title->from_date) ?></td>
                <td><?= h($title->to_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $title->emp_no, $title->title, $title->from_date->format('Y-m-d')])?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit',$title->emp_no, $title->title, $title->from_date->format('Y-m-d')]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $title->emp_no, $title->title, $title->from_date->format('Y-m-d')], ['confirm' => __('Are you sure you want to delete # {0}?', $title->emp_no)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primero')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Ultimo') . ' >>') ?>
         </ul>
    <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registros(s) de un total de {{count}}')]) ?></p>
    </div>
    
</div>
