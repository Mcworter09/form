<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Forms Model
 *
 * @method \App\Model\Entity\Form get($primaryKey, $options = [])
 * @method \App\Model\Entity\Form newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Form[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Form|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Form|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Form patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Form[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Form findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FormsTable extends Table
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

        $this->setTable('forms');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->integer('id')
            ->notEmpty('id', 'create');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 30)
            ->notEmpty('last_name');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 30)
            ->notEmpty('first_name');

        $validator
            ->scalar('last_name_ruby')
            ->maxLength('last_name_ruby', 30)
            ->notEmpty('last_name_ruby');

        $validator
            ->scalar('first_name_ruby')
            ->maxLength('first_name_ruby', 30)
            ->notEmpty('first_name_ruby');

        $validator
            ->email('email')
            ->notEmpty('email');

        $validator
            ->scalar('company')
            ->maxLength('company', 50)
            ->allowEmpty('company');

        $validator
            ->scalar('zip')
            ->maxLength('zip', 8)
            ->allowEmpty('zip');

        $validator
            ->scalar('main')
            ->notEmpty('main');

        $validator
            ->scalar('prefecture')
            ->maxLength('prefecture', 10)
            ->allowEmpty('prefecture');

        $validator
            ->scalar('city')
            ->maxLength('city', 10)
            ->allowEmpty('city');

        $validator
            ->scalar('address')
            ->maxLength('address', 50)
            ->allowEmpty('address');

        $validator
            ->scalar('building')
            ->maxLength('building', 50)
            ->allowEmpty('building');

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
        $rules->add($rules->isUnique(['id']));

        return $rules;
    }
}
