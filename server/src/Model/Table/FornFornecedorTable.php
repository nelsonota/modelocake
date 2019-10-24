<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FornFornecedor Model
 *
 * @method \App\Model\Entity\FornFornecedor get($primaryKey, $options = [])
 * @method \App\Model\Entity\FornFornecedor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FornFornecedor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FornFornecedor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FornFornecedor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FornFornecedor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FornFornecedor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FornFornecedor findOrCreate($search, callable $callback = null, $options = [])
 */
class FornFornecedorTable extends AppTable
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

        $this->setTable('forn_fornecedor');
        $this->setDisplayField('forn_codigo');
        $this->setPrimaryKey('forn_codigo');
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
            ->integer('forn_codigo')
            ->allowEmptyString('forn_codigo', 'create');

        $validator
            ->scalar('forn_nome')
            ->maxLength('forn_nome', 60)
            ->requirePresence('forn_nome', 'create')
            ->allowEmptyString('forn_nome', false);

        $validator
            ->scalar('forn_cnpjcpf')
            ->maxLength('forn_cnpjcpf', 14)
            ->requirePresence('forn_cnpjcpf', 'create')
            ->allowEmptyString('forn_cnpjcpf')
            ->add('forn_cnpjcpf', 'custom', [
                'rule' => [$this, 'validaCNPJCPF'],
                'message' => __('Documento inválido')
            ]);

        $validator
            ->scalar('forn_insestrg')
            ->maxLength('forn_insestrg', 15)
            ->allowEmptyString('forn_insestrg');

        $validator
            ->scalar('forn_insmun')
            ->maxLength('forn_insmun', 15)
            ->allowEmptyString('forn_insmun');

        $validator
            ->scalar('forn_cep')
            ->maxLength('forn_cep', 8)
            ->allowEmptyString('forn_cep');

        $validator
            ->scalar('forn_endereco')
            ->maxLength('forn_endereco', 100)
            ->allowEmptyString('forn_endereco');

        $validator
            ->scalar('forn_numero')
            ->maxLength('forn_numero', 10)
            ->allowEmptyString('forn_numero');

        $validator
            ->scalar('forn_complemento')
            ->maxLength('forn_complemento', 15)
            ->allowEmptyString('forn_complemento');

        $validator
            ->scalar('forn_bairro')
            ->maxLength('forn_bairro', 100)
            ->allowEmptyString('forn_bairro');

        $validator
            ->scalar('forn_cidade')
            ->maxLength('forn_cidade', 100)
            ->allowEmptyString('forn_cidade');

        $validator
            ->scalar('forn_uf')
            ->maxLength('forn_uf', 2)
            ->allowEmptyString('forn_uf');

        $validator
            ->scalar('forn_celular')
            ->maxLength('forn_celular', 11)
            ->allowEmptyString('forn_celular');

        $validator
            ->scalar('forn_telefone')
            ->maxLength('forn_telefone', 11)
            ->allowEmptyString('forn_telefone');

        $validator
            ->integer('forn_usua_codigo')
            // ->requirePresence('forn_usua_codigo', 'create')
            ->allowEmptyString('forn_usua_codigo', false);

        $validator
            ->integer('forn_empr_codigo')
            // ->requirePresence('forn_empr_codigo', 'create')
            ->allowEmptyString('forn_empr_codigo', false);

        $validator
            ->dateTime('forn_created')
            // ->requirePresence('forn_created', 'create')
            ->allowEmptyDateTime('forn_created', false);

        $validator
            ->dateTime('forn_modified')
            ->allowEmptyDateTime('forn_modified');

        $validator
            ->dateTime('forn_deleted')
            ->allowEmptyDateTime('forn_deleted');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['forn_cnpjcpf']));

        return $rules;
    }
}
