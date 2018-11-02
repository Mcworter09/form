<div class="container text-white" style="width:800px;margin-top:3rem">

        <?php foreach ($forms as $form): ?>
        <div class="p-5 mt-5 mb-5 bg-primary rounded shadow">
            <p>お問い合わせナンバー：<?= $this->Number->format($form->id) ?></p>
            <p>送信日時：<?= h($form->created) ?></p>
            <p>姓：<?= h($form->last_name) ?></p>
            <p>名：<?= h($form->first_name) ?></p>
            <p>姓(ふりがな)：<?= h($form->last_name_ruby) ?></p>
            <p>名(ふりがな)：<?= h($form->first_name_ruby) ?></p>
            <p>メールアドレス：<?= h($form->email) ?></p>
            <p>会社名：<?= h($form->company) ?></p>
            <p>郵便番号：<?= h($form->zip) ?></p>
            <p>都道府県：<?= h($form->prefecture) ?></p>
            <p>市区町村：<?= h($form->city) ?></p>
            <p>町名番地：<?= h($form->address) ?></p>
            <p>建物：<?= h($form->building) ?></p>
            <p>本文：<?= h($form->main) ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</div>
