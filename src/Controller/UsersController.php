<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use App\Form\ContactForm;
use Cake\Mailer\MailerAwareTrait;
use Cake\Filesystem\Folder;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    //authentification
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
    //fin authentification

    /**
     * Add method (register)
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    use MailerAwareTrait;

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Félicitations, votre compte utilisateur a bien été créé. Connectez-vous pour accéder à votre compte :'));
                $this->getMailer('User')->send('welcome', [$user]);
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
            $this->Flash->error(__('Impossible d\'ajouter l\'utilisateur. Réessayez :)'));
        }
        $this->set(compact('user'));
    }

     /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function editUser($id = null)
    {
        $userId = $this->Auth->user("id");
        $user = $this->Users->get($userId);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->getMailer('User')->send('afterupdate', [$user]);
                $this->Flash->success(__('Votre mise à jour a bien été prise en compte.'));
                return $this->redirect(['action' => 'dashboard']);
            }
            $this->Flash->error(__('Votre mise à jour n\'a pas pu être prise en compte. Réessayez :)'));
            return $this->redirect(['action' => 'dashboard']);
        }
        $this->set(compact('user'));
    }

    public function addPhoto()
    {
        if (!empty($this->request->data)) {
            if (!empty($this->request->data['upload']['name'])) {

            $file = $this->request->data['upload']; // place la data dans une variable
            $userId = $this->Auth->user("id"); // récupère id pour nommage
            $setNewFileName = 'avatar_' . $userId; // définit le futur nom
            $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //récupère l'extension
            $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); // définit les extensions autorisées
            $size = getimagesize($file['tmp_name']); // récupère hauteur et largeur

                if ($file['size'] < 10000) {  // test poids              
                    if (($size[0] == 68) && ($size[1] == 68)) { // test hauteur/largeur          
                        if (in_array($ext, $arr_ext)) { // si l'extension récupérée est dans le tableau
                
                            move_uploaded_file($file['tmp_name'], WWW_ROOT . '/img/avatars/' . $setNewFileName . '.' . $ext); // téléverse le fichier sur le serveur
                            $this->Flash->success(__('Votre mise à jour a bien été prise en compte.'));
                            return $this->redirect(['action' => 'dashboard']);
                        }
                        $this->Flash->error(__('Votre mise à jour n\'a pas pu être prise en compte car l\'extension ne semble pas valide.'));
                        return $this->redirect(['action' => 'dashboard']);
                    }
                    $this->Flash->error(__('Votre mise à jour n\'a pas pu être prise en compte car les dimensions ne conviennent pas : l\'image doit faire 68 pixels de haut par 68 pixels de large.'));
                    return $this->redirect(['action' => 'dashboard']);
                } 
                $this->Flash->error(__('Votre mise à jour n\'a pas pu être prise en compte car le fichier est trop lourd : poids maximum accepté 10 Ko.'));
                return $this->redirect(['action' => 'dashboard']);
            }
            $this->Flash->error(__('Votre mise à jour n\'a pas pu être prise en compte car vous n\'avez pas sélectionné de fichier.'));
            return $this->redirect(['action' => 'dashboard']);
        }
    }

public function dashboard()
    {
        $userId = $this->Auth->user("id");
        $this->set('userId', $userId); 
        $useremail = $this->Auth->user("email");
        $this->set('useremail', $useremail);          

        $dir = new Folder(WWW_ROOT . 'img\avatars\\');
        $files = $dir->findRecursive('avatar_' . $userId. '.*');
        if (isset($files[0])) // s'il y a déjà un fichier avatar avec l'id du user
        {
        $path_parts = pathinfo($files[0]);
        $ext = $path_parts['extension'];
        $this->set('ext', $ext); // récupère l'extension de ce fichier pour l'afficher
        }

        $review = $this->Users->getUserReviews($userId);
        $this->set(compact('review'));
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

    public function contact()
    {
        $contact = new ContactForm();
        if ($this->request->is('post')) {
            if ($contact->execute($this->request->getData())) {
                $this->Flash->success('Nous avons bien reçu votre message et reviendrons vers vous rapidement.');
            } else {
                $this->Flash->error('Il y a eu un problème lors de l\'envoi de votre message. Réessayez :)');
            }
        }
        $this->set('contact', $contact);
    }

    public function isAuthorized($user)
    {
        // Tous les utilisateurs enregistrés peuvent accéder au dashboard ou éditer leurs paramètres
         if (in_array($this->request->getParam('action'), ['dashboard', 'editUser', 'addPhoto'])) {
            return true;
        }
        // Le propriétaire d'un avis peut le supprimer
        if (in_array($this->request->getParam('action'), ['deleteReview'])) {
            $reviewId = (int)$this->request->getParam('pass.0');
            if ($this->Users->Reviews->isOwnedBy($reviewId, $user['id'])) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }        

}