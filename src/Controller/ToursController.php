<?php

namespace App\Controller;

use App\Model\Entity\Tour;
use App\Model\Table\ToursTable;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Event\Event;
use Cake\Http\Response;



class ToursController extends AppController
{
    public function index()
    {
        /*$this->loadComponent('Paginator');
        $tours = $this->Paginator->paginate($this->Tours->find());*/
        
        $tours = $this->Tours->find('all');
        $this->set(compact('tours'));
    }

    public function view($slug = null)
	{
		/*$this->viewBuilder()->setLayout('singletour');
    	$tour = $this->Tours->findBySlug($slug)->firstOrFail();
    	$this->set(compact('tour'));*/

        $this->viewBuilder()->setLayout('singletour');
        
        $errors = [];
        $review = $this->Tours->Reviews->newEntity();
        if ($this->request->is(['tour'])) {
            $review = $this->Tours->Reviews->patchEntity($review, $this->request->getData());
            if ($this->Tours->Reviews->save($review)) {
            }
        }

        $tour = $this->Tours->find()->where(['Tours.slug' => $slug])->contain(['Reviews'])->first();
        $this->set(compact('tour', 'view', 'errors'));
        $this->set('_serialize', ['tour']);

        
	}


    public function add()
    {
        $tour = $this->Tours->newEntity();
        if ($this->request->is('tour')) {
            $tour = $this->Tours->patchEntity($tour, $this->request->getData());

            // Hardcoding the user_id is temporary, and will be removed later
            // when we build authentication out.
            $article->user_id = 1;

            if ($this->Tours->save($tour)) {
                $this->Flash->success(__('Votre article a été sauvegardé.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Impossible de sauvegarder l\'article.'));
        }
        // Récupère une liste des tags.
        $reviews = $this->Tours->Reviews->find('list');

        // Passe les tags au context de la view
        $this->set('reviews', $reviews);

        $this->set('tour', $tour);
    }



     public function beforeRender(\Cake\Event\Event $event)
    {
        $this->viewBuilder()->setTheme('City');
    } 


}