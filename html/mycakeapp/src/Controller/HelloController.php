<?php
// コントローラーの基本形
namespace App\Controller;

use App\Controller\AppController;

class HelloController extends AppController {
	public function initialize()
	// initializeメソッドはコントローラーの初期化処理をしておくためのもの
	{
		$this->viewBuilder()->setLayout('hello');
	}
	// viewBuilderで返されるオブジェクトの中にあるsetLayoutメソッドを呼び出す｜引数には利用するレイアウト名を指定、拡張子は不要
	public function index() {
		$this->set('header', ['subtitle'=>'from Controller with unnko']);
		$this->set('footer', ['copyright'=>'名無しの権兵衛']);
	}
}

