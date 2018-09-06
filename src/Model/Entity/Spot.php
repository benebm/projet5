<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Spot Entity
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property int $category_id
 *
 * @property Category $category
 * @property User $user
 * @property Review[] $reviews
 */

class Spot extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}