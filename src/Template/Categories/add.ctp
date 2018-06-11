<h1>Add Category</h1>
<?php
  echo $this->Form->create($category);
  echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
  echo $this->Form->control('name');
  echo $this->Form->button(__('Save Category'));
  echo $this->Form->end();
 ?>
