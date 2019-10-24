<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsuaUsuario Model
 *
 * @method \App\Model\Entity\UsuaUsuario get($primaryKey, $options = [])
 * @method \App\Model\Entity\UsuaUsuario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UsuaUsuario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsuaUsuario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsuaUsuario saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsuaUsuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UsuaUsuario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsuaUsuario findOrCreate($search, callable $callback = null, $options = [])
 */
class UsuaUsuarioTable extends AppTable
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

        $this->setTable('usua_usuario');
        $this->setDisplayField('usua_codigo');
        $this->setPrimaryKey('usua_codigo');
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
            ->integer('usua_codigo')
            ->allowEmptyString('usua_codigo', 'create');

        $validator
            ->scalar('usua_nome')
            ->maxLength('usua_nome', 60)
            ->requirePresence('usua_nome', 'create')
            ->allowEmptyString('usua_nome', false);

        $validator
            ->scalar('usua_senha')
            ->maxLength('usua_senha', 100)
            ->requirePresence('usua_senha', 'create')
            ->allowEmptyString('usua_senha', false);

        $validator
            ->scalar('usua_email')
            ->maxLength('usua_email', 100)
            ->requirePresence('usua_email', 'create')
            ->allowEmptyString('usua_email', false);

        $validator
            ->integer('usua_empr_codigo')
            // ->requirePresence('usua_empr_codigo', 'create')
            ->allowEmptyString('usua_empr_codigo', false);

        $validator
            ->dateTime('usua_ativacao')
            ->allowEmptyDateTime('usua_ativacao');

        $validator
            ->integer('usua_usua_codigo')
            ->allowEmptyString('usua_usua_codigo');

        $validator
            ->dateTime('usua_created')
            // ->requirePresence('usua_created', 'create')
            ->allowEmptyDateTime('usua_created', false);

        $validator
            ->dateTime('usua_modified')
            ->allowEmptyDateTime('usua_modified');

        $validator
            ->dateTime('usua_deleted')
            ->allowEmptyDateTime('usua_deleted');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['usua_email']));

        return $rules;
    }

    public function findAuth(\Cake\ORM\Query $query, array $options)
    {
        $query
            ->select(['usua_codigo', 'usua_nome', 'usua_email', 'usua_senha'])
            ->where(['1 = 1']);
        return $query;
    }
}
