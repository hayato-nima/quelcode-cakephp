<h2>発送受取連絡</h2>
<?php //画面１
if (($authuser['id'] === $bidinfo['user_id']) && ($dealing['address'] === null) && ($dealing['delivery_name'] === null) && ($dealing['phone_number'] === null)):
?>
  <?= $this->Form->create($dealing) //dealingsのためのフォーム
  ?>
  <fieldset>
    <legend>発送先情報連絡</legend>
    <?php
    echo '<p><strong>ITEM: ' . $biditems['name'] . '</strong></p>';
    echo $this->Form->control('address');
    echo $this->Form->control('delivery_name');
    echo $this->Form->control('phone_number');
    echo $this->Form->hidden('is_sent', ['value' => 0]);
    echo $this->Form->hidden('is_received', ['value' => 0]);
    ?>
    <?= $this->Form->button(__('確定')) ?>
    <?= $this->Form->end() ?>
  </fieldset>
<?php
endif;
?>

<?php //画面2
if (($authuser['id'] === $biditems['user_id']) && ($dealing['address'] === null) && ($dealing['delivery_name'] === null) && ($dealing['phone_number'] === null)):
?>
  <fieldset>
    <legend>発送先情報連絡</legend>
    <?php
    echo '<p><strong>ITEM: ' . $biditems['name'] . '</strong></p>';
    echo '発送者の発送先情報の連絡を待っています。';
    ?>
  </fieldset>
<?php
endif;
?>


<?php if (($authuser['id'] === $biditems['user_id'])) : ?><!-- 条件未設定です -->
  <!-- <fieldset>
    <?= $this->Form->create($dealing) //dealings,is_sentのフォーム
    ?>
    <legend>発送連絡</legend>
    <?php
    echo $this->Form->hidden('is_sent', ['value' => 1]);
    ?>
    <?= $this->Form->button(__('発送しました')) ?>
    <?= $this->Form->end() ?>
  </fieldset> -->
<?php endif; ?>

<?php if (($authuser['id'] === $biditems['user_id'])) : ?><!-- 条件未設定です -->
  <!-- <fieldset>
    <?= $this->Form->create($dealing) //dealings,is_receivedのフォーム
    ?>
    <legend>受取連絡</legend>
    <?php
    echo $this->Form->hidden('is_received', ['value' => 1]);
    ?>
    <?= $this->Form->button(__('受け取りました')) ?>
    <?= $this->Form->end() ?>
  </fieldset> -->
<?php endif; ?>
