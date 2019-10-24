<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EmprEmpresa Model
 *
 * @method \App\Model\Entity\EmprEmpresa get($primaryKey, $options = [])
 * @method \App\Model\Entity\EmprEmpresa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EmprEmpresa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EmprEmpresa|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmprEmpresa saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmprEmpresa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EmprEmpresa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EmprEmpresa findOrCreate($search, callable $callback = null, $options = [])
 */
class EmprEmpresaTable extends AppTable
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

        $this->setTable('empr_empresa');
        $this->setDisplayField('empr_codigo');
        $this->setPrimaryKey('empr_codigo');
        $this->hasMany('UsuaUsuario')->setForeignKey('usua_empr_codigo');
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
            ->integer('empr_codigo')
            ->allowEmptyString('empr_codigo', 'create');

        $validator
            ->scalar('empr_documento')
            ->maxLength('empr_documento', 14)
            ->minLength('empr_documento', 14)
            ->requirePresence('empr_documento', 'create')
            ->allowEmptyString('empr_documento', false)
            ->add('empr_documento', 'custom', [
                'rule' => [$this, 'validaCNPJ'],
                'message' => __('Documento inválido')
            ]);

        $validator
            ->scalar('empr_razao_social')
            ->maxLength('empr_razao_social', 60)
            ->requirePresence('empr_razao_social', 'create')
            ->allowEmptyString('empr_razao_social', false);

        $validator
            ->dateTime('empr_ativacao')
            ->allowEmptyDateTime('empr_ativacao');

        $validator
            ->dateTime('empr_created')
            // ->requirePresence('empr_created', 'create')
            ->allowEmptyDateTime('empr_created', false);

        $validator
            ->dateTime('empr_modified')
            ->allowEmptyDateTime('empr_modified');

        $validator
            ->dateTime('empr_deleted')
            ->allowEmptyDateTime('empr_deleted');

        return $validator;
    }

    // function validaCNPJ($cnpj)
    // {
    //     $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
    //     // Valida tamanho
    //     if (strlen($cnpj) != 14)
    //         return false;
    //     // Valida primeiro dígito verificador
    //     for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
    //     {
    //         $soma += $cnpj{$i} * $j;
    //         $j = ($j == 2) ? 9 : $j - 1;
    //     }
    //     $resto = $soma % 11;
    //     if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
    //         return false;
    //     // Valida segundo dígito verificador
    //     for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
    //     {
    //         $soma += $cnpj{$i} * $j;
    //         $j = ($j == 2) ? 9 : $j - 1;
    //     }
    //     $resto = $soma % 11;
    //     return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    // }

}
