<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VendVendedor Model
 *
 * @method \App\Model\Entity\VendVendedor get($primaryKey, $options = [])
 * @method \App\Model\Entity\VendVendedor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VendVendedor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VendVendedor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendVendedor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VendVendedor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VendVendedor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VendVendedor findOrCreate($search, callable $callback = null, $options = [])
 */
class VendVendedorTable extends AppTable
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

        $this->setTable('vend_vendedor');
        $this->setDisplayField('vend_codigo');
        $this->setPrimaryKey('vend_codigo');
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
            ->integer('vend_codigo')
            ->allowEmptyString('vend_codigo', 'create');

        $validator
            ->scalar('vend_nome')
            ->maxLength('vend_nome', 60)
            ->requirePresence('vend_nome', 'create')
            ->allowEmptyString('vend_nome', false);

        $validator
            ->scalar('vend_cnpjcpf')
            ->maxLength('vend_cnpjcpf', 14)
            ->allowEmptyString('vend_cnpjcpf');

        $validator
            ->scalar('vend_insestrg')
            ->maxLength('vend_insestrg', 15)
            ->allowEmptyString('vend_insestrg');

        $validator
            ->scalar('vend_insmun')
            ->maxLength('vend_insmun', 15)
            ->allowEmptyString('vend_insmun');

        $validator
            ->scalar('vend_cep')
            ->maxLength('vend_cep', 8)
            ->allowEmptyString('vend_cep');

        $validator
            ->scalar('vend_endereco')
            ->maxLength('vend_endereco', 100)
            ->allowEmptyString('vend_endereco');

        $validator
            ->scalar('vend_numero')
            ->maxLength('vend_numero', 10)
            ->allowEmptyString('vend_numero');

        $validator
            ->scalar('vend_complemento')
            ->maxLength('vend_complemento', 15)
            ->allowEmptyString('vend_complemento');

        $validator
            ->scalar('vend_bairro')
            ->maxLength('vend_bairro', 100)
            ->allowEmptyString('vend_bairro');

        $validator
            ->scalar('vend_cidade')
            ->maxLength('vend_cidade', 100)
            ->allowEmptyString('vend_cidade');

        $validator
            ->scalar('vend_uf')
            ->maxLength('vend_uf', 2)
            ->allowEmptyString('vend_uf');

        $validator
            ->scalar('vend_celular')
            ->maxLength('vend_celular', 11)
            ->allowEmptyString('vend_celular');

        $validator
            ->scalar('vend_telefone')
            ->maxLength('vend_telefone', 11)
            ->allowEmptyString('vend_telefone');

        $validator
            ->integer('vend_usua_codigo')
            // ->requirePresence('vend_usua_codigo', 'create')
            ->allowEmptyString('vend_usua_codigo', false);

        $validator
            ->integer('vend_empr_codigo')
            // ->requirePresence('vend_empr_codigo', 'create')
            ->allowEmptyString('vend_empr_codigo', false);

        $validator
            ->dateTime('vend_created')
            // ->requirePresence('vend_created', 'create')
            ->allowEmptyDateTime('vend_created', false);

        $validator
            ->dateTime('vend_modified')
            ->allowEmptyDateTime('vend_modified');

        $validator
            ->dateTime('vend_deleted')
            ->allowEmptyDateTime('vend_deleted');

        return $validator;
    }
}
