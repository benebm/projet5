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

        $username = $this->Auth->user("username");
        $this->set('username', $username); 

        $this->viewBuilder()->setLayout('home');

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

        $username = $this->Auth->user("username");
        $this->set('username', $username); 

        /*$this->viewBuilder()->setLayout('singletour');
        $spot = $this->Spots->findBySlug($slug)->firstOrFail();
        $this->set(compact('spot'));*/

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

            // ajout auth
            $review->user_id = $this->Auth->user('id');

            if ($this->Spots->Reviews->save($review)) {
                $this->Flash->success(__('Votre avis a bien été ajouté, merci !'));
                return $this->redirect(['action' => 'view', $_POST['spot_slug']]);
            }
            $this->Flash->error(__('Votre avis n\'a pas pu être ajouté. On réessaie ? :)'));
            return $this->redirect(['action' => 'view']);
        }
        return $this->redirect(['action' => 'view', $_POST['spot_slug']]);
    }

    public function all()
    {

        $username = $this->Auth->user("username");
        $this->set('username', $username); 

        // ce bloc affiche de façon compacte tous les spots
        $spots = $this->Spots->find('all')
        ->contain(['Categories', 'Reviews']);
        $this->set(compact('spots'));

        // ce bloc affiche la somme totale de tous les spots
        $totalspots = $this->Spots->find('all');
        $totalnumber = $totalspots->count();
        $this->set('totalnumber', $totalnumber);         
    }


    public function isAuthorized($user)
    {
        // Tous les utilisateurs enregistrés peuvent ajouter des articles
        // Avant 3.4.0 $this->request->param('action') etait utilisée.
        if ($this->request->getParam('action') === 'addReview') {
            return true;
        }


        // Le propriétaire d'un article peut l'éditer et le supprimer
        // Avant 3.4.0 $this->request->param('action') etait utilisée.
        if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
            // Avant 3.4.0 $this->request->params('pass.0')
            $reviewId = (int)$this->request->getParam('pass.0');
            if ($this->Spots->Reviews->isOwnedBy($reviewId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }




    public function beforeRender(\Cake\Event\Event $event)
    {
        $this->viewBuilder()->setTheme('City');
    }


}