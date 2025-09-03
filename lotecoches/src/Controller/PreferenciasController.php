<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Preferencias Controller
 *
 * @property \App\Model\Table\PreferenciasTable $Preferencias
 */
class PreferenciasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Preferencias->find();
        $preferencias = $this->paginate($query);

        $this->set(compact('preferencias'));
    }

    /**
     * View method
     *
     * @param string|null $id Preferencia id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $preferencia = $this->Preferencias->get($id, contain: []);
        $this->set(compact('preferencia'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $preferencia = $this->Preferencias->newEmptyEntity();
        if ($this->request->is('post')) {
            $preferencia = $this->Preferencias->patchEntity($preferencia, $this->request->getData());
            if ($this->Preferencias->save($preferencia)) {
                $this->Flash->success(__('The preferencia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The preferencia could not be saved. Please, try again.'));
        }
        $this->set(compact('preferencia'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Preferencia id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $preferencia = $this->Preferencias->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $preferencia = $this->Preferencias->patchEntity($preferencia, $this->request->getData());
            if ($this->Preferencias->save($preferencia)) {
                $this->Flash->success(__('The preferencia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The preferencia could not be saved. Please, try again.'));
        }
        $this->set(compact('preferencia'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Preferencia id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $preferencia = $this->Preferencias->get($id);
        if ($this->Preferencias->delete($preferencia)) {
            $this->Flash->success(__('The preferencia has been deleted.'));
        } else {
            $this->Flash->error(__('The preferencia could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
