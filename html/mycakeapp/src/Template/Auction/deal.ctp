<h2>発送受取連絡</h2>
<?php //画面１落札者
if (($authuser['id'] === $bidinfo['user_id']) && (is_null($dealing['address'])) && (is_null($dealing['delivery_name'])) && (is_null($dealing['phone_number']))) :
?>
  <?= $this->Form->create($dealing) //dealingsのためのフォーム
  ?>
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
endif; //画面１ココマデ
?>

<?php //画面2出品者
if (($authuser['id'] === $biditems['user_id']) && (is_null($dealing['address'])) && (is_null($dealing['delivery_name'])) && (is_null($dealing['phone_number']))) :
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

<?php //画面３落札者
if (($authuser['id'] === $bidinfo['user_id']) && (isset($dealing['address'])) && (isset($dealing['delivery_name'])) && (isset($dealing['phone_number'])) && ($dealing['is_sent'] === false)) :
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
endif;
?>
<?php
if (($authuser['id'] === $bidinfo['user_id']) && ($dealing['address']) && ($dealing['delivery_name']) && ($dealing['phone_number']) && ($dealing['is_sent'] === false)) :
?>
  <fieldset>
    <legend>発送連絡</legend>
    <?php
    echo '<p><strong>' . '商品はまだ発送されていません。' . '</strong></p>';
    ?>
  </fieldset>
<?php
endif; //画面３ココマデ
?>

<?php //画面４出品者
if (($authuser['id'] === $biditems['user_id']) && ($dealing['address']) && ($dealing['delivery_name']) && ($dealing['phone_number']) && ($dealing['is_sent'] === false)) : //出品者で$dealingに値がある
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
endif;
?>
<?php
if (($authuser['id'] === $biditems['user_id']) && ($dealing['address']) && ($dealing['delivery_name']) && ($dealing['phone_number']) && ($dealing['is_sent'] === false)) : //出品者で$dealingに値がある
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

<?php //画面５落札者
if (($authuser['id'] === $bidinfo['user_id']) && ($dealing['address']) && ($dealing['delivery_name']) && ($dealing['phone_number']) && ($dealing['is_sent'] === true) && ($dealing['is_received'] === false)) :
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
endif;
?>
<?php
if (($authuser['id'] === $bidinfo['user_id']) && ($dealing['address']) && ($dealing['delivery_name']) && ($dealing['phone_number']) && ($dealing['is_sent'] === true) && ($dealing['is_received'] === false)) :
?>
  <fieldset>
    <legend>発送連絡</legend>
    <?php
    echo '<p><strong>' . '商品が発送されました。到着までお待ちください。' . '</strong></p>';
    ?>
  </fieldset>
<?php endif; ?>
<?php
if (($authuser['id'] === $bidinfo['user_id']) && ($dealing['address']) && ($dealing['delivery_name']) && ($dealing['phone_number']) && ($dealing['is_sent'] === true) && ($dealing['is_received'] === false)) :
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
endif; //画面５ココマデ
?>

<?php //画面６出品者
if (($authuser['id'] === $biditems['user_id']) && ($dealing['address']) && ($dealing['delivery_name']) && ($dealing['phone_number']) && ($dealing['is_sent'] === true)) :
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
endif;
?>
<?php
if (($authuser['id'] === $biditems['user_id']) && ($dealing['address']) && ($dealing['delivery_name']) && ($dealing['phone_number']) && ($dealing['is_sent'] === true)) :
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

<?php //画面７落札者
if (($authuser['id'] === $bidinfo['user_id']) && ($dealing['address']) && ($dealing['delivery_name']) && ($dealing['phone_number']) && ($dealing['is_received'] === true)) :
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
endif;
?>
<?php
if (($authuser['id'] === $bidinfo['user_id']) && ($dealing['address']) && ($dealing['delivery_name']) && ($dealing['phone_number']) && ($dealing['is_received'] === true)) :
?>
  <fieldset>
    <legend>発送連絡</legend>
    <?php
    echo '<p><strong>' . '商品が発送されました。' . '</strong></p>';
    ?>
  </fieldset>
<?php endif; ?>
<?php
if (($authuser['id'] === $bidinfo['user_id']) && ($dealing['address']) && ($dealing['delivery_name']) && ($dealing['phone_number']) && ($dealing['is_received'] === true)) :
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

<?php //画面８ 出品者
if (($authuser['id'] === $biditems['user_id']) && ($dealing['address']) && ($dealing['delivery_name']) && ($dealing['phone_number']) && ($dealing['is_sent'] === true) && ($dealing['is_received'] === true)) :
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
