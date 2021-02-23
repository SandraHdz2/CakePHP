<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Salaries Controller
 *
 * @property \App\Model\Table\SalariesTable $Salaries
 *
 * @method \App\Model\Entity\Salary[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SalariesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $salaries = $this->paginate($this->Salaries);

        $this->set(compact('salaries'));
    }

    /**
     * View method
     *
     * @param string|null $id Salary id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null,$from_date=null)
    {
        $salary = $this->Salaries->get([$id, $from_date]);

        $this->set('salary', $salary);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $salary = $this->Salaries->newEntity();
        if ($this->request->is('post')) {
            $salary = $this->Salaries->patchEntity($salary, $this->request->getData());
            if ($this->Salaries->save($salary)) {
                $this->Flash->success(__('The salary has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The salary could not be saved. Please, try again.'));
        }
        $this->set(compact('salary'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Salary id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null,$from_date=null)
    {
        $salary = $this->Salaries->get([$id, $from_date]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $salary = $this->Salaries->patchEntity($salary, $this->request->getData());
            if ($this->Salaries->save($salary)) {
                $this->Flash->success(__('The salary has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The salary could not be saved. Please, try again.'));
        }
        $this->set(compact('salary'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Salary id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null,$from_date=null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $salary = $this->Salaries->get([$id = null,$from_date=null]);
        if ($this->Salaries->delete($salary)) {
            $this->Flash->success(__('The salary has been deleted.'));
        } else {
            $this->Flash->error(__('The salary could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
