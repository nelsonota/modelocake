<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PediPedidoVenda Controller
 *
 * @property \App\Model\Table\PediPedidoVendaTable $PediPedidoVenda
 *
 * @method \App\Model\Entity\PediPedidoVenda[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PediPedidoVendaController extends AppController
{
    protected $pedi_tipo = 'V';
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ClieCliente']
        ];
        $pediPedidoVenda = $this->paginate($this->PediPedidoVenda->find()
                ->select(
                    [
                        'pedi_codigo',
                        'pedi_created',
                        'pedi_baixado',
                        'ClieCliente.clie_nome',
                        'pedi_valor_total' => 'SUM(pite_quantidade * pite_valor_realizado)'
                    ]
                )
                ->leftJoinWith('PitePedidoItem')
                ->group([
                    'pedi_codigo',
                    'pedi_created',
                    'pedi_baixado',
                    'ClieCliente.clie_nome'
                ])
                ->order([
                    'pedi_baixado'
                ])
            , [
            'conditions' => ['pedi_tipo' => $this->pedi_tipo]
        ]);
        $paging = $this->request->getParam('paging')['PediPedidoVenda'];
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
            'pedidos' => $pediPedidoVenda,
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
        $pediPedidoVenda = $this->PediPedidoVenda->get($id, [
            'contain' => [
                'ClieCliente' => ['fields' => [
                    'clie_codigo',
                    'clie_nome'
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
        // unset($pediPedidoVenda->pedi_created);
        unset($pediPedidoVenda->pedi_modified);
        unset($pediPedidoVenda->pedi_deleted);
        unset($pediPedidoVenda->pedi_empr_codigo);
        unset($pediPedidoVenda->pedi_usua_codigo);
        unset($pediPedidoVenda->pedi_clie_codigo);
        $this->set([
            'pedido' => $pediPedidoVenda,
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
        $pediPedidoVenda = $this->PediPedidoVenda->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['pedi_tipo'] = $this->pedi_tipo;
            $data['pedi_vend_codigo'] = $this->Auth->user()['usua_codigo'];
            $data['pedi_vend_codigo_estoque'] = $this->Auth->user()['usua_codigo'];
            $pediPedidoVenda = $this->PediPedidoVenda->patchEntity($pediPedidoVenda, $data, ['associated' => ['PitePedidoItem']]);
            if ($this->PediPedidoVenda->save($pediPedidoVenda)) {
                $message = 'Saved';
            } else {
                $message = $pediPedidoVenda->getErrors();
            }
        }
        $this->set([
            'message' => $message,
            'pedido' => $pediPedidoVenda,
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
        $pediPedidoVenda = $this->PediPedidoVenda->get($id, [
            'contain' => [
                'PitePedidoItem'
            ]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $data['pedi_tipo'] = $this->pedi_tipo;
            $pediPedidoVenda = $this->PediPedidoVenda->patchEntity($pediPedidoVenda, $data);
            if ($this->PediPedidoVenda->save($pediPedidoVenda)) {
                $message = 'Saved';
            } else {
                $message = $pediPedidoVenda->getErrors();
            }
        }
        $this->set([
            'message' => $message,
            'pedido' => $pediPedidoVenda,
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
        $pediPedidoVenda = $this->PediPedidoVenda->get($id);
        if (!$this->PediPedidoVenda->deleteOrFail($pediPedidoVenda)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}
