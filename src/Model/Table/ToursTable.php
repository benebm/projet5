<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use App\Model\Entity\Tour;
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
 * Tours Model
 *
 * @property BelongsTo $Categories
 * @property BelongsTo $Users
 * @property HasMany $Reviews
 *
 * @method Tour get($primaryKey, $options = [])
 * @method Tour newEntity($data = null, array $options = [])
 * @method Tour[] newEntities(array $data, array $options = [])
 * @method Tour|bool save(EntityInterface $entity, $options = [])
 * @method Tour patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method Tour[] patchEntities($entities, array $data, array $options = [])
 * @method Tour findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin TimestampBehavior
 * @mixin CounterCacheBehavior
 */


class ToursTable extends Table
{
	public function initialize(array $config)
	{
		parent::initialize($config);

		$this->setTable('tours');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

    	/*$this->addBehavior('Timestamp'); */ //j'enlève timestamp qui ne servira pas pour l'objet tour
    	$this->addBehavior('CounterCache', ['Categories' => ['post_count']]);

    	 $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Reviews', [
            'foreignKey' => 'tour_id'
        ]);

        $this->hasMany('Orders', [
            'foreignKey' => 'tour_id'
        ]);

	}
    
}