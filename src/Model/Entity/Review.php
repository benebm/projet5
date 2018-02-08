<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\I18n\FrozenTime;

/**
 * Review Entity
 *
 * @property int $id
 * @property int $tour_id
 * @property int $user_id
 * @property string $content
 * @property \Cake\I18n\FrozenTime $created
 * @property bool $rating
 *
 * @property \App\Model\Entity\Tour $tour
 * @property \App\Model\Entity\User $user
 */
class Review extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'tour_id' => true,
        'user_id' => true,
        'content' => true,
        'created' => true,
        'rating' => true,
        'tour' => true,
        'user' => true
    ];
}
