<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Utility\Text;

class ArticlesTable extends Table
{
  public function initialize(array $config)
  {
    $this->addBehavior('Timestamp');
    $this->belongsTo('Categories'); //assosiations
  }

  /*public function beforeSave($event, $entity, $options)
  {
    if ($entity->isNew() && !entity->slug)  {
      $sluggedTitle = Text::slug($entity->title);
      $entity->slug = substr($sluggedTitle, 0, 191);
    }
  }*/
}

?>
