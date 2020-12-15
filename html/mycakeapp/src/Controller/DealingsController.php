<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Dealings Controller
 *
 * @property \App\Model\Table\DealingsTable $Dealings
 *
 * @method \App\Model\Entity\Dealing[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DealingsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Bidinfos'],
        ];
        $dealings = $this->paginate($this->Dealings);

        $this->set(compact('dealings'));
    }

    /**
     * View method
     *
     * @param string|null $id Dealing id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dealing = $this->Dealings->get($id, [
            'contain' => ['Bidinfos'],
        ]);

        $this->set('dealing', $dealing);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dealing = $this->Dealings->newEntity();
        if ($this->request->is('post')) {
            $dealing = $this->Dealings->patchEntity($dealing, $this->request->getData());
            if ($this->Dealings->save($dealing)) {
                $this->Flash->success(__('The dealing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dealing could not be saved. Please, try again.'));
        }
        $bidinfos = $this->Dealings->Bidinfos->find('list', ['limit' => 200]);
        $this->set(compact('dealing', 'bidinfos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dealing id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dealing = $this->Dealings->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dealing = $this->Dealings->patchEntity($dealing, $this->request->getData());
            if ($this->Dealings->save($dealing)) {
                $this->Flash->success(__('The dealing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dealing could not be saved. Please, try again.'));
        }
        $bidinfos = $this->Dealings->Bidinfos->find('list', ['limit' => 200]);
        $this->set(compact('dealing', 'bidinfos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dealing id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dealing = $this->Dealings->get($id);
        if ($this->Dealings->delete($dealing)) {
            $this->Flash->success(__('The dealing has been deleted.'));
        } else {
            $this->Flash->error(__('The dealing could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
