<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ClieCliente Controller
 *
 * @property \App\Model\Table\ClieClienteTable $ClieCliente
 *
 * @method \App\Model\Entity\ClieCliente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClieClienteController extends AppController
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
        $this->paginate = [
            'conditions' => $conditions
        ];
        $clieCliente = $this->paginate($this->ClieCliente);
        $paging = $this->request->getParam('paging')['ClieCliente'];
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
            'clientes' => $clieCliente,
            'paging' => $paging,
            '_serialize' => ['clientes','paging']
        ]);
    }

    private function montaConditions($queryString)
    {
        $conditions = [];
        if (!empty($queryString['clie_nome'])) {
            $conditions['clie_nome ilike'] = $queryString['clie_nome']."%";
        }
        return $conditions;
    }

    /**
     * View method
     *
     * @param string|null $id Clie Cliente id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clieCliente = $this->ClieCliente->get($id, [
            'fields' => [
                'clie_nome',
                'clie_cnpjcpf',
                'clie_insestrg',
                'clie_insmun',
                'clie_cep',
                'clie_endereco',
                'clie_numero',
                'clie_complemento',
                'clie_bairro',
                'clie_cidade',
                'clie_uf',
                'clie_celular',
                'clie_telefone'
            ]
        ]);

        $this->set([
            'cliente' => $clieCliente,
            '_serialize' => ['cliente']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clieCliente = $this->ClieCliente->newEntity();
        if ($this->request->is('post')) {
            $clieCliente = $this->ClieCliente->patchEntity($clieCliente, $this->request->getData());
            if ($this->ClieCliente->save($clieCliente)) {
                $message = 'Saved';
            } else {
                $message = $clieCliente->getErrors();
            }
        }
        $this->set([
            'message' => $message,
            'cliente' => $clieCliente,
            '_serialize' => ['cliente', 'message']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Clie Cliente id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $clieCliente = $this->ClieCliente->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clieCliente = $this->ClieCliente->patchEntity($clieCliente, $this->request->getData());
            if ($this->ClieCliente->save($clieCliente)) {
                $message = 'Saved';
            } else {
                $message = $clieCliente->getErrors();
            }
        }
        $this->set([
            'message' => $message,
            'cliente' => $clieCliente,
            '_serialize' => ['cliente', 'message']
        ]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Clie Cliente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $message = 'Deleted';
        $clieCliente = $this->ClieCliente->get($id);
        if (!$this->ClieCliente->delete($clieCliente)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}
