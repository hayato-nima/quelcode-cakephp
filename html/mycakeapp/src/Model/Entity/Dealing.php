<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dealing Entity
 *
 * @property int $bidinfo_id
 * @property string $address
 * @property string $delivery_name
 * @property string $phone_number
 * @property bool $is_sent
 * @property bool $is_received
 * @property \Cake\I18n\Time $created
 *
 * @property \App\Model\Entity\Bidinfo $bidinfo
 */
class Dealing extends Entity
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
        'bidinfo_id' => true,
        'address' => true,
        'delivery_name' => true,
        'phone_number' => true,
        'is_sent' => true,
        'is_received' => true,
        'created' => true,
        'bidinfo' => true,
    ];
}
