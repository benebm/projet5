<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //ajout couche auth
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['add', 'logout']);
    }

    public function login()
    {

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Nom d\'utilisateur ou mot de passe invalide, veuillez réessayer'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    //fin couche auth

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Félicitations, l\'utilisateur a bien été créé. Connectez-vous pour accéder à votre compte'));

                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
            $this->Flash->error(__('Impossible d\'ajouter l\'utilisateur.'));
        }
        $this->set(compact('user'));
    }


    public function dashboard()
    {
    	$this->viewBuilder()->setLayout('dashboard');

    	$userId = $this->Auth->user("id");
    	$userlogin = $this->Auth->user("username");
    	$this->set('userlogin', $userlogin); 

    	$review = $this->Users->Reviews->find()
    	->where(['Reviews.user_id' => $userId])
        ->contain(['Spots']);
        $this->set(compact('review'));

        $user = $this->Users->find()
        ->where(['Users.id' => $userId]);
        $this->set(compact('user'));

	}

    public function deleteReview($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);

        $review = $this->Users->Reviews->get($id);

        if ($this->Users->Reviews->delete($review)) {
            $this->Flash->success(__('L\'avis a bien été supprimé!'));
        } else {
            $this->Flash->error(__('L\'avis n\'a pas pu être supprimé. Veuillez réessayer :)'));
        }
        return $this->redirect(['action' => 'dashboard']);
    }


	public function isAuthorized($user)
    {
        // Tous les utilisateurs enregistrés peuvent ajouter des articles
        // Avant 3.4.0 $this->request->param('action') etait utilisée.
        if ($this->request->getParam('action') === 'dashboard') {
            return true;
        }


        // Le propriétaire d'un article peut l'éditer et le supprimer
        // Avant 3.4.0 $this->request->param('action') etait utilisée.
        if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
            // Avant 3.4.0 $this->request->params('pass.0')
            $reviewId = (int)$this->request->getParam('pass.0');
            if ($this->Users->Reviews->isOwnedBy($reviewId, $user['id'])) {
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
