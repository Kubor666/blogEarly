<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Utility\Text;

class CategoriesTable extends table
{
  public function initialize(array $config)
  {
    $this->addBehavior('Timestamp');
    $this->hasMany('Articles'); //assosiations
  }

}
 ?>
