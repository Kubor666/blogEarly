<?php

namespace App\Controller;

use CAKE\ORM\Table;

class CategoriesController extends AppController
{

  public function initialize()
  {
    parent::initialize();

    $this->loadComponent('Paginator');
    $this->loadComponent('Flash');
  }

  public function add()
  {
    $category = $this->Categories->newEntity();

    if ($this->request->is('post'))
    {
      $category = $this->Categories->patchEntity($category, $this->request->getData());

      if ($this->Categories->save($category))
        {
          $this->Flash->success(__('Your category has been saved.'));
          return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Unable to add new category.'));
    }
    $this->set(compact('category'));
    $this->set('_serialize', ['category']);
  }

  public function view($id)
  {
    $category = $this->Categories->get($id, ['contain' => ['Articles']]);
    $this->set(compact('category'));
  }

}

 ?>
