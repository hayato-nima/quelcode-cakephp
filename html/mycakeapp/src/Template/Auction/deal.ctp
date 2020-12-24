<h2>発送受取連絡</h2>

<?php //落札者
if (($authuser['id'] === $bidinfo['user_id'])) :
?>
  <?php
  $isSentOff = ($dealing['is_sent'] === false); //発送フラグ OFF
  $isSentOn = ($dealing['is_sent'] === true); //発送フラグ ON
  $isReceivedOff = ($dealing['is_received'] === false); //受取フラグ OFF
  $isReceivedOn = ($dealing['is_received'] === true); //受取フラグ ON
  ?>

  <?php //画面３ 入力後フォーム
  $isDealSettled = ((isset($dealing['address'])) && (isset($dealing['delivery_name'])) && (isset($dealing['phone_number']))); //発送先情報の確認
  if ($isDealSettled && $isSentOff) : //発送先情報 確定｜発送フラグ OFF
  ?>
    <fieldset>
      <legend>発送先情報（確定済）</legend>
      <?php
      echo '<p><strong>ITEM: ' . $biditems['name'] . '</strong></p>';
      echo "<p>発送先住所: " . h($dealing['address']) . '</p>';
      echo "<p>お届け先名称: " . h($dealing['delivery_name']) . '</p>';
      echo "<p>電話番号: " . $dealing['phone_number'] . '</p>';
      ?>
    </fieldset>
  <?php //画面５
  elseif ($isDealSettled && $isSentOn) : //発送先情報 確定｜発送フラグ ON
  ?>
    <fieldset>
      <legend>発送先情報（確定済）</legend>
      <?php
      echo '<p><strong>ITEM: ' . $biditems['name'] . '</strong></p>';
      echo "<p>発送先住所: " . h($dealing['address']) . '</p>';
      echo "<p>お届け先名称: " . h($dealing['delivery_name']) . '</p>';
      echo "<p>電話番号: " . $dealing['phone_number'] . '</p>';
      ?>
    </fieldset>
  <?php
  elseif (is_null($dealing['address']) or isset($dealing)) : //フォームの表示 発送情報未確定
  ?>
    <?= $this->Form->create(
      $dealing,
      ['url' => ['controller' => 'Auction', 'action' => 'deal', $bidinfo['id']]]
    ) ?>
    <fieldset>
      <legend>発送先情報連絡</legend>
      <?php
      echo '<p><strong>ITEM: ' . $biditems['name'] . '</strong></p>';
      echo $this->Form->control('address', ['label' => '発送先住所']);
      echo $this->Form->control('delivery_name', ['label' => 'お届け先名称']);
      echo $this->Form->control('phone_number', ['label' => '電話番号']);
      echo '<p><strong>※全て入力終了後、確定ボタンを押してください</strong></p>';
      ?>
      <?= $this->Form->button(__('確定')) ?>
      <?= $this->Form->end() ?>
    </fieldset>
  <?php
  endif;
  ?>

  <?php //画面３ 商品発送ボタン
  if ($isDealSettled && $isSentOff) : //発送先情報 確定｜発送フラグ OFF
  ?>
    <fieldset>
      <legend>発送連絡</legend>
      <?php
      echo '<p><strong>' . '商品はまだ発送されていません。' . '</strong></p>';
      ?>
    </fieldset>
  <?php
  endif; //画面３ 商品発送ボタン〆
  ?>
  <?php //画面５ 商品発送ボタン
  if ($isDealSettled && $isSentOn && $isReceivedOff) : //発送先情報 確定｜発送フラグ ON｜受取フラグ OFF
  ?>
    <fieldset>
      <legend>発送連絡</legend>
      <?php
      echo '<p><strong>' . '商品が発送されました。到着までお待ちください。' . '</strong></p>';
      ?>
    </fieldset>
  <?php endif; ?>
  <?php
  if ($isDealSettled && $isSentOn && $isReceivedOff) : //発送先情報 確定｜発送フラグ ON｜受取フラグ OFF
  ?>
    <fieldset>
      <legend>受取連絡</legend>
      <? echo '<p><strong>※受け取りが完了したら下のボタンを押してください</strong></p>';?>
      <?= $this->Form->create($dealing) //dealings,is_receivedのフォーム
      ?>
      <?= $this->Form->button(__('受け取りました')) ?>
      <?= $this->Form->end() ?>
    </fieldset>
  <?php
  endif; //画面５ 商品発送ボタン〆
  ?>

  <?php //画面７
  if ($isDealSettled && ($dealing['is_received'] === true)) : //発送先情報 確定｜受取フラグ ON
  ?>
    <fieldset>
      <legend>発送連絡</legend>
      <?php
      echo '<p><strong>' . '商品が発送されました。' . '</strong></p>';
      ?>
    </fieldset>
  <?php endif; ?>
  <?php
  if ($isDealSettled && ($dealing['is_received'] === true)) : //発送先情報 確定｜受取フラグ ON
  ?>
    <fieldset>
      <legend>受取連絡</legend>
      <?php
      echo '<p><strong>' . '商品を受取通知済' . '</strong></p>';
      ?>
    </fieldset>
  <?php
  endif; //画面７ココマデ
  ?>

