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

        // ce bloc affiche de façon compacte tous les spots classés en top (top=1)
        $spots = $this->Spots->find('all')
        ->where(['spots.top' => 1])
        ->contain(['Categories', 'Reviews']);
        $this->set(compact('spots'));
        foreach ($spots as $spot)
        {
            $spotslug = $spot->slug;
        }

        // ce bloc affiche la somme totale de tous les spots (top et non top)
        $totalspots = $this->Spots->find('all');
        $totalnumber = $totalspots->count();
        $this->set('totalnumber', $totalnumber); 

        // ce bloc affiche le nombre de toutes les reviews
        $reviews = $this->Spots->Reviews->find('all');
        $reviewnumber = $reviews->count();
        $this->set('reviewnumber', $reviewnumber); 

        // ce bloc affiche la moyenne de toutes les reviews
        $query = $this->Spots->Reviews->find()
        ->where(['Reviews.spot_slug' => $spotslug]);
        $rating = $query->select(['moyenne' => $query->func()->avg('rating')])->first();
        $this->set('rating', $rating);     
    }


    public function view($slug = null)
    {
        /*$this->viewBuilder()->setLayout('singletour');
        $spot = $this->Spots->findBySlug($slug)->firstOrFail();
        $this->set(compact('spot'));*/

        $this->viewBuilder()->setLayout('singlespot');

        $review = $this->Spots->Reviews->newEntity();

        $spot = $this->Spots->find()
        ->where(['Spots.slug' => $slug])
        ->contain(['Categories', 'Reviews'])->first();
        $this->set(compact('review', 'spot', 'view'));
        $this->set('_serialize', ['spot']);

        // ce bloc affiche la moyenne des reviews pour ce spot_slug
        $query = $this->Spots->Reviews->find()
        ->where(['Reviews.spot_slug' => $slug]);
        $rating = $query->select(['moyenne' => $query->func()->avg('rating')])->first();
        $this->set('rating', $rating); 
    
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