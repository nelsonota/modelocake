<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProdProduto Controller
 *
 * @property \App\Model\Table\ProdProdutoTable $ProdProduto
 *
 * @method \App\Model\Entity\ProdProduto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProdProdutoController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
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
        $prodProduto = $this->paginate($this->ProdProduto->find()->contain(['FornFornecedor']));
        $paging = $this->request->getParam('paging')['ProdProduto'];
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
            'produtos' => $prodProduto,
            'paging' => $paging,
            '_serialize' => ['produtos','paging']
        ]);
    }

    private function montaConditions($queryString)
    {
        $conditions = [];
        if (!empty($queryString['prod_descricao'])) {
            $conditions['prod_descricao ilike'] = $queryString['prod_descricao']."%";
        }
        return $conditions;
    }

    /**
     * View method
     *
     * @param string|null $id Prod Produto id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prodProduto = $this->ProdProduto->get($id, [
            'fields' => [
                'prod_codigo_interno',
                'prod_codigo_externo',
                'prod_descricao',
                'prod_valor',
                'prod_valor_custo',
                'prod_unidade',
                'prod_tamanho',
                'prod_cor',
                'prod_status'
            ]
        ]);

        $this->set([
            'produto' => $prodProduto,
            '_serialize' => ['produto']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $prodProduto = $this->ProdProduto->newEntity();
        if ($this->request->is('post')) {
            $prodProduto = $this->ProdProduto->patchEntity($prodProduto, $this->request->getData());
            if ($this->ProdProduto->save($prodProduto)) {
                $message = 'Saved';
            } else {
                $message = $prodProduto->getErrors();
            }
        }
        $this->set([
            'message' => $message,
            'produto' => $prodProduto,
            '_serialize' => ['produto', 'message']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Prod Produto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $prodProduto = $this->ProdProduto->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prodProduto = $this->ProdProduto->patchEntity($prodProduto, $this->request->getData());
            if ($this->ProdProduto->save($prodProduto)) {
                $message = 'Saved';
            } else {
                $message = $prodProduto->getErrors();
            }
        }
        $this->set([
            'message' => $message,
            'produto' => $prodProduto,
            '_serialize' => ['produto', 'message']
        ]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Prod Produto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $message = 'Deleted';
        $prodProduto = $this->ProdProduto->get($id);
        if (!$this->ProdProduto->delete($prodProduto)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}
