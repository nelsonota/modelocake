<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * IproImportProduto Controller
 *
 * @property \App\Model\Table\IproImportProdutoTable $IproImportProduto
 *
 * @method \App\Model\Entity\IproImportProduto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IproImportProdutoController extends AppController
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

        $iproImportProduto = $this->paginate($this->IproImportProduto->find()->where($conditions));

        $paging = $this->request->getParam('paging')['IproImportProduto'];
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
            'produtos' => $iproImportProduto,
            'paging' => $paging,
            '_serialize' => ['produtos','paging']
        ]);
    }

    private function montaConditions($queryString)
    {
        $conditions = [];
        if (!empty($queryString['ipro_ifil_codigo'])) {
            $conditions['ipro_ifil_codigo'] = $queryString['ipro_ifil_codigo'];
        }
        return $conditions;
    }

    /**
     * View method
     *
     * @param string|null $id Ipro Import Produto id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $iproImportProduto = $this->IproImportProduto->get($id, [
            'contain' => []
        ]);

        $this->set([
            'arquivo' => $ifilImportFile,
            '_serialize' => ['arquivo']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $iproImportProduto = $this->IproImportProduto->newEntity();
        if ($this->request->is('post')) {
            $files = $this->request->getUploadedFiles();
            $stream = $files['file']->getStream();
            while (! $stream->eof()) {
                pr($stream->read(4096));
            }
            $iproImportProduto = $this->IproImportProduto->patchEntity($iproImportProduto, $this->request->getData());
            if ($this->IproImportProduto->save($iproImportProduto)) {
                $message = 'Saved';
            } else {
                $message = $iproImportProduto->getErrors();
            }
        }
        $this->set([
            'message' => $message,
            'produto' => $iproImportProduto,
            '_serialize' => ['produto', 'message']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ipro Import Produto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $iproImportProduto = $this->IproImportProduto->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $iproImportProduto = $this->IproImportProduto->patchEntity($iproImportProduto, $this->request->getData());
            if ($this->IproImportProduto->save($iproImportProduto)) {
                $message = 'Saved';
            } else {
                $message = $iproImportProduto->getErrors();
            }
        }
        $this->set([
            'message' => $message,
            'produto' => $iproImportProduto,
            '_serialize' => ['produto', 'message']
        ]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ipro Import Produto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $message = 'Deleted';
        $iproImportProduto = $this->IproImportProduto->get($id);
        if (!$this->IproImportProduto->delete($iproImportProduto)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}
