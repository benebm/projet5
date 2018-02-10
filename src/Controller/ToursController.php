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
                $this->Flash->success(__('The review has been saved.'));

                return $this->redirect(['action' => 'view']);
            }
            $this->Flash->error(__('The review could not be saved. Please, try again.'));
        }

        $tour = $this->Tours->find()->where(['Tours.slug' => $slug])->contain(['Categories','Reviews'])->first();
        $this->set(compact('review', 'tour', 'view', 'errors'));
        $this->set('_serialize', ['tour']);        
	}


     public function beforeRender(\Cake\Event\Event $event)
    {
        $this->viewBuilder()->setTheme('City');
    } 


}