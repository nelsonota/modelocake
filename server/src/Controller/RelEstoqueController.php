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
class RelEstoqueController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadModel('ProdProduto');
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
        $prodProduto = $this->paginate(
            $this->ProdProduto->find()
            ->select([
                'prod_codigo',
                'prod_codigo_interno',
                'prod_codigo_externo',
                'prod_descricao',
                'prod_valor',
                'prod_valor_custo',
                'prod_tamanho',
                'prod_unidade',
                'prod_cor',
                'pedi_pedido.pedi_vend_codigo_estoque',
                'vend_vendedor.vend_nome',
                'forn_fornecedor.forn_nome',
                'saldo' => "SUM(pite_quantidade * (CASE WHEN pedi_tipo IN ('C','E') THEN 1 ELSE -1 END))",
            ])
            ->join([ 'table' => 'pite_pedido_item', 'alias' => 'pite_pedido_iotem', 'type' => 'LEFT', 'conditions' => ['pite_prod_codigo = prod_codigo', 'pite_deleted IS NULL'] ])
            ->join([ 'table' => 'pedi_pedido', 'alias' => 'pedi_pedido', 'type' => 'LEFT', 'conditions' => ['pedi_codigo = pite_pedi_codigo', 'pedi_deleted IS NULL'] ])
            ->join([ 'table' => 'vend_vendedor', 'alias' => 'vend_vendedor', 'type' => 'LEFT', 'conditions' => 'vend_codigo = pedi_vend_codigo_estoque' ])
            ->join([ 'table' => 'forn_fornecedor', 'alias' => 'forn_fornecedor', 'type' => 'LEFT', 'conditions' => 'forn_codigo = prod_forn_codigo' ])
            ->where($conditions)
            ->group(
                [
                    'prod_codigo',
                    'prod_codigo_interno',
                    'prod_codigo_externo',
                    'prod_descricao',
                    'prod_valor',
                    'prod_valor_custo',
                    'prod_tamanho',
                    'prod_unidade',
                    'prod_cor',
                    'pedi_vend_codigo_estoque',
                    'vend_nome',
                    'forn_nome'
                ]
            )
        );
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
        if (!empty($queryString['prod_codigo_interno'])) {
            $conditions['prod_codigo_interno ilike'] = $queryString['prod_codigo_interno']."%";
        }
        if (!empty($queryString['prod_codigo_externo'])) {
            $conditions['prod_codigo_externo ilike'] = $queryString['prod_codigo_externo']."%";
        }
        if (!empty($queryString['prod_tamanho'])) {
            $conditions['prod_tamanho'] = $queryString['prod_tamanho'];
        }
        if (!empty($queryString['prod_cor'])) {
            $conditions['prod_cor'] = $queryString['prod_cor'];
        }
        if (!empty($queryString['pedi_vend_codigo_estoque'])) {
            $conditions['pedi_vend_codigo_estoque'] = $queryString['pedi_vend_codigo_estoque'];
        }
        return $conditions;
    }
}
