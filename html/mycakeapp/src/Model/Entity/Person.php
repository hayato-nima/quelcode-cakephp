<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Person extends Entity{
  protected $_accessible = [
    'name' => true,
    'mail' => true,
    'age' => true
  ];
  //＄_accessible ‥‥フォームのデータをまとめてエンティティに設定する。一括代入
  //name,mail,ageに設定されている真偽値trueはその項目が一括代入に設定できるか個別に設定している
}