<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Titles Controller
 *
 * @property \App\Model\Table\TitlesTable $Titles
 *
 * @method \App\Model\Entity\Title[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TitlesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $titles = $this->paginate($this->Titles);

        $this->set(compact('titles'));
    }

    /**
     * View method
     *
     * @param string|null $id Title id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null,$title = null,$from_date = null)
    {
        $title = $this->Titles->get([$id,$title,$from_date]);

        $this->set('title', $title);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $title = $this->Titles->newEntity();
        if ($this->request->is('post')) {
            $title = $this->Titles->patchEntity($title, $this->request->getData());
            if ($this->Titles->save($title)) {
                $this->Flash->success(__('The title has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The title could not be saved. Please, try again.'));
        }
        $this->set(compact('title'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Title id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null, $title = null, $from_date = null)
    {
        $title = $this->Titles->get([$id, $title,$from_date]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $newTitle = $this->Titles->newEntity();
            $this->Titles->delete($title);

            $newTitle = $this->Titles->patchEntity($newTitle, $this->request->getData());
            if ($this->Titles->save($newTitle)) {
                $this->Flash->success(__('The title has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The title could not be saved. Please, try again.'));
        }
        $this->set(compact('title'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Title id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $title=null, $from_date=null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $title = $this->Titles->get([$id, $title,$from_date]);
        if ($this->Titles->delete($title)) {
            $this->Flash->success(__('The title has been deleted.'));
        } else {
            $this->Flash->error(__('The title could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
