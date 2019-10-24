<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JdetJournalDetail Model
 *
 * @method \App\Model\Entity\JdetJournalDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\JdetJournalDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\JdetJournalDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JdetJournalDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JdetJournalDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JdetJournalDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\JdetJournalDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\JdetJournalDetail findOrCreate($search, callable $callback = null, $options = [])
 */
class JdetJournalDetailTable extends Table
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

        $this->setTable('jdet_journal_detail');
        $this->setDisplayField('jdet_codigo');
        $this->setPrimaryKey('jdet_codigo');
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
            ->allowEmptyString('jdet_codigo', 'create');

        $validator
            ->requirePresence('jdet_jour_codigo', 'create')
            ->allowEmptyString('jdet_jour_codigo', false);

        $validator
            ->scalar('jdet_property')
            ->maxLength('jdet_property', 60)
            ->requirePresence('jdet_property', 'create')
            ->allowEmptyString('jdet_property', false);

        $validator
            ->scalar('jdet_prop_key')
            ->maxLength('jdet_prop_key', 45)
            ->allowEmptyString('jdet_prop_key');

        $validator
            ->scalar('jdet_old_value')
            ->requirePresence('jdet_old_value', 'create')
            ->allowEmptyString('jdet_old_value', false);

        $validator
            ->scalar('jdet_value')
            ->requirePresence('jdet_value', 'create')
            ->allowEmptyString('jdet_value', false);

        return $validator;
    }
}
