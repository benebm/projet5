<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use App\Form\ContactForm;
use Cake\Mailer\MailerAwareTrait;

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

            $file = $this->request->data['upload']; //put the data into a var for easy use
            $userId = $this->Auth->user("id");
            // $this->set('userId', $userId);
            
            $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
            $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions
            //$setNewFileName = time() . "_" . rand(000000, 999999);
            $setNewFileName = 'avatar_' . $userId;

                //only process if the extension is valid
                if (in_array($ext, $arr_ext)) {
                //do the actual uploading of the file. First arg is the tmp name, second arg is 
                //where we are putting it
                move_uploaded_file($file['tmp_name'], WWW_ROOT . '/img/avatars/' . $setNewFileName . '.' . $ext);

                $this->Flash->success(__('Votre mise à jour a bien été prise en compte.'));
                return $this->redirect(['action' => 'dashboard']);

    //prepare the filename for database entry 
 //   $imageFileName = $setNewFileName . '.' . $ext;
    }
}

/*
$getFormvalue = $this->Users->patchEntity($particularRecord, $this->request->data);

if (!empty($this->request->data['upload']['name'])) {
            $getFormvalue->avatar = $imageFileName;
}


if ($this->Users->save($getFormvalue)) {
   $this->Flash->success('Your profile has been sucessfully updated.');
   return $this->redirect(['controller' => 'Users', 'action' => 'dashboard']);
   } else {
   $this->Flash->error('Records not be saved. Please, try again.');
   }
*/

}
    }





public function dashboard()
    {
        $userId = $this->Auth->user("id");
        $useremail = $this->Auth->user("email");
        $this->set('useremail', $useremail); 

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