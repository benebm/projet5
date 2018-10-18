<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        //couche d'authentification
        $this->loadComponent('Auth', [
            'authorize' => ['Controller'], 
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'dashboard',
            ],
            'logoutRedirect' => [
                'controller' => 'Spots',
                'action' => 'index'
            ],
        ]);
        //fin auth

        // affichage du nom dans le header quand user connecté
        $username = $this->Auth->user("username");
        $this->set('username', $username); 

        // affiche de façon compacte les catégories pour le menu
        $this->loadModel('Categories');
        $categories = $this->Categories->find()
        ->order(['id' => 'ASC']);
        $this->set(compact('categories'));

         // affiche de façon compacte les arrondissements pour le menu
        $this->loadModel('Spots');
        $districts = $this->Spots->getDistricts();
        $this->set(compact('districts'));

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        /*$this->loadComponent('Security');
        $this->loadComponent('Csrf');*/
    }

        public function isAuthorized($user) 
    {
        // Admin peuvent accéder à chaque action
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }
        // Par défaut refuser
        return false;
    }

        // autoriser consultation sans connexion
        public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['index', 'view', 'all', 'display', 'sortCat', 'sortDis', 'filter', 'mapall', 'contact']);
    }

}
