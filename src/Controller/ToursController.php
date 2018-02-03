<?php

namespace App\Controller;

class ToursController extends AppController
{
    public function index()
    {
        /*$this->loadComponent('Paginator');
        $tours = $this->Paginator->paginate($this->Tours->find());*/
        $tours = $this->Tours->find('all');
        $this->set(compact('tours'));
    }

    public function view($slug = null)
	{
    	$tour = $this->Tours->findBySlug($slug)->firstOrFail();
    	$this->set(compact('tour'));
	}

     public function beforeRender(\Cake\Event\Event $event)
    {
        $this->viewBuilder()->setTheme('City');
    } 

}