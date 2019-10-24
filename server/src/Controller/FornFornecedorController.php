<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FornFornecedor Controller
 *
 * @property \App\Model\Table\FornFornecedorTable $FornFornecedor
 *
 * @method \App\Model\Entity\FornFornecedor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FornFornecedorController extends AppController
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
        $fields = null;
        if (!empty($queryString['type']) && $queryString['type'] == 'list') {
            $fields = ['forn_codigo', 'forn_nome'];
        }
        $this->paginate = [
            'fields' => $fields,
            'conditions' => $conditions
        ];
        $fornFornecedor = $this->paginate($this->FornFornecedor);
        $paging = $this->request->getParam('paging')['FornFornecedor'];
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
            'fornecedores' => $fornFornecedor,
            'paging' => $paging,
            '_serialize' => ['fornecedores','paging']
        ]);
    }

    private function montaConditions($queryString)
    {
        $conditions = [];
        if (!empty($queryString['forn_nome'])) {
            $conditions['forn_nome ilike'] = $queryString['forn_nome']."%";
        }
        return $conditions;
    }

    /**
     * View method
     *
     * @param string|null $id Forn Fornecedor id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fornFornecedor = $this->FornFornecedor->get($id, [
            'fields' => [
                'forn_nome',
                'forn_cnpjcpf',
                'forn_insestrg',
                'forn_insmun',
                'forn_cep',
                'forn_endereco',
                'forn_numero',
                'forn_complemento',
                'forn_bairro',
                'forn_cidade',
                'forn_uf',
                'forn_celular',
                'forn_telefone'
            ]
        ]);

        $this->set([
            'fornecedor' => $fornFornecedor,
            '_serialize' => ['fornecedor']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fornFornecedor = $this->FornFornecedor->newEntity();
        if ($this->request->is('post')) {
            $fornFornecedor = $this->FornFornecedor->patchEntity($fornFornecedor, $this->request->getData());
            if ($this->FornFornecedor->save($fornFornecedor)) {
                $message = 'Saved';
            } else {
                $message = $fornFornecedor->getErrors();
            }
        }
        $this->set([
            'message' => $message,
            'fornecedor' => $fornFornecedor,
            '_serialize' => ['fornecedor', 'message']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Forn Fornecedor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fornFornecedor = $this->FornFornecedor->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fornFornecedor = $this->FornFornecedor->patchEntity($fornFornecedor, $this->request->getData());
            if ($this->FornFornecedor->save($fornFornecedor)) {
                $message = 'Saved';
            } else {
                $message = $fornFornecedor->getErrors();
            }
        }
        $this->set([
            'message' => $message,
            'fornecedor' => $fornFornecedor,
            '_serialize' => ['fornecedor', 'message']
        ]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Forn Fornecedor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $message = 'Deleted';
        $fornFornecedor = $this->FornFornecedor->get($id);
        if (!$this->FornFornecedor->delete($fornFornecedor)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}
