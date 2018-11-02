<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;

/**
 * Forms Controller
 *
 * @property \App\Model\Table\FormsTable $Forms
 *
 * @method \App\Model\Entity\Form[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FormsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    //フォーム本体
    public function index()
    {
        $form = $this->Forms->newEntity();
        if ($this->request->is('post')) {
            $form = $this->Forms->patchEntity($form, $this->request->getData());
            if ($this->Forms->save($form)) {
                $this->Flash->success(__('送信に成功しました'));
                return $this->redirect(['action' => 'list']);
            }
            $this->Flash->error(__('送信に失敗しました'));
        }
        $this->set(compact('form'));
    }

    /**
     * View method
     *
     * @param string|null $id Form id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $form = $this->Forms->get($id, [
            'contain' => []
        ]);
        $this->set('form', $form);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */

    //表示確認用
    public function list()
    {
        $forms = $this->paginate($this->Forms);
        $this->set(compact('forms'));
    }

    //メールのテスト
    public function mail()
    {
        $email = new Email('default');
        $email
        ->setTransport('default')
        ->setFrom(['me@example.com' => 'My Site'])
        ->setTo('you@example.com')
        ->setSubject('てすと')
        ->send('test message');
    }
}
