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

        // affiche le nom dans le header quand user connecté
        $username = $this->Auth->user("username");
        $this->set('username', $username); 

        // affiche le layout
        $this->viewBuilder()->setLayout('home');

        // affiche de façon compacte tous les spots classés en top (top=1)
        $spots = $this->Spots->find('all')
        ->where(['spots.top' => 1])
        ->contain(['Categories', 'Reviews']);
        $this->set(compact('spots'));

        // affiche la somme totale de tous les spots (top et non top)
        $totalspots = $this->Spots->find('all');
        $totalnumber = $totalspots->count();
        $this->set('totalnumber', $totalnumber); 

        // affiche la moyenne de rating par spot
        $reviews = $this->Spots->Reviews->find();
        $avgratings = $reviews->select(['moyenne' => $reviews->func()->avg('rating'), 'spot_slug'])
        ->group('spot_slug');
        $this->set(compact('avgratings'));
      }


    public function view($slug = null)
    {

        // affichage du nom dans le header quand user connecté
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

        // affiche le nom dans le header quand user connecté
        $username = $this->Auth->user("username");
        $this->set('username', $username); 

        // affiche de façon compacte tous les spots et pagine
        $spots = $this->Spots->find('all')
        ->contain(['Categories', 'Reviews']);
        //$spots = $this->paginate($this->Spots)
        $this->set(compact('spots', $this->paginate($spots)));

        // affiche de façon compacte les catégories 
        $categories = $this->Spots->Categories->find('all');
        $this->set(compact('categories'));

        // affiche la somme totale de tous les spots
        $totalspots = $this->Spots->find('all');
        $totalnumber = $totalspots->count();
        $this->set('totalnumber', $totalnumber);   

        // affiche la moyenne de rating par spot
        $reviews = $this->Spots->Reviews->find();
        $avgratings = $reviews->select(['moyenne' => $reviews->func()->avg('rating'), 'spot_slug'])
        ->group('spot_slug');
        $this->set(compact('avgratings'));

    }

    public function sort($id = null, $rating = null)
    {
        // affiche le nom dans le header quand user connecté
        $username = $this->Auth->user("username");
        $this->set('username', $username); 

        $spots = $this->Spots->find()
        ->where(['Spots.category_id' => $id])
        ->contain(['Categories', 'Reviews']);
        $this->set(compact('spots'));

        // affiche de façon compacte les catégories
        $categories = $this->Spots->Categories->find('all');
        $this->set(compact('categories'));

         // affiche la somme totale de tous les spots
        $totalspots = $this->Spots->find('all');
        $totalnumber = $totalspots->count();
        $this->set('totalnumber', $totalnumber);

        // affiche la moyenne de rating par spot
        $reviews = $this->Spots->Reviews->find();
        $avgratings = $reviews->select(['moyenne' => $reviews->func()->avg('rating'), 'spot_slug'])
        ->group('spot_slug');
        $this->set(compact('avgratings')); 

        // on utilise la view all
        $this->render('all');
    }


        public function mapall($id = null)
    {
        // affiche le layout
        $this->viewBuilder()->setLayout('fullmap');

        // affiche le nom dans le header quand user connecté
        $username = $this->Auth->user("username");
        $this->set('username', $username);

        $spots = $this->Spots->find('all')
        ->contain(['Categories', 'Reviews']);
        $this->set(compact('spots'));

        // affiche de façon compacte les catégories 
        $categories = $this->Spots->Categories->find('all');
        $this->set(compact('categories'));
    }


    public function isAuthorized($user)
    {
        // Tous les utilisateurs enregistrés peuvent ajouter des articles
        // Avant 3.4.0 $this->request->param('action') etait utilisée.
        if ($this->request->getParam('action') === 'addReview') {
            return true;
        }

        // Le propriétaire d'un article peut l'éditer et le supprimer
        if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
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