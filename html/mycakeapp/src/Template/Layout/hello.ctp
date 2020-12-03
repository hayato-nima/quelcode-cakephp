<!DOCTYPE html>
<html lang="en">
<head>
  <?=$this->Html->charset() ?><!-- キャラクタセットを指定するためのもの|<meta charset="utf-8"/>タグを生成する -->
  <title><?=$this->fetch('title') ?></title><!-- ページのタイトルを設定するメソッド<title>タグによるページのタイトル用タグを出力 -->
  <?=$this->Html->css('hello') ?><!-- <link>タグを生成|引数にファイル名を記述｜拡張子は不要｜ファイルパスも自動設定される -->
  <?=$this->Html->script('hello') ?><!-- <script>タグを生成|引数にファイル名を記述｜拡張子は不要｜ファイルパスも自動設定される -->
</head>
<body>
  <header class="head row"><!-- 共通のスタイルを設定するためにrowクラスを用意している -->
  <?=$this->element('header',$header)?>
  <!-- elementの読み込み element(パス , [連想配列]) パスはElementフォルダ内の相対パスになる｜ファイル名の拡張子は不要-->
  </header>
  <div class="content row">
  <?=$this->fetch('content') ?><!-- fetch('content')ページのコンテンツを取り出す -->
  </div>
  <footer class="foot row">
  <?=$this->element('footer',$footer)?>
  </footer>
</body>
</html>
