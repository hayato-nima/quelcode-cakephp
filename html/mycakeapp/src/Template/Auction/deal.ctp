<h2>発送受取連絡</h2>
<?php //落札者
if (($authuser['id'] === $bidinfo['user_id'])) :
?>
  <?php //画面３落札者 入力後フォーム
  if ((isset($dealing['address'])) && (isset($dealing['delivery_name'])) && (isset($dealing['phone_number'])) && ($dealing['is_sent'] === false)) :
  ?>
    <fieldset>
      <legend>発送先情報（確定済）</legend>
      <?php
      echo '<p><strong>ITEM: ' . $biditems['name'] . '</strong></p>';
      echo "<p>発送先住所: " . $dealing['address'] . '</p>';
      echo "<p>お届け先名称: " . $dealing['delivery_name'] . '</p>';
      echo "<p>電話番号: " . $dealing['phone_number'] . '</p>';
      ?>
    </fieldset>
  <?php
  elseif(is_null($dealing['address']) or isset($dealing)):
  ?>
  <?= $this->Form->create($dealing)?>
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




<?php endif; //落札者〆
?>


<?php //出品者
if (($authuser['id'] === $biditems['user_id'])) :
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

<?php
endif; //出品者〆
?>
