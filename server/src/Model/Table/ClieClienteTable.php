<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ClieCliente Model
 *
 * @method \App\Model\Entity\ClieCliente get($primaryKey, $options = [])
 * @method \App\Model\Entity\ClieCliente newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ClieCliente[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ClieCliente|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClieCliente saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClieCliente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ClieCliente[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ClieCliente findOrCreate($search, callable $callback = null, $options = [])
 */
class ClieClienteTable extends AppTable
{
    use DocumentoTrait;
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('clie_cliente');
        $this->setDisplayField('clie_codigo');
        $this->setPrimaryKey('clie_codigo');
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
            ->integer('clie_codigo')
            ->allowEmptyString('clie_codigo', 'create');

        $validator
            ->scalar('clie_nome')
            ->maxLength('clie_nome', 60)
            ->requirePresence('clie_nome', 'create')
            ->allowEmptyString('clie_nome', false);

        $validator
            ->scalar('clie_cnpjcpf')
            ->maxLength('clie_cnpjcpf', 14)
            ->requirePresence('clie_nome', 'create')
            ->allowEmptyString('clie_cnpjcpf')
            ->add('clie_cnpjcpf', 'custom', [
                'rule' => [$this, 'validaCNPJCPF'],
                'message' => __('Documento inválido')
            ]);

        $validator
            ->scalar('clie_insestrg')
            ->maxLength('clie_insestrg', 15)
            ->allowEmptyString('clie_insestrg');

        $validator
            ->scalar('clie_insmun')
            ->maxLength('clie_insmun', 15)
            ->allowEmptyString('clie_insmun');

        $validator
            ->scalar('clie_cep')
            ->maxLength('clie_cep', 8)
            ->allowEmptyString('clie_cep');

        $validator
            ->scalar('clie_endereco')
            ->maxLength('clie_endereco', 100)
            ->allowEmptyString('clie_endereco');

        $validator
            ->scalar('clie_numero')
            ->maxLength('clie_numero', 10)
            ->allowEmptyString('clie_numero');

        $validator
            ->scalar('clie_complemento')
            ->maxLength('clie_complemento', 15)
            ->allowEmptyString('clie_complemento');

        $validator
            ->scalar('clie_bairro')
            ->maxLength('clie_bairro', 100)
            ->allowEmptyString('clie_bairro');

        $validator
            ->scalar('clie_cidade')
            ->maxLength('clie_cidade', 100)
            ->allowEmptyString('clie_cidade');

        $validator
            ->scalar('clie_uf')
            ->maxLength('clie_uf', 2)
            ->allowEmptyString('clie_uf');

        $validator
            ->scalar('clie_celular')
            ->maxLength('clie_celular', 11)
            ->allowEmptyString('clie_celular');

        $validator
            ->scalar('clie_telefone')
            ->maxLength('clie_telefone', 11)
            ->allowEmptyString('clie_telefone');

        $validator
            ->integer('clie_usua_codigo')
            // ->requirePresence('clie_usua_codigo', 'create')
            ->allowEmptyString('clie_usua_codigo', false);

        $validator
            ->integer('clie_empr_codigo')
            // ->requirePresence('clie_empr_codigo', 'create')
            ->allowEmptyString('clie_empr_codigo', false);

        $validator
            ->dateTime('clie_created')
            // ->requirePresence('clie_created', 'create')
            ->allowEmptyDateTime('clie_created', false);

        $validator
            ->dateTime('clie_modified')
            ->allowEmptyDateTime('clie_modified');

        $validator
            ->dateTime('clie_deleted')
            ->allowEmptyDateTime('clie_deleted');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['clie_cnpjcpf']));

        return $rules;
    }
}
