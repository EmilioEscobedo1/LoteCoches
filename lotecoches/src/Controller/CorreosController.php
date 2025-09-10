<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Correos Controller
 *
 * @property \App\Model\Table\CorreosTable $Correos
 */
class CorreosController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('default');
    }
    public function index()
    {
        $query = $this->Correos->find();
        $correos = $this->paginate($query);

        $this->set(compact('correos'));
    }

    /**
     * View method
     *
     * @param string|null $id Correo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $correo = $this->Correos->get($id, contain: []);
        $this->set(compact('correo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $correo = $this->Correos->newEmptyEntity();
        if ($this->request->is('post')) {
            $correo = $this->Correos->patchEntity($correo, $this->request->getData());
            if ($this->Correos->save($correo)) {
                $this->Flash->success(__('The correo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The correo could not be saved. Please, try again.'));
        }
        $this->set(compact('correo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Correo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $correo = $this->Correos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $correo = $this->Correos->patchEntity($correo, $this->request->getData());
            if ($this->Correos->save($correo)) {
                $this->Flash->success(__('The correo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The correo could not be saved. Please, try again.'));
        }
        $this->set(compact('correo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Correo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $correo = $this->Correos->get($id);
        if ($this->Correos->delete($correo)) {
            $this->Flash->success(__('The correo has been deleted.'));
        } else {
            $this->Flash->error(__('The correo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
