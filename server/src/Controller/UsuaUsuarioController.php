<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Security;

/**
 * UsuaUsuario Controller
 *
 * @property \App\Model\Table\UsuaUsuarioTable $UsuaUsuario
 *
 * @method \App\Model\Entity\UsuaUsuario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsuaUsuarioController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->Auth->allow(['login', 'logout']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $usuaUsuario = $this->paginate($this->UsuaUsuario);
        $this->set([
            'usuarios' => $usuaUsuario,
            'paging' => $this->request->getParam('paging')['UsuaUsuario'],
            '_serialize' => ['usuarios','paging']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Usua Usuario id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuaUsuario = $this->UsuaUsuario->get($id, [
            'contain' => []
        ]);

        $this->set([
            'usuario' => $usuaUsuario,
            '_serialize' => ['usuario']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuaUsuario = $this->UsuaUsuario->newEntity();
        if ($this->request->is('post')) {
            $usuaUsuario = $this->UsuaUsuario->patchEntity($usuaUsuario, $this->request->getData());
            if ($this->UsuaUsuario->save($usuaUsuario)) {
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $this->set([
            'message' => $message,
            'usuario' => $usuaUsuario,
            '_serialize' => ['usuario', 'message']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Usua Usuario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuaUsuario = $this->UsuaUsuario->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuaUsuario = $this->UsuaUsuario->patchEntity($usuaUsuario, $this->request->getData());
            if ($this->UsuaUsuario->save($usuaUsuario)) {
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $this->set([
            'message' => $message,
            'usuario' => $usuaUsuario,
            '_serialize' => ['usuario', 'message']
        ]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Usua Usuario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuaUsuario = $this->UsuaUsuario->get($id);
        $message = 'Deleted';
        if (!$this->UsuaUsuario->delete($usuaUsuario)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $request = $this->getRequest();
            $request = $request->withData('usua_email', $request->getData()['usua_email']);
            $request = $request->withData('usua_senha', $request->getData()['usua_senha']);
            $this->request = $request;
            $user = $this->Auth->identify();
            $success = false;
            $usuario = null;
            if ($user) {
                $success = true;
                $usuario = [
                    'codigo' => $user['usua_codigo'],
                    'nome' => $user['usua_nome'],
                    'email' => $user['usua_email'],
                    'token' => $token = \Firebase\JWT\JWT::encode([
                        'sub' => $user['usua_email'],
                        // 'exp' => time() + 3600,
                    ], Security::getSalt()),
                ];
            }

            $this->set([
                'success' => $success,
                'usuario' => $usuario,
                '_serialize' => ['success', 'usuario']
            ]);
        }
    }
}
