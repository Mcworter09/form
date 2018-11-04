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
            $email = new Email('default');
            $form = $this->Forms->patchEntity($form, $this->request->getData());

            $mail = $this->request->getData();

            $sendMain = $mail['last_name']."様からお問い合わせがありました\n";
            $sendMain .= "\n";
            $sendMain .= "【お客様情報】\n";
            $sendMain .="ｰｰｰｰｰｰｰｰｰｰｰｰｰｰｰｰーーｰｰｰｰｰｰｰｰｰｰｰｰｰｰｰ\n";
            $sendMain .= "■お名前：" . $mail['last_name'] . " " .$mail['first_name'] . "\n";
            $sendMain .= "\n";
            $sendMain .= "■ふりがな：" . $mail['last_name_ruby'] . " " . $mail['first_name_ruby'] . "\n";
            $sendMain .= "\n";
            $sendMain .= "■メールアドレス：" . $mail['email'] . "\n";
            $sendMain .= "\n";
            $sendMain .= "■会社名：" . $mail['company'] . "\n";
            $sendMain .= "\n";
            $sendMain .= "■郵便番号：" . $mail['zip'] . "\n";
            $sendMain .= "\n";
            $sendMain .= "■都道府県：" . $mail['prefecture'] . "\n";
            $sendMain .= "\n";
            $sendMain .= "■市区町村：" . $mail['city'] . "\n";
            $sendMain .= "\n";
            $sendMain .= "■町名番地：" . $mail['address'] . "\n";
            $sendMain .= "\n";
            $sendMain .= "■建物：" . $mail['building'] . "\n";
            $sendMain .= "\n";
            $sendMain .= "■お問い合わせ内容\n";
            $sendMain .= "\n";
            $sendMain .= $mail['main'] . "\n";
            $sendMain .= "\n";
            $sendMain .= "ｰｰｰｰｰｰｰｰｰｰｰｰｰｰｰｰーーｰｰｰｰｰｰｰｰｰｰｰｰｰｰｰ\n";

            $sendReturn = "こちらは自動返信メールになっております。\n";
            $sendReturn .= "\n";
            $sendReturn .= $mail['last_name']."様\n";
            $sendReturn .= "\n";
            $sendReturn .= "この度はお問い合わせ頂きありがとうございます。\n";
            $sendReturn .= "\n";
            $sendReturn .= "確認次第ご連絡いたしますので、少々お待ちください。\n";
            $sendReturn .= "ｰｰｰｰｰｰｰｰｰｰｰｰｰｰｰｰーーｰｰｰｰｰｰｰｰｰｰｰｰｰｰｰ\n";
            $sendReturn .= "【株式会社～東京】\n";
            $sendReturn .= "〒000-0000\n";
            $sendReturn .= "東京都葛飾区亀有公園前派出所\n";
            $sendReturn .= "電話番号：000-000-0000\n";
            $sendReturn .= "メールアドレス：test@test.com\n";
            $sendReturn .= "ｰｰｰｰｰｰｰｰｰｰｰｰｰｰｰｰーーｰｰｰｰｰｰｰｰｰｰｰｰｰｰ\n";


            if($email
            ->setTransport('default')
            ->setFrom(['dev@o-en-dev.net'])
            ->setTo('asriel6666@gmail.com')
            ->setSubject('お問い合わせ内容')
            ->send($sendMain)
            &&
            $email
            ->setTransport('default')
            ->setFrom(['dev@o-en-dev.net'])
            ->setTo('asriel6666@gmail.com')
            ->setSubject('お問い合わせ頂きましてありがとうございます。')
            ->send($sendReturn)
            &&
            $this->Forms->save($form)){
                $this->Flash->success(__('送信に成功しました'));
                return $this->redirect(['action' => 'list']);
            }
        $this->Flash->error(__('送信に失敗しました'));
        return $this->redirect(['action' => 'index']);
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
}
