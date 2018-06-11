<div class='container'>
  <h1>Categories</h1>
  <?= $this->Html->link('Add Category<br />', ['controller' => 'Categories', 'action' => 'add'], array('escape' => false)); ?>
  <br>
  <div class='row'>
    <?php foreach($categories as $category): ?>
      <div class='card col-8'>
        <?= $category->name ?>
      </h3>
        <p class='card-text'>
          <?= $this->Html->link('Go inside', ['controller'=>'Categories','action' => 'view', $category->id], ['class' => 'btn btn-primary']) ?>
        </p>
      </div>
    <?php endforeach; ?>
  </div>

</div>
