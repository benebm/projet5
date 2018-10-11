<?php

namespace App\Controller;

use App\Model\Entity\Spot;
use App\Model\Table\SpotsTable;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Event\Event;
use Cake\Http\Response;
use Cake\Mailer\MailerAwareTrait;


class SpotsController extends AppController
{

    public function initialize() // actions communes à toutes les méthodes de ce controller
    {
        parent::initialize();

        //affiche la somme totale de tous les spots
        $totalspots = $this->Spots->getAllSpots();
        $totalnumber = $totalspots->count();
        $this->set('totalnumber', $totalnumber);

        //affiche la somme de spots par catégorie
        $allspots = $this->Spots->getAllSpots();
        $spotscounts = $allspots->select(['count' => $allspots->func()->count('name'), 'category_id'])
        ->group('category_id');
        $this->set(compact('spotscounts'));       

        // affiche la moyenne de rating par spot
        $reviews = $this->Spots->Reviews->find();
        $avgratings = $reviews->select(['moyenne' => $reviews->func()->avg('rating'), 'spot_slug'])
        ->group('spot_slug');
        $this->set(compact('avgratings'));

        // affiche de façon compacte les arrondissements
        $districts = $this->Spots->getDistricts();
        $this->set(compact('districts'));
    }

    public function beforeRender(\Cake\Event\Event $event)
    {
        $this->viewBuilder()->setTheme('City');
    }
    
        
    public function index()
    {
        $this->viewBuilder()->setLayout('home');

        $spots = $this->Spots->getTopSpots();
        $this->set(compact('spots'));
    }


    public function view($slug = null)
    {

        //$review = $this->Spots->Reviews->newEntity();

        $spot = $this->Spots->getSingleSpot($slug);
        $this->set(compact('review', 'spot'));      

        //affiche la moyenne des reviews pour ce spot_slug
        $query = $this->Spots->getSpotReviews($slug);
        $rating = $query->select(['moyenne' => $query->func()->avg('rating')])->first();
        $this->set('rating', $rating); 
    }

    use MailerAwareTrait;

    public function addReview($slug = null)
    {       
        $review = $this->Spots->Reviews->newEntity();

        if ($this->request->is(['post'])) 
        {
            // ajout auth nécessaire pour poster review
            $review->user_id = $this->Auth->user('id');
            $review = $this->Spots->Reviews->patchEntity($review, $this->request->getData());

            if ($this->Spots->Reviews->save($review)) 
            {
                $this->Flash->success(__('Votre avis a bien été ajouté, merci !'));

                // envoi email de confirmation
                $spot = $this->Spots->getSpotForEmail($slug);
                $this->set('spot', $spot);
                //variable utilisé dans email de confirmation
                $user = $this->Auth->user();
                $this->set('user', $user);
                $this->getMailer('User')->send('afterreview', [$user, $spot]);
                // notification admin pour modo
                $contentreview = 'titre : ' . $_POST['title'] . ' contenu : ' . $_POST['content'];
                $this->getMailer('User')->send('moderation', [$spot, $contentreview]);
 
                return $this->redirect(['action' => 'view', $_POST['spot_slug']]);
            }

            $this->Flash->error(__('Votre avis n\'a pas pu être ajouté. On réessaie ? :)'));
            return $this->redirect(['action' => 'view', $_POST['spot_slug']]);
        }
        return $this->redirect(['action' => 'view', $_POST['spot_slug']]);
    }


public $paginate = 
    [
        'limit' => 5,
        'order' => [
            'Spots.id' => 'asc'
        ]
    ];


    public function all()
    {

     

        // affiche de façon compacte tous les spots et pagine
        $spots = $this->Spots->find('all')
        ->contain(['Categories', 'Reviews']);
        $this->set(compact('spots', $this->paginate($spots)));

        //query spéciale pour la map
        $mapspots = $this->Spots->find('all');
        $this->set(compact('mapspots'));  

    

    }

    public function sort($id = null)
    {
     

        $spots = $this->Spots->find()
        ->where(['Spots.category_id' => $id])
        ->contain(['Categories', 'Reviews']);
        $this->set(compact('spots', $this->paginate($spots)));
        
        // affiche les variables nécessaires au breadcrumb
        $breadcrumb = $this->Spots->Categories->find()
        ->select(['homename'])
        ->where(['id' => $id])->first();
        $this->set('id', $id);
        $this->set('breadcrumb', $breadcrumb);

        //query spéciale pour la map
        $mapspots = $this->Spots->find()
        ->where(['Spots.category_id' => $id]);
        $this->set(compact('mapspots')); 
 
        // on utilise la view all
        $this->render('all');
    }

    public function filter($id = null, $district = null)
    {
    
        $spots = $this->Spots->find()
        ->where(['Spots.category_id' => $id])
        ->where(['Spots.district' => $district])
        ->contain(['Categories', 'Reviews']);
        $this->set(compact('spots', $this->paginate($spots)));

        // affiche les variables nécessaires au breadcrumb
        $breadcrumb = $this->Spots->Categories->find()
        ->select(['homename'])
        ->where(['id' => $id])->first();
        $this->set('id', $id);
        $this->set('breadcrumb', $breadcrumb);

        //query spéciale pour la map
        $mapspots = $this->Spots->find()
        ->where(['Spots.category_id' => $id])
        ->where(['Spots.district' => $district]);
        $this->set(compact('mapspots')); 

        // on utilise la view all
        $this->render('all');

    }


        public function mapall()
    {
        $this->viewBuilder()->setLayout('fullmap');

        $spots = $this->Spots->getAllSpots();
        $this->set(compact('spots'));
    }


    public function isAuthorized($user)
    {
        // Tous les utilisateurs enregistrés peuvent ajouter des reviews
        if ($this->request->getParam('action') === 'addReview') {
            return true;
        }
        // Le propriétaire d'une review peut l'éditer et la supprimer
        /*if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
            $reviewId = (int)$this->request->getParam('pass.0');
            if ($this->Spots->Reviews->isOwnedBy($reviewId, $user['id'])) {
                return true;
            }
        }*/
        return parent::isAuthorized($user);
    }

}