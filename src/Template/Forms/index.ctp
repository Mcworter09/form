<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Form
 */
?>
<div class="container bg-primary text-white shadow rounded" style="width:550px;margin:3rem auto">
    <div style="padding:2rem">
        <?= $this->Form->create($form,[
            'class' => 'h-adr'
        ]) ?>
        <span class="p-country-name" style="display:none;">Japan</span>
        <fieldset>
            <legend class="justify-content-center mb-4"><?= __('お問い合わせフォーム') ?></legend>
            <div class="row justify-content-between" style="padding:0 1rem">
                <?= $this->Form->control('last_name',[
                    'label' => '姓',
                    'placeholder' => '例：東京'
                ]) ?>
                <?= $this->Form->control('first_name',[
                    'label' => '名',
                    'placeholder' => '例：太郎'
                ]) ?>
            </div>
            <div class="row justify-content-between" style="padding:0 1rem">
                <?= $this->Form->control('last_name_ruby',[
                    'label' => '姓(ふりがな)',
                    'placeholder' => '例：とうきょう'
                ]) ?>
                <?= $this->Form->control('first_name_ruby',[
                    'label' => '名(ふりがな)',
                    'placeholder' => '例：たろう'
                ]) ?>
            </div>
            <?php
                echo $this->Form->control('email',[
                    'label' => 'メールアドレス',
                    'type' => 'email',
                    'placeholder' => '例：~@example.com'
                ]);
                echo $this->Form->control('company',[
                    'label' => '会社名(任意)',
                    'placeholder' => '例：株式会社東京'
                ]);
                echo $this->Form->control('zip',[
                    'label' => '郵便番号(任意)',
                    'class' => 'p-postal-code',
                    'placeholder' => '例：1234567'
                ]);
                echo $this->Form->control('prefecture',[
                    'label' => '都道府県(任意)',
                    'class' => 'p-region',
                    'placeholder' => '例：東京都'
                ]);
                echo $this->Form->control('city',[
                    'label' => '市区町村(任意)',
                    'class' => 'p-locality ',
                    'placeholder' => '例：葛飾区'
                ]);
                echo $this->Form->control('address',[
                    'label' => '町名番地(任意)',
                    'class' => 'p-street-address',
                    'placeholder' => '例：亀有5丁目36−1'
                ]);
                echo $this->Form->control('building',[
                    'label' => '建物(任意)',
                    'class' => 'p-extended-address',
                    'placeholder' => '例：亀有公園前派出所'
                ]);
                echo $this->Form->control('main',[
                    'label' => 'お問い合わせ内容',
                    'placeholder' => 'ここに内容を入力'
                ]);
            ?>
        </fieldset>
        <?= $this->Form->button('送信',[
            'type' => 'submit',
            'class' => 'bg-primary text-white border w-100 mt-2 mb-2'
        ]) ?>
        <?= $this->Form->end() ?>
    </div>
</div>