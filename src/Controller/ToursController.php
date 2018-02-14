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
        
        $review = $this->Tours->Reviews->newEntity();

        $tour = $this->Tours->find()->where(['Tours.slug' => $slug])->contain(['Categories','Reviews'])->first();
        $this->set(compact('review', 'tour', 'view'));
        $this->set('_serialize', ['tour']);

	}

    public function addReview($slug = null)
    {
        $review = $this->Tours->Reviews->newEntity();
        if ($this->request->is(['post'])) {
            $review = $this->Tours->Reviews->patchEntity($review, $this->request->getData());
            if ($this->Tours->Reviews->save($review)) {
                return $this->redirect(['action' => 'view', $_POST['tour_slug']]);
                /*$this->Flash->success(__('The review has been saved.'));*/
            }
            /*$this->Flash->error(__('The review could not be saved. Please, try again.'));
                return $this->redirect(['action' => 'view']);*/
        }
    }


     public function beforeRender(\Cake\Event\Event $event)
    {
        $this->viewBuilder()->setTheme('City');
    } 


}