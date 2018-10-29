<?php

namespace App\Controller;

use App\Model\Entity\Spot;
use App\Model\Table\SpotsTable;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Event\Event;
use Cake\Http\Response;
use Cake\Mailer\MailerAwareTrait;

use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

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
    }
    
    public function index()
    {
        $this->viewBuilder()->setLayout('home');

        $spots = $this->Spots->getTopSpots();
        $this->set(compact('spots'));
    }

    public function view($slug = null)
    {
        $spot = $this->Spots->getSingleSpot($slug);
        $this->set(compact('review', 'spot'));       
        
        $dir = new Folder(WWW_ROOT . 'img\avatars\\');
        $files = $dir->findRecursive('avatar_' . '.*');
        $this->set('files', $files);

        

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
        $spots = $this->Spots->getAllSpots();
        $this->set(compact('spots', $this->paginate($spots)));     

        //query spéciale pour la map (sans pagination)
        $mapspots = $this->Spots->getAllSpots();
        $this->set(compact('mapspots'));  
    }

    public function sortCat($id = null)
    {
        $spots = $this->Spots->sortbyCategory($id);
        $this->set(compact('spots', $this->paginate($spots))); 

        //query spéciale pour la map (sans pagination)
        $mapspots = $this->Spots->sortbyCategory($id);
        $this->set(compact('mapspots'));     

        $breadcrumb = $this->Spots->getBreadcrumb($id);
        $this->set('id', $id);
        $this->set('breadcrumb', $breadcrumb);
 
        // on utilise la view all
        $this->render('all');
    }

    public function sortDis($district = null)
    {
        $spots = $this->Spots->sortbyDistrict($district);
        $this->set(compact('spots', $this->paginate($spots)));
        $this->set('district', $district);

        //query spéciale pour la map (sans pagination)
        $mapspots = $this->Spots->sortbyDistrict($district);
        $this->set(compact('mapspots')); 

        // on utilise la view all
        $this->render('all');
    }

    public function filter($id = null, $district = null)
    {
        $spots = $this->Spots->filterbyDistrict($id, $district);
        $this->set(compact('spots', $this->paginate($spots)));

        //query spéciale pour la map (sans pagination)
        $mapspots = $this->Spots->filterbyDistrict($id, $district);
        $this->set(compact('mapspots')); 

        $breadcrumb = $this->Spots->getBreadcrumb($id);
        $this->set('id', $id);
        $this->set('breadcrumb', $breadcrumb);
        $this->set('district', $district);

        // on utilise la view all
        $this->render('all');
    }

        public function mapall($id)
    {
        $this->viewBuilder()->setLayout('fullmap');

        if (isset($id))
        {
            $spots = $this->Spots->sortbyCategory($id);
            $this->set(compact('spots'));  
        }
        else 
        {
            $spots = $this->Spots->getAllSpots();
            $this->set(compact('spots'));
        }

    }

    public function isAuthorized($user)
    {
        // Tous les utilisateurs enregistrés peuvent ajouter des reviews
        if ($this->request->getParam('action') === 'addReview') {
            return true;
        }
    
        return parent::isAuthorized($user);
    }

}