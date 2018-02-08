<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class ToursTable extends Table
{
	public function initialize(array $config)
	{
    	/*$this->addBehavior('Timestamp'); */ //j'enlève timestamp qui ne servira pas pour l'objet tour
    	$this->hasMany('Reviews');
	}
    
}