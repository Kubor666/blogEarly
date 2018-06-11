
<h1><?= h($category->name) ?></h1>
<p><?= h($category->body) ?></p>
<table>
  <tr>
    <th>Title</th>
  </tr>

  <?php foreach ($category->articles as $article): ?>
  <tr>
    <td>
      <?= $this->Html->link($article->title, ['controller'=>'Articles','action' => 'view', $article->id]) ?>
    </td>
  </tr>
<?php endforeach; ?>
</table>
