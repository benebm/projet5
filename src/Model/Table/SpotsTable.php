<?php
// src/Model/Table/ArticlesTable.php
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

    
}