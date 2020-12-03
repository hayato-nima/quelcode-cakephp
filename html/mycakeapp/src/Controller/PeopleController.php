<?php

namespace App\Controller;

use App\Controller\AppController;
// use phpDocumentor\Reflection\Types\This;

class PeopleController extends AppController
{
  public function index() {
    if ($this->request->is('post')){
      $find = $this->request->data['People']['find'];
      $data = $this->People->find('me', ['me'=>$find])
        ->contain(['Messages']);
    } else {
      $data = $this->People->find('byAge')
        ->contain(['Messages']);
    }
    $this->set('data', $data);
  }
  
  public function add()
  {
    $msg = 'please type your personal data...';
    $entity = $this->People->newEntity();
    if ($this->request->is('post')) {
      //POST送信時の処理
      $data = $this->request->data['People'];
      $entity = $this->People->newEntity($data);
      if ($this->People->save($entity)) {
        //保存できた時の処理
        return $this->redirect(['action' => 'index']);
      }
      $msg = 'Error was occured...';
    }
    $this->set('msg', $msg);
    $this->set('entity', $entity);
  }
  //saveメソッドはエンティティがデータベースにレコードとして無事に保管できたらtrue、できなかったらfalseを返すようになっている｜無事に保存できたら、indexにリダイレクトされる

  public function create()
  {
    if ($this->request->is('post')) {
      $data = $this->request->data['People'];
      $entity = $this->People->newEntity($data);
      $this->People->save($entity); // newEntityで作成したインスタンスをデータベースの保存する
    }
    return $this->redirect(['action' => 'index']);
    //return $this->redirect(['action'=>'アクション'])
    //アクションの部分に移動させたいアクション名をいれる
  }

  public function edit()
  {
    $id = $this->request->query['id']; //値を取得
    $entity = $this->People->get($id); //エンティティを取り出す
    $this->set('entity', $entity); //entityという名前でエンティティを設定している
  }

  public function update()
  {
    if ($this->request->is('post')) {
      $data =  $this->request->data['People']; //送られてきたフォームの値を取り出す｜フォームの値はdata['People']にまとめられている
      $entity = $this->People->get($data['id']); //getを使いエンティティを取り出す
      $this->People->patchEntity($entity, $data); //$entity(エンティティ)を$data(値)で更新
      $this->People->save($entity); //エンティティを保存
    }
    return $this->redirect(['action' => 'index']);
  }





  public function delete()
  {
    $id = $this->request->query['id']; //値を取得
    $entity = $this->People->get($id); //エンティティを取り出す
    $this->set('entity', $entity); //entityという名前でエンティティを設定している
  }

  public function destroy()
  {
    if ($this->request->is('post')) {
      $data =  $this->request->data['People']; //送られてきたフォームの値を取り出す｜フォームの値はdata['People']にまとめられている
      $entity = $this->People->get($data['id']); //getを使いidのエンティティを取り出す
      $this->People->delete($entity); //delete(引数)|引数に指定したエンティティを削除する
    }
    return $this->redirect(['action' => 'index']);
  }
}
