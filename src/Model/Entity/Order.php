<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property int $tour_id
 * @property string $tour_slug
 * @property \Cake\I18n\FrozenDate $day
 * @property \Cake\I18n\FrozenTime $time
 * @property int $guests
 * @property string $duration
 * @property int $price
 * @property bool $option_pickup
 * @property bool $option_welcome
 * @property bool $option_vip
 *
 * @property \App\Model\Entity\Tour $tour
 */
class Order extends Entity
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
        '*' => true,
        'id' => false
    ];
}
