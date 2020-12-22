<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dealings Model
 *
 * @property \App\Model\Table\BidinfoTable&\Cake\ORM\Association\BelongsTo $Bidinfo
 *
 * @method \App\Model\Entity\Dealing get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dealing newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dealing[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dealing|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dealing saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dealing patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dealing[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dealing findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DealingsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('dealings');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Bidinfo', [
            'foreignKey' => 'bidinfo_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->scalar('address')
            ->maxLength('address', 200)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->scalar('delivery_name')
            ->maxLength('delivery_name', 100)
            ->requirePresence('delivery_name', 'create')
            ->notEmptyString('delivery_name');

        $validator
            ->scalar('phone_number')
            ->integer('phone_number', '数字で入力してください')
            ->maxLength('phone_number', 11)
            ->requirePresence('phone_number', 'create')
            ->notEmptyString('phone_number');

        $validator
            ->boolean('is_sent')
            ->requirePresence('is_sent', 'create')
            ->notEmptyString('is_sent');

        $validator
            ->boolean('is_received')
            ->requirePresence('is_received', 'create')
            ->notEmptyString('is_received');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['bidinfo_id'], 'Bidinfo'));

        return $rules;
    }
}
