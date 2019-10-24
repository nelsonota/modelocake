<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PediPedidoCompra Controller
 *
 * @property \App\Model\Table\PediPedidoCompraTable $PediPedidoCompra
 *
 * @method \App\Model\Entity\PediPedidoCompra[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PediPedidoCompraController extends AppController
{
    protected $pedi_tipo = 'C';
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['FornFornecedor']
        ];
        $pediPedidoCompra = $this->paginate($this->PediPedidoCompra->find()
                ->select(
                    [
                        'pedi_codigo',
                        'pedi_created',
                        'pedi_baixado',
                        'FornFornecedor.forn_nome',
                        'pedi_valor_total' => 'SUM(pite_quantidade * pite_valor_realizado)'
                    ]
                )
                ->leftJoinWith('PitePedidoItem')
                ->group([
                    'pedi_codigo',
                    'pedi_created',
                    'pedi_baixado',
                    'FornFornecedor.forn_nome'
                ])
                ->order([
                    'pedi_baixado'
                ])
            , [
            'conditions' => ['pedi_tipo' => $this->pedi_tipo]
        ]);
        $paging = $this->request->getParam('paging')['PediPedidoCompra'];
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
            'pedidos' => $pediPedidoCompra,
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
        $pediPedidoCompra = $this->PediPedidoCompra->get($id, [
            'contain' => [
                'FornFornecedor' => ['fields' => [
                    'forn_codigo',
                    'forn_nome'
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
        // unset($pediPedidoCompra->pedi_created);
        unset($pediPedidoCompra->pedi_modified);
        unset($pediPedidoCompra->pedi_deleted);
        unset($pediPedidoCompra->pedi_empr_codigo);
        unset($pediPedidoCompra->pedi_usua_codigo);
        unset($pediPedidoCompra->pedi_clie_codigo);
        $this->set([
            'pedido' => $pediPedidoCompra,
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
        $pediPedidoCompra = $this->PediPedidoCompra->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['pedi_tipo'] = $this->pedi_tipo;
            $data['pedi_vend_codigo'] = $this->Auth->user()['usua_codigo'];
            $data['pedi_vend_codigo_estoque'] = $this->Auth->user()['usua_codigo'];
            $pediPedidoCompra = $this->PediPedidoCompra->patchEntity($pediPedidoCompra, $data, ['associated' => ['PitePedidoItem']]);
            if ($this->PediPedidoCompra->save($pediPedidoCompra)) {
                $message = 'Saved';
            } else {
                $message = $pediPedidoCompra->getErrors();
            }
        }
        $this->set([
            'message' => $message,
            'pedido' => $pediPedidoCompra,
            '_serialize' => ['pedido', 'message']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pedi Pedido id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pediPedidoCompra = $this->PediPedidoCompra->get($id, [
            'contain' => [
                'PitePedidoItem'
            ]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $data['pedi_tipo'] = $this->pedi_tipo;
            $pediPedidoCompra = $this->PediPedidoCompra->patchEntity($pediPedidoCompra, $data);
            if ($this->PediPedidoCompra->save($pediPedidoCompra)) {
                $message = 'Saved';
            } else {
                $message = $pediPedidoCompra->getErrors();
            }
        }
        $this->set([
            'message' => $message,
            'pedido' => $pediPedidoCompra,
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
        $pediPedidoCompra = $this->PediPedidoCompra->get($id);
        if (!$this->PediPedidoCompra->deleteOrFail($pediPedidoCompra)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}
