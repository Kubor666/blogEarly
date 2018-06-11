<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;

class MainController extends AppController
{
  public function initialize()
  {
    parent::initialize();

    $this->loadComponent('Paginator');
    $this->loadComponent('Flash');
    $this->loadComponent('RequestHandler');
  }

  public function home()
  {

  }

  public function categories()
  {
    $cats = TableRegistry::get('Categories');
    $categories = $cats->find()->toArray();

    $this->set(compact('categories'));
  }

}
