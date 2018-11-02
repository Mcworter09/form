<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Form Entity
 *
 * @property int $id
 * @property string $last_name
 * @property string $first_name
 * @property string $last_name_ruby
 * @property string $first_name_ruby
 * @property string $email
 * @property string $company
 * @property string $zip
 * @property string $main
 * @property \Cake\I18n\FrozenTime $created
 * @property string $prefecture
 * @property string $city
 * @property string $address
 * @property string $building
 * @property \Cake\I18n\FrozenTime $modified
 */
class Form extends Entity
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
        'last_name' => true,
        'first_name' => true,
        'last_name_ruby' => true,
        'first_name_ruby' => true,
        'email' => true,
        'company' => true,
        'zip' => true,
        'main' => true,
        'created' => true,
        'prefecture' => true,
        'city' => true,
        'address' => true,
        'building' => true,
        'modified' => true
    ];
}
