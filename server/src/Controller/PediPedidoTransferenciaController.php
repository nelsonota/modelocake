<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PediPedidoTransferencia Controller
 *
 * @property \App\Model\Table\PediPedidoTransferenciaTable $PediPedidoTransferencia
 *
 * @method \App\Model\Entity\PediPedidoTransferencia[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PediPedidoTransferenciaController extends AppController
{
    protected $pedi_tipo = ['S'];
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->PediPedidoTransferencia->addAssociations([
            'belongsTo' => [
                'EstoqueDestino' => [
                    'className' => 'VendVendedor',
                    'foreignKey' => false,
                    'conditions' => 'EstoqueDestino.vend_codigo = PediPedidoOrigem.pedi_vend_codigo_estoque'
                ]
            ]
        ]);
        $this->paginate = [
            'contain' => ['Estoque', 'PediPedidoOrigem', 'EstoqueDestino']
        ];
        $pediPedidoTransferencia = $this->paginate($this->PediPedidoTransferencia->find()
                ->select(
                    [
                        'pedi_codigo',
                        'pedi_created',
                        'pedi_baixado',
                        'pedi_de' => 'Estoque.vend_nome',
                        'pedi_para' => 'EstoqueDestino.vend_nome',
                    ]
                )
                // ->group([
                //     'pedi_codigo',
                //     'pedi_created',
                //     'pedi_baixado',
                //     'Estoque.vend_nome',
                //     'PediPedidoOrigem.Estoque.vend_nome',
                // ])
                ->order([
                    'PediPedidoTransferencia.pedi_baixado'
                ])
            , [
            'conditions' => ['PediPedidoTransferencia.pedi_tipo IN' => $this->pedi_tipo]
        ]);
        $paging = $this->request->getParam('paging')['PediPedidoTransferencia'];
        $paging = [
            'total' => $paging['count'],
            'last_page' => round($paging['count'] / $paging['perPage']),
            'next_page_url' => null,
            'prev_page_url' => null,
            'current_page' => $paging['page'],
            'per_page' => $paging['perPage'],
            'from' => $paging['start'],
            'to' => $paging['end']
        ];
        $this->set([
            'pedidos' => $pediPedidoTransferencia,
            'paging' => $paging,
            '_serialize' => ['pedidos','paging']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Pedi Pedido id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pediPedidoTransferencia = $this->PediPedidoTransferencia->get($id, [
            'contain' => [
                'VendVendedor' => ['fields' => [
                    'vend_codigo',
                    'vend_nome'
                ]],
                'PitePedidoItem' => ['fields' => [
                    'pite_codigo',
                    'pite_pedi_codigo',
                    'pite_prod_codigo',
                    'pite_quantidade',
                    'pite_valor',
                    'pite_valor_custo',
                    'pite_valor_realizado'
                ]],
                'PitePedidoItem.ProdProduto' => ['fields' => [
                    'prod_codigo_interno',
                    'prod_codigo_externo',
                    'prod_descricao',
                ]]
            ],
            'conditions' => [
                'pedi_tipo' => $this->pedi_tipo
            ],
            
        ]);
        // unset($pediPedidoTransferencia->pedi_created);
        unset($pediPedidoTransferencia->pedi_modified);
        unset($pediPedidoTransferencia->pedi_deleted);
        unset($pediPedidoTransferencia->pedi_empr_codigo);
        unset($pediPedidoTransferencia->pedi_usua_codigo);
        unset($pediPedidoTransferencia->pedi_clie_codigo);
        $this->set([
            'pedido' => $pediPedidoTransferencia,
            '_serialize' => ['pedido']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pediPedidoTransferencia = $this->PediPedidoTransferencia->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['pedi_vend_codigo'] = $data['pedi_vend_codigo_estoque'];
            $data['pedi_tipo'] = 'S';
            $pedido = $data;
            $data['pedi_tipo'] = 'E';
            $data['pedi_vend_codigo_estoque'] = $data['pedi_vend_codigo_destino'];
            $pedido['pedi_pedido_origem'] = $data;
            $pediPedidoTransferencia = $this->PediPedidoTransferencia->patchEntity($pediPedidoTransferencia, $pedido, ['associated' => ['PitePedidoItem', 'PediPedidoOrigem', 'PediPedidoOrigem.PitePedidoItem']]);
            if ($this->PediPedidoTransferencia->save($pediPedidoTransferencia)) {
                $message = 'Saved';
            } else {
                $message = $pediPedidoTransferencia->getErrors();
            }
        }
        $this->set([
            'message' => $message,
            'pedido' => $pediPedidoTransferencia,
            '_serialize' => ['pedido', 'message']
        ]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedi Pedido id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $message = 'Deleted';
        $pediPedidoTransferencia = $this->PediPedidoTransferencia->get($id);
        if (!$this->PediPedidoTransferencia->deleteOrFail($pediPedidoTransferencia)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}
