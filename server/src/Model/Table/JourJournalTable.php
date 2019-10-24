<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JourJournal Model
 *
 * @method \App\Model\Entity\JourJournal get($primaryKey, $options = [])
 * @method \App\Model\Entity\JourJournal newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\JourJournal[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JourJournal|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JourJournal saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JourJournal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\JourJournal[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\JourJournal findOrCreate($search, callable $callback = null, $options = [])
 */
class JourJournalTable extends Table
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

        $this->setTable('jour_journal');
        $this->setDisplayField('jour_codigo');
        $this->setPrimaryKey('jour_codigo');
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
            ->allowEmptyString('jour_codigo', 'create');

        $validator
            ->scalar('jour_model')
            ->maxLength('jour_model', 60)
            ->requirePresence('jour_model', 'create')
            ->allowEmptyString('jour_model', false);

        $validator
            ->requirePresence('jour_model_codigo', 'create')
            ->allowEmptyString('jour_model_codigo', false);

        $validator
            ->scalar('jour_json_data')
            ->allowEmptyString('jour_json_data');

        $validator
            ->dateTime('jour_created')
            ->requirePresence('jour_created', 'create')
            ->allowEmptyDateTime('jour_created', false);

        $validator
            ->allowEmptyString('jour_usua_codigo');

        return $validator;
    }
}
