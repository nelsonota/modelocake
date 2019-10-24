<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * IpedImportPedido Controller
 *
 * @property \App\Model\Table\IpedImportPedidoTable $IpedImportPedido
 *
 * @method \App\Model\Entity\IpedImportPedido[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IpedImportPedidoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $queryString = $this->getRequest()->getQueryParams();
        $conditions = $this->montaConditions($queryString);

        $ipedImportPedido = $this->paginate($this->IpedImportPedido->find()
            ->select(
                [
                    'iped_codigo',
                    'iped_created',
                    'iped_imported',
                    'iped_message',
                    'iped_forn_nome',
                    'iped_forn_cnpjcpf',
                    'iped_quantidade' => 'SUM(ipit_quantidade)',
                    'iped_valor_total' => 'SUM(ipit_quantidade * ipit_valor_realizado)'
                ]
            )
            ->leftJoinWith('IpitImportPedidoItem')
            ->group([
                'iped_codigo',
                'iped_created',
                'iped_imported',
                'iped_forn_nome',
                'iped_forn_cnpjcpf',
            ])
            ->where($conditions)->contain(['IpitImportPedidoItem']));

        $paging = $this->request->getParam('paging')['IpedImportPedido'];
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
            'pedidos' => $ipedImportPedido,
            'paging' => $paging,
            '_serialize' => ['pedidos','paging']
        ]);
    }

    private function montaConditions($queryString)
    {
        $conditions = [];
        if (!empty($queryString['iped_ifil_codigo'])) {
            $conditions = [
                'iped_ifil_codigo' => $queryString['iped_ifil_codigo'],
                'iped_tipo' => $queryString['iped_tipo'],
            ];
        }
        return $conditions;
    }

    /**
     * View method
     *
     * @param string|null $id Iped Import Pedido id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ipedImportPedido = $this->IpedImportPedido->get($id, [
            'contain' => ['IpitImportPedidoItem']
        ]);

        $this->set('ipedImportPedido', $ipedImportPedido);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ipedImportPedido = $this->IpedImportPedido->newEntity();
        if ($this->request->is('post')) {
            $ipedImportPedido = $this->IpedImportPedido->patchEntity($ipedImportPedido, $this->request->getData());
            if ($this->IpedImportPedido->save($ipedImportPedido)) {
                $this->Flash->success(__('The iped import pedido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The iped import pedido could not be saved. Please, try again.'));
        }
        $this->set(compact('ipedImportPedido'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Iped Import Pedido id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ipedImportPedido = $this->IpedImportPedido->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ipedImportPedido = $this->IpedImportPedido->patchEntity($ipedImportPedido, $this->request->getData());
            if ($this->IpedImportPedido->save($ipedImportPedido)) {
                $this->Flash->success(__('The iped import pedido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The iped import pedido could not be saved. Please, try again.'));
        }
        $this->set(compact('ipedImportPedido'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Iped Import Pedido id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ipedImportPedido = $this->IpedImportPedido->get($id);
        if ($this->IpedImportPedido->delete($ipedImportPedido)) {
            $this->Flash->success(__('The iped import pedido has been deleted.'));
        } else {
            $this->Flash->error(__('The iped import pedido could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
