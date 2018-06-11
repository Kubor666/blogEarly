<?php
namespace App\Controller;

class ArticlesController extends AppController
{

  public function initialize()
  {
    parent::initialize();

    $this->loadComponent('Paginator');
    $this->loadComponent('Flash');
    $this->loadComponent('RequestHandler');
  }

  public function index()
  {
      $this->loadComponent('Paginator');
      $articles = $this->Paginator->paginate($this->Articles->find());
      $this->set(compact('articles'));
      $this->set(compact('categories'));

      if($this->request->is('json')) {
        $this->set('_serialize',['articles']);
      }
  }

  public function view($id)
  {
    $article = $this->Articles->get($id);
    $this->set(compact('article'));
  }

  public function add()
  {
    $article = $this->Articles->newEntity();
    $this->set(compact('article'));
    $this->set('categories', $this->Articles->Categories->find('list'));

    if ($this->request->is('post'))
    {
      $article = $this->Articles->patchEntity($article, $this->request->getData());
      $article->user_id = 1;

        if ($this->Articles->save($article))
        {
          $this->Flash->success(__('Your article has been saved.'));
          return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Unable to add your article.'));
    }
  }

  public function edit($id)
  {
    $article = $this->Articles->findById($id)->firstOrFail();
    $this->set('categories', $this->Articles->Categories->find('list'));

        if ($this->request->is(['post', 'put']))
        {
          $this->Articles->patchEntity($article, $this->request->getData());

          if ($this->Articles->save($article))
          {
            $this->Flash->success(__('Your article has been updated.'));
            return $this->redirect(['action' => 'index']);
          }
          $this->Flash->error(__('Unable to update your article.'));
      }
      $this->set('article', $article);
  }

  public function delete($id)
  {
    $this->request->allowMethod(['post', 'delete']);
    $article = $this->Articles->findById($id)->firstOrFail();

    if ($this->Articles->delete($article))
    {
      $this->Flash->success(__('The {0} article has been deleted.', $article->title));
      return $this->redirect(['action' => 'articles']);
    }
  }
}
?>
