<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tours'), ['controller' => 'Tours', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tour'), ['controller' => 'Tours', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categories view large-9 medium-8 columns content">
    <h3><?= h($category->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($category->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Icon') ?></th>
            <td><?= h($category->icon) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($category->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Tours') ?></h4>
        <?php if (!empty($category->tours)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Image') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Banner') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Position Lng') ?></th>
                <th scope="col"><?= __('Position Lat') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->tours as $tours): ?>
            <tr>
                <td><?= h($tours->id) ?></td>
                <td><?= h($tours->category_id) ?></td>
                <td><?= h($tours->name) ?></td>
                <td><?= h($tours->slug) ?></td>
                <td><?= h($tours->description) ?></td>
                <td><?= h($tours->image) ?></td>
                <td><?= h($tours->price) ?></td>
                <td><?= h($tours->banner) ?></td>
                <td><?= h($tours->address) ?></td>
                <td><?= h($tours->position_lng) ?></td>
                <td><?= h($tours->position_lat) ?></td>
                <td><?= h($tours->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tours', 'action' => 'view', $tours->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tours', 'action' => 'edit', $tours->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tours', 'action' => 'delete', $tours->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tours->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
