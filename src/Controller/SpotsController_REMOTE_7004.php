<?php

namespace App\Controller;

use App\Model\Entity\Spot;
use App\Model\Table\SpotsTable;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Event\Event;
use Cake\Http\Response;


class SpotsController extends AppController
{
    public function index()
    {
        /*$this->loadComponent('Paginator');
        $spots = $this->Paginator->paginate($this->spots->find());*/

        $spots = $this->Spots->find('all');
        $this->set(compact('spots'));
    }

    public function view($slug = null)
    {
        /*$this->viewBuilder()->setLayout('singletour');
        $spot = $this->Spots->findBySlug($slug)->firstOrFail();
        $this->set(compact('spot'));*/

        $this->viewBuilder()->setLayout('singletour');

        $review = $this->Spots->Reviews->newEntity();

        $spot = $this->Spots->find()->where(['Spots.slug' => $slug])->contain(['Categories', 'Reviews'])->first();
        $this->set(compact('review', 'spot', 'view'));
        $this->set('_serialize', ['spot']);

    }

    /**
     * @param null $slug
     * @return Response|null
     */
    public function addReview($slug = null)
    {
        $review = $this->Spots->Reviews->newEntity();

        if ($this->request->is(['post'])) {
            $review = $this->Spots->Reviews->patchEntity($review, $this->request->getData());
            if ($this->Spots->Reviews->save($review)) {
                return $this->redirect(['action' => 'view', $_POST['spot_slug']]);
                /*$this->Flash->success(__('The review has been saved.'));*/
            }
            /*$this->Flash->error(__('The review could not be saved. Please, try again.'));
                return $this->redirect(['action' => 'view']);*/
        }
        return $this->redirect(['action' => 'view', $_POST['spot_slug']]);
    }


    public function beforeRender(\Cake\Event\Event $event)
    {
        $this->viewBuilder()->setTheme('City');
    }


}