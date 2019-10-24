<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * EmprEmpresa Controller
 *
 * @property \App\Model\Table\EmprEmpresaTable $EmprEmpresa
 *
 * @method \App\Model\Entity\EmprEmpresa[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmprEmpresaController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->RequestHandler->ext = 'json';
        $this->Auth->allow('add');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $emprEmpresa = $this->paginate($this->EmprEmpresa);

        $this->set([
            'empresas' => $emprEmpresa,
            'paging' => $this->request->getParam('paging')['EmprEmpresa'],
            '_serialize' => ['empresas','paging']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Empr Empresa id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $emprEmpresa = $this->EmprEmpresa->get($id, [
            'contain' => []
        ]);

        $this->set([
            'empresa' => $emprEmpresa,
            '_serialize' => ['empresa']
        ]);
    }

    private function convertData($request)
    {
        $formated = $request;
        if (isset($request['usua_email'])) {
            $usua_usuario = [];
            if (isset($request['usua_email'])) $usua_usuario['usua_email'] = $request['usua_email'];
            if (isset($request['usua_nome'])) $usua_usuario['usua_nome'] = $request['usua_nome'];
            if (isset($request['usua_senha'])) $usua_usuario['usua_senha'] = $request['usua_senha'];
            $formated['usua_usuario'] = [$usua_usuario];
        }
        return $formated;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $emprEmpresa = $this->EmprEmpresa->newEntity();
        $success = false;
        $message = '';
        if ($this->request->is('post')) {
            $request_data = $this->request->getData();
            $data = $this->convertData($request_data);
            $emprEmpresa = $this->EmprEmpresa->patchEntity($emprEmpresa, $data, ['associated' => 'UsuaUsuario']);
            $emprEmpresa->usua_usuario = [$this->EmprEmpresa->UsuaUsuario->newEntity($data['usua_usuario'][0])];
            if ($this->EmprEmpresa->save($emprEmpresa)) {
                $success = true;
            } else {
                $message = $emprEmpresa->getErrors();
            }            
        }
        $this->set([
            'success' => $success,
            'message' => $message,
            'empresa' => $emprEmpresa,
            '_serialize' => ['empresa', 'message', 'success']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Empr Empresa id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $emprEmpresa = $this->EmprEmpresa->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $emprEmpresa = $this->EmprEmpresa->patchEntity($emprEmpresa, $this->request->getData());
            if ($this->EmprEmpresa->save($emprEmpresa)) {
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $this->set([
            'message' => $message,
            'empresa' => $emprEmpresa,
            '_serialize' => ['empresa', 'message']
        ]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Empr Empresa id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $emprEmpresa = $this->EmprEmpresa->get($id);
        $message = 'Deleted';
        if (!$this->EmprEmpresa->delete($emprEmpresa)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}
