<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VendVendedor Controller
 *
 * @property \App\Model\Table\VendVendedorTable $VendVendedor
 *
 * @method \App\Model\Entity\VendVendedor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendVendedorController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $vendVendedor = $this->paginate($this->VendVendedor);
        $paging = $this->request->getParam('paging')['VendVendedor'];
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
            'vendedores' => $vendVendedor,
            'paging' => $paging,
            '_serialize' => ['vendedores','paging']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Vend Vendedor id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vendVendedor = $this->VendVendedor->get($id, [
            'fields' => [
                'vend_nome',
                'vend_cnpjcpf',
                'vend_insestrg',
                'vend_insmun',
                'vend_cep',
                'vend_endereco',
                'vend_numero',
                'vend_complemento',
                'vend_bairro',
                'vend_cidade',
                'vend_uf',
                'vend_celular',
                'vend_telefone'
            ]
        ]);

        $this->set([
            'vendedor' => $vendVendedor,
            '_serialize' => ['vendedor']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vendVendedor = $this->VendVendedor->newEntity();
        if ($this->request->is('post')) {
            $vendVendedor = $this->VendVendedor->patchEntity($vendVendedor, $this->request->getData());
            if ($this->VendVendedor->save($vendVendedor)) {
                $message = 'Saved';
            } else {
                $message = $vendVendedor->getErrors();
            }
        }
        $this->set([
            'message' => $message,
            'vendedor' => $vendVendedor,
            '_serialize' => ['vendedor', 'message']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vend Vendedor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vendVendedor = $this->VendVendedor->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendVendedor = $this->VendVendedor->patchEntity($vendVendedor, $this->request->getData());
            if ($this->VendVendedor->save($vendVendedor)) {
                $message = 'Saved';
            } else {
                $message = $vendVendedor->getErrors();
            }
        }
        $this->set([
            'message' => $message,
            'vendedor' => $vendVendedor,
            '_serialize' => ['vendedor', 'message']
        ]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vend Vendedor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $message = 'Deleted';
        $vendVendedor = $this->VendVendedor->get($id);
        if (!$this->VendVendedor->delete($vendVendedor)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}
