<!-- File: src/Template/Articles/index.ctp -->

<h1>Articles</h1>
<?= $this->Html->link('Add Article<br /><br />', ['action' => 'add'], array('escape' => false)); ?>
<table>
  <tr>
    <th>Title</th>
    <th>Created</th>
    <th>Action</th>
  </tr>

  <?php foreach ($articles as $article): ?>
  <tr>
    <td>
      <?= $this->Html->link($article->title, ['action' => 'view', $article->id]) ?>
    </td>
    <td>
      <?= $article->created->format(DATE_RFC850) ?>
    </td>
    <td>
      <?= $this->Html->link('Edit', ['action' => 'edit', $article->id]) ?>
      <?= $this->Form->postLink(
          'Delete',
          ['action' => 'delete', $article->id],
          ['confirm' => 'Are you sure'])
          ?>
    </td>
  </tr>
<?php endforeach; ?>
</table>
