<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Core\Exception\Exception;

/**
 * IfilImportFile Controller
 *
 * @property \App\Model\Table\IfilImportFileTable $IfilImportFile
 *
 * @method \App\Model\Entity\IfilImportFile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IfilImportFileController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $model = $this->request->getHeader('model');
        switch ($model[0]) {
            case 'produto':
                $conditions = ['ifil_model' => 'ProdProduto'];
                break;
            case 'pedido_venda':
                $conditions = ['ifil_model' => 'PediPedidoVenda'];
                break;
            case 'pedido_compra':
                $conditions = ['ifil_model' => 'PediPedidoCompra'];
                break;
            default:
            $conditions = ['ifil_model' => null];
                break;
        }

        $ifilImportFile = $this->paginate($this->IfilImportFile->find()->where($conditions));

        $paging = $this->request->getParam('paging')['IfilImportFile'];
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
            'arquivos' => $ifilImportFile,
            'paging' => $paging,
            '_serialize' => ['arquivos','paging']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Ifil Import File id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ifilImportFile = $this->IfilImportFile->get($id, [
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
        $model = $this->request->getHeader('model');

        if ($model[0] == 'produto') {
            $this->addProduto();
        }

        if (substr($model[0],0,6) == 'pedido') {
            $this->addPedido(substr($model[0],7,1));
        }
    }

    public function addProduto()
    {
        $ifilImportFile = $this->IfilImportFile->newEntity();
        if ($this->request->is('post')) {
            $files = $this->request->getUploadedFiles();
            $data = [
                'ifil_model' => 'ProdProduto',
                'ifil_nome_arquivo' => $files['file']->getClientFilename(),
                'ipro_import_produto' => []
            ];
            $path = TMP.DS;
            $file = 'pr'.date('Ymdhms');
            $files['file']->moveTo($path.$file);
            
            $dados = false;
            $csv = array_map('str_getcsv', file($path.$file));
            unlink($path.$file);
            foreach ($csv as $key => $prod) {
                if ($key>0) {
                    $data['ipro_import_produto'][] = [
                        "ipro_forn_cnpjcpf" => $prod[0],
                        "ipro_forn_nome" => $prod[1],
                        "ipro_codigo_interno" => $prod[2],
                        "ipro_codigo_externo" => $prod[3],
                        "ipro_descricao" => $prod[4],
                        "ipro_valor" => $prod[5],
                        "ipro_valor_custo" => $prod[6],
                        "ipro_unidade" => $prod[7],
                        "ipro_tamanho" => $prod[8],
                        "ipro_cor" => $prod[9],
                        "ipro_status" => $prod[10]
                    ];
                }                
            }
            
            $ifilImportFile = $this->IfilImportFile->patchEntity($ifilImportFile, $data);
            if ($this->IfilImportFile->save($ifilImportFile)) {
                $message = 'Saved';
            } else {
                $message = $ifilImportFile->getErrors();
            }
        }
        $this->set([
            'message' => $message,
            'arquivo' => $ifilImportFile,
            '_serialize' => ['arquivo', 'message']
        ]);
    }

    public function addPedido($type)
    {
        $ifilImportFile = $this->IfilImportFile->newEntity();
        if ($this->request->is('post')) {
            $files = $this->request->getUploadedFiles();
            if ($files) {
                $data = [
                    'ifil_model' => $type == 'c' ? 'PediPedidoCompra' : ($type == 'v' ? 'PediPedidoVenda' : 'Indefinido'),
                    'ifil_nome_arquivo' => $files['file']->getClientFilename(),
                    'iped_import_pedido' => []
                ];
                $path = TMP.DS;
                $file = 'pr'.date('Ymdhms');
                $files['file']->moveTo($path.$file);
                
                $dados = false;
                $csv = array_map('str_getcsv', file($path.$file));

                unlink($path.$file);
                foreach ($csv as $key => $line) {
                    
                    if ($line[0] == "P") {
                        if (strtoupper($type) != strtoupper($line[1])) {
                            $message = 'Tipo de pedido incompatível';
                            break;
                        }
                        $data['iped_import_pedido'] = [
                            "iped_tipo" => strtoupper($line[1]),
                            "iped_baixado" => $line[2],
                            "iped_clie_cnpjcpf" => $line[3],
                            "iped_clie_nome" => $line[4],
                            "iped_forn_cnpjcpf" => $line[5],
                            "iped_forn_nome" => $line[6],
                            "iped_vend_cnpjcpf_estoque" => $line[7],
                            "iped_vend_cnpjcpf" => $line[8]
                        ];
                    }
                    if ($line[0] == "I") {
                        $data['iped_import_pedido']['ipit_import_pedido_item'][] = [
                            "ipit_prod_codigo_interno" => $line[1],
                            "ipit_quantidade" => $line[2],
                            "ipit_valor_realizado" => $line[3]
                        ];
                    }
                }
                if (empty($message)) {
                    $ifilImportFile = $this->IfilImportFile->patchEntity($ifilImportFile, $data, ['associated' => ['IpedImportPedido', 'IpedImportPedido.IpitImportPedidoItem']]);
                    if ($this->IfilImportFile->save($ifilImportFile)) {
                        $message = 'Saved';
                    } else {
                        $message = json_encode($ifilImportFile->getErrors());
                    }
                }
            } else {
                $message = 'Not files found';
            }
        }

        $this->set([
            'message' => $message,
            'arquivo' => $ifilImportFile,
            '_serialize' => ['arquivo', 'message']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ifil Import File id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $model = $this->request->getHeader('model');

        if (!isset($model[0]) || empty($model)) {
            $this->set([
                'message' => 'Não foi informado o modelo para processar',
                '_serialize' => ['message']
            ]);
        } else {
            if ($model[0] == 'produto') {
                $this->editProduto($id);
            }
    
            if (substr($model[0],0,6) == 'pedido') {
                $this->editPedido($id);
            }
        }
    }

    private function editProduto($id = null)
    {
        $ifilImportFile = $this->IfilImportFile->get($id, [
            'contain' => ['IproImportProduto']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->loadModel('ProdProduto');
            $this->loadModel('FornFornecedor');
            
            foreach ($ifilImportFile->ipro_import_produto as $key => $value) {
                if (empty($value['ipro_status'])) {
                    try {
                        if ($value['ipro_forn_cnpjcpf']) {
                            $fornFornecedor = $this->FornFornecedor->findByFornCnpjcpf($value['ipro_forn_cnpjcpf'])->first();
                            if (!$fornFornecedor) {
                                $fornFornecedor = $this->FornFornecedor->newEntity([
                                    'forn_cnpjcpf' => $value['ipro_forn_cnpjcpf'],
                                    'forn_nome' => $value['ipro_forn_nome']
                                ]);
                                
                                if (!$this->FornFornecedor->save($fornFornecedor)) {
                                    throw new Exception(json_encode($fornFornecedor->getErrors()));
                                }
                            }
                            $ifilImportFile->ipro_import_produto[$key]->ipro_forn_codigo = $fornFornecedor->forn_codigo;
                            $value['ipro_forn_codigo'] = $fornFornecedor->forn_codigo;
                        }

                        $prodProduto = $this->ProdProduto->findByProdCodigoInterno($value['ipro_codigo_interno'])->first();
                        $data = [
                            'prod_forn_codigo' => $value['ipro_forn_codigo'],
                            'prod_codigo_interno' => $value['ipro_codigo_interno'],
                            'prod_codigo_externo' => $value['ipro_codigo_externo'],
                            'prod_descricao' => $value['ipro_descricao'],
                            'prod_valor' => $value['ipro_valor'],
                            'prod_valor_custo' => $value['ipro_valor_custo'],
                            'prod_unidade' => $value['ipro_unidade'],
                            'prod_tamanho' => $value['ipro_tamanho'],
                            'prod_cor' => $value['ipro_cor'],
                            'prod_status' => $value['ipro_status']
                        ];
                        $operation = ($prodProduto ? "2" : "1");
                        if ($prodProduto) {
                            $prodProduto = $this->ProdProduto->patchEntity($prodProduto, $data);
                        } else {
                            $prodProduto = $this->ProdProduto->newEntity($data);
                        }
                        
                        if ($this->ProdProduto->save($prodProduto)) {
                            $ifilImportFile->ipro_import_produto[$key]->ipro_status = $operation;
                            $ifilImportFile->ipro_import_produto[$key]->ipro_imported = date('Y-m-d H:i:s');
                            $ifilImportFile->ipro_import_produto[$key]->ipro_message = null;
                            $ifilImportFile->ipro_import_produto[$key]->ipro_prod_codigo = $prodProduto->prod_codigo;
                        } else {
                            throw new Exception(json_encode($prodProduto->getErrors()));
                        }
                    } catch (Exception $ex) {
                        $ifilImportFile->ipro_import_produto[$key]->ipro_message = $ex->getMessage();
                    }                    
                }                
            }

            $ifilImportFile->ifil_status="P";
            $ifilImportFile->ifil_imported=date('Y-m-d H:i:s');
            $ifilImportFile->setDirty('ipro_import_produto', true);
            $this->IfilImportFile->save($ifilImportFile);
            $message = 'Saved';
        }
        $this->set([
            'message' => $message,
            'arquivo' => $ifilImportFile,
            '_serialize' => ['arquivo', 'message']
        ]);
    }

    private function editPedido($id = null)
    {
        $ifilImportFile = $this->IfilImportFile->get($id, [
            'contain' => ['IpedImportPedido','IpedImportPedido.IpitImportPedidoItem']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->loadModel('ProdProduto');
            $this->loadModel('FornFornecedor');
            $this->loadModel('ClieCliente');
            $this->loadModel('VendVendedor');
            $this->loadModel('PediPedidoCompra');
            $this->loadModel('PediPedidoVenda');
            
            if (empty($ifilImportFile->iped_import_pedido['iped_imported'])) {
                try {
                    if ($ifilImportFile->iped_import_pedido['iped_tipo'] == 'C') {
                        $classPedido = 'PediPedidoCompra';
                        if ($ifilImportFile->iped_import_pedido['iped_forn_cnpjcpf']) {
                            $fornFornecedor = $this->FornFornecedor->findByFornCnpjcpf($ifilImportFile->iped_import_pedido['iped_forn_cnpjcpf'])->first();
                            if (!$fornFornecedor) {
                                $fornFornecedor = $this->FornFornecedor->newEntity([
                                    'forn_cnpjcpf' => $ifilImportFile->iped_import_pedido['iped_forn_cnpjcpf'],
                                    'forn_nome' => $ifilImportFile->iped_import_pedido['iped_forn_nome']
                                ]);
                                
                                if (!$this->FornFornecedor->save($fornFornecedor)) {
                                    throw new Exception(json_encode($fornFornecedor->getErrors()));
                                }
                            }
                            $ifilImportFile->iped_import_pedido['iped_forn_codigo'] = $fornFornecedor->forn_codigo;
                        }
                    }

                    if ($ifilImportFile->iped_import_pedido['iped_tipo'] == 'V') {
                        $classPedido = 'PediPedidoVenda';
                        if ($ifilImportFile->iped_import_pedido['iped_clie_cnpjcpf']) {
                            $clieCliente = $this->ClieCliente->findByClieCnpjcpf($ifilImportFile->iped_import_pedido['iped_clie_cnpjcpf'])->first();
                            if (!$clieCliente) {
                                $clieCliente = $this->ClieCliente->newEntity([
                                    'clie_cnpjcpf' => $ifilImportFile->iped_import_pedido['iped_clie_cnpjcpf'],
                                    'clie_nome' => $ifilImportFile->iped_import_pedido['iped_clie_nome']
                                ]);
                                
                                if (!$this->ClieCliente->save($clieCliente)) {
                                    throw new Exception(json_encode($clieCliente->getErrors()));
                                }
                            }
                            $ifilImportFile->iped_import_pedido['iped_clie_codigo'] = $clieCliente->clie_codigo;
                        }
                    }                        

                    if ($ifilImportFile->iped_import_pedido['iped_vend_cnpjcpf']) {
                        $vendVendedor = $this->VendVendedor->findByVendCnpjcpf($ifilImportFile->iped_import_pedido['iped_vend_cnpjcpf'])->first();
                        if ($vendVendedor) {
                            $ifilImportFile->iped_import_pedido['iped_vend_codigo'] = $vendVendedor->vend_codigo;    
                        }                            
                    }

                    if ($ifilImportFile->iped_import_pedido['iped_vend_cnpjcpf_estoque']) {
                        $vendVendedor = $this->VendVendedor->findByVendCnpjcpf($ifilImportFile->iped_import_pedido['iped_vend_cnpjcpf_estoque'])->first();
                        if ($vendVendedor) {
                            $ifilImportFile->iped_import_pedido['iped_vend_codigo_estoque'] = $vendVendedor->vend_codigo;    
                        }                            
                    }

                    $data = [
                        'pedi_tipo' => $ifilImportFile->iped_import_pedido['iped_tipo'],
                        'pedi_baixado' => $ifilImportFile->iped_import_pedido['iped_baixado'],
                        'pedi_clie_codigo' => $ifilImportFile->iped_import_pedido['iped_clie_codigo'],
                        'pedi_forn_codigo' => $ifilImportFile->iped_import_pedido['iped_forn_codigo'],
                        'pedi_vend_codigo_estoque' => $ifilImportFile->iped_import_pedido['iped_vend_codigo_estoque'],
                        'pedi_vend_codigo' => $ifilImportFile->iped_import_pedido['iped_vend_codigo'],
                        'pite_pedido_item' => [],
                    ];

                    foreach ($ifilImportFile->iped_import_pedido['ipit_import_pedido_item'] as $key_item => $item) {
                        $prodProduto = $this->ProdProduto->findByProdCodigoInterno($item['ipit_prod_codigo_interno'])->first();    

                        if ($prodProduto) {
                            $item['ipit_prod_codigo'] = $prodProduto->prod_codigo;
                            $item['ipit_valor_custo'] = $prodProduto->prod_valor_custo;
                            $item['ipit_valor'] = $prodProduto->prod_valor;
                            $ifilImportFile->iped_import_pedido['ipit_import_pedido_item'][$key_item]['ipit_prod_codigo'] = $prodProduto->prod_codigo;
                            $ifilImportFile->iped_import_pedido['ipit_import_pedido_item'][$key_item]['ipit_imported'] = date('Y-m-d H:i:s');
                        }
                        $data['pite_pedido_item'][] = [
                            'pite_prod_codigo' => $item['ipit_prod_codigo'],
                            'pite_quantidade' => $item['ipit_quantidade'],
                            'pite_valor_custo' => $item['ipit_valor_custo'],
                            'pite_valor' => $item['ipit_valor'],
                            'pite_valor_realizado' => $item['ipit_valor_realizado'],
                        ];
                    }

                    $pediPedido = $this->$classPedido->newEntity($data);
                    
                    if ($this->$classPedido->save($pediPedido)) {
                        $ifilImportFile->iped_import_pedido['iped_status'] = 1;
                        $ifilImportFile->iped_import_pedido['iped_imported'] = date('Y-m-d H:i:s');
                        $ifilImportFile->iped_import_pedido['iped_pedi_codigo'] = $pediPedido->pedi_codigo;
                    } else {
                        throw new Exception(json_encode($pediPedido->getErrors()));
                    }
                    $ifilImportFile->iped_import_pedido->setDirty('ipit_import_pedido_item', true);
                } catch (Exception $ex) {
                    $ifilImportFile->iped_import_pedido['iped_message'] = $ex->getMessage();
                }                    
            }

            $ifilImportFile->ifil_status="P";
            $ifilImportFile->ifil_imported=date('Y-m-d H:i:s');
            $ifilImportFile->setDirty('iped_import_pedido', true);
            $this->IfilImportFile->save($ifilImportFile);
            $message = 'Saved';
        }

        $this->set([
            'message' => $message,
            'arquivo' => $ifilImportFile,
            '_serialize' => ['arquivo', 'message']
        ]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ifil Import File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $message = 'Deleted';
        $ifilImportFile = $this->IfilImportFile->get($id);
        if (!$this->IfilImportFile->delete($ifilImportFile)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}
