<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PitePedidoItem Controller
 *
 * @property \App\Model\Table\PitePedidoItemTable $PitePedidoItem
 *
 * @method \App\Model\Entity\PitePedidoItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PitePedidoItemController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $pitePedidoItem = $this->paginate($this->PitePedidoItem);
        $this->set([
            'itens_pedido' => $pitePedidoItem,
            'paging' => $this->request->getParam('paging')['PitePedidoItem'],
            '_serialize' => ['itens_pedido','paging']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Pite Pedido Item id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pitePedidoItem = $this->PitePedidoItem->get($id, [
            'fields' => [
                'pite_pedi_codigo',
                'pite_prod_codigo',
                'pite_quantidade',
                'pite_valor_custo',
                'pite_valor',
                'pite_valor_realizado'
            ]
        ]);

        $this->set([
            'item_pedido' => $pitePedidoItem,
            '_serialize' => ['item_pedido']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pitePedidoItem = $this->PitePedidoItem->newEntity();
        if ($this->request->is('post')) {
            $pitePedidoItem = $this->PitePedidoItem->patchEntity($pitePedidoItem, $this->request->getData());
            if ($this->PitePedidoItem->save($pitePedidoItem)) {
                $message = 'Saved';
            } else {
                $message = $pitePedidoItem->getErrors();
            }
        }
        $this->set([
            'message' => $message,
            'item_pedido' => $pitePedidoItem,
            '_serialize' => ['item_pedido', 'message']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pite Pedido Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pitePedidoItem = $this->PitePedidoItem->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pitePedidoItem = $this->PitePedidoItem->patchEntity($pitePedidoItem, $this->request->getData());
            if ($this->PitePedidoItem->save($pitePedidoItem)) {
                $message = 'Saved';
            } else {
                $message = $pitePedidoItem->getErrors();
            }
        }
        $this->set([
            'message' => $message,
            'item_pedido' => $pitePedidoItem,
            '_serialize' => ['item_pedido', 'message']
        ]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pite Pedido Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $message = 'Deleted';
        $pitePedidoItem = $this->PitePedidoItem->get($id);
        if (!$this->PitePedidoItem->delete($pitePedidoItem)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}
