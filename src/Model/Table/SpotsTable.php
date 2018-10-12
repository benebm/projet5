<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use App\Model\Entity\Spot;
use ArrayObject;
use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\ORM\Association\BelongsTo;
use Cake\ORM\Association\HasMany;
use Cake\ORM\Behavior\CounterCacheBehavior;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\RulesChecker;
use Cake\Utility\Text;
use Cake\Validation\Validator;

/**
 * Spots Model
 *
 * @property BelongsTo $Categories
 * @property BelongsTo $Users
 * @property HasMany $Reviews
 *
 * @method Spot get($primaryKey, $options = [])
 * @method Spot newEntity($data = null, array $options = [])
 * @method Spot[] newEntities(array $data, array $options = [])
 * @method Spot|bool save(EntityInterface $entity, $options = [])
 * @method Spot patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method Spot[] patchEntities($entities, array $data, array $options = [])
 * @method Spot findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin TimestampBehavior
 * @mixin CounterCacheBehavior
 */


class SpotsTable extends Table
{
	public function initialize(array $config)
	{
		parent::initialize($config);

		$this->setTable('spots');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

    	/*$this->addBehavior('Timestamp'); */ //j'enlève timestamp qui ne servira pas pour l'objet spot
    	$this->addBehavior('CounterCache', ['Categories' => ['post_count']]);

    	 $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Reviews', [
            'foreignKey' => 'spot_id'
        ]);
	}

    // retourne tous les spots
    public function getAllSpots()
    {
        return $this->find('all')
        ->contain(['Categories', 'Reviews']);  
    }  

   // retourne tous les spots avec top = 1
    public function getTopSpots()
    {
        return $this->find()
        ->where(['spots.top' => 1])
        ->contain(['Categories', 'Reviews']);
    }
  
    // retourne le spot qui matche avec le slug envoyé
    public function getSingleSpot($slug)
    {
        return $this->find()
        ->where(['Spots.slug' => $slug])
        ->contain(['Categories', 'Reviews'])->first();
    }

    // retourne les reviews associées à ce spot_slug
    public function getSpotReviews($slug)
    {
        return $this->Reviews->find()
        ->where(['Reviews.spot_slug' => $slug]);
    }

    // retourne le spot envoyé dans le form de création de review
    public function getSpotForEmail($slug)
    {
        return $this->find()
        ->where(['Spots.slug' => $_POST['spot_slug']])->first();               
    }

    // retourne les arrondissements groupés
    public function getDistricts()
    {
        return $this->find('all')
        ->select(['district'])
        ->group('district');
    }

    // retourne les spots de la catégorie envoyée en id dans l'url
    public function sortbyCategory($id)
    {
        return $this->find()
        ->where(['Spots.category_id' => $id])
        ->contain(['Categories', 'Reviews']);
    }

    // retourne les spots par catégorie + arrondissement envoyés dans l'url
    public function filterbyDistrict($id, $district)
    {
        return $this->find()
        ->where(['Spots.category_id' => $id])
        ->where(['Spots.district' => $district])
        ->contain(['Categories', 'Reviews']);
    }

    // retourne le nom de la catégorie envoyée en id dans l'url (breadcrumb)
    public function getBreadcrumb($id)
    {
        return $this->Categories->find()
        ->select(['homename'])
        ->where(['id' => $id])->first();
    }

        



/*

    public function getAllArticles() {
        return $this->find('all', [
            'fields' => ['id', 'title'],
            'conditions' => [
                'OR' => ['title' => 'Cake', 'author_id' => 1],
                'published' => true
            ],
            'contain' => ['Authors'],
            'order' => ['title' => 'DESC'],
            'limit' => 10,
        ]);
    }
*/
    //$articles = $this->Articles->getAllArticles();


    
}