<?php endif; //落札者〆
?>

<?php //出品者
if (($authuser['id'] === $biditems['user_id'])) :
?>

  <?php
  $isSentOff = ($dealing['is_sent'] === false); //発送フラグ OFF
  $isSentOn = ($dealing['is_sent'] === true); //発送フラグ ON
  $isReceivedOff = ($dealing['is_received'] === false); //受取フラグ OFF
  $isReceivedOn = ($dealing['is_received'] === true); //受取フラグ ON
  ?>

  <?php //画面2
  if ((is_null($dealing['address']))) : //発送先情報未確定
  ?>
    <fieldset>
      <legend>発送先情報連絡</legend>
      <?php
      echo '<p><strong>ITEM: ' . $biditems['name'] . '</strong></p>';
      echo '発送者の発送先情報の連絡を待っています。';
      ?>
    </fieldset>
  <?php
  endif; //画面２ココマデ
  ?>

  <?php //画面４ 画面６
  $isDealSettledBylisting = ($dealing['address']) && ($dealing['delivery_name']) && ($dealing['phone_number']);
  if ($isDealSettledBylisting) : //発送先情報確定済
  ?>
    <fieldset>
      <legend>発送先情報（確定済）</legend>
      <?php
      echo '<p><strong>ITEM: ' . $biditems['name'] . '</strong></p>';
      echo "<p>発送先住所: " . h($dealing['address']) . '</p>';
      echo "<p>お届け先名称: " . h($dealing['delivery_name']) . '</p>';
      echo "<p>電話番号: " . $dealing['phone_number'] . '</p>';
      ?>
    </fieldset>
  <?php
  endif;
  ?>
  <?php
  if ($isDealSettledBylisting && $isSentOff) : //発送先情報確定済 未発送
  ?>
    <fieldset>
      <legend>発送連絡</legend>
      <? echo '<p><strong>※発送が完了したら下のボタンを押してください</strong></p>';?>
      <?= $this->Form->create($dealing) //dealings,is_sentのフォーム
      ?>
      <?= $this->Form->button(__('発送しました')) ?>
      <?= $this->Form->end() ?>
    </fieldset>
  <?php
  endif; //画面４ココマデ
  ?>

  <?php //画面６
  if ($isDealSettledBylisting && $isSentOn) : //発送先情報 確定｜発送フラグ ON
  ?>
    <fieldset>
      <?= $this->Form->create($dealing) //dealings,is_sentのフォーム
      ?>
      <legend>発送連絡</legend>
      <?php
      echo '<p><strong>' . '発送しました。' . '</strong></p>';
      ?>
    </fieldset>
  <?php
  endif; //画面６ココマデ
  ?>
  <?php //画面８ 出品者
  if ($isDealSettledBylisting && $isSentOn && $isReceivedOn) : //発送フラグ、受け取りフラグが両方ONのとき、表示する
  ?>
    <fieldset>
      <legend>受取連絡</legend>
      <?php
      echo '<p><strong>' . '落札者が商品を受け取りました。' . '</strong></p>';
      ?>
    </fieldset>
  <?php
  endif; //画面８ココマデ
  ?>

<?php
endif; //出品者〆
?>
