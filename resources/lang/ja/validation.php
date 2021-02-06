<?php  // resources/lang/ja/validation.php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => '承認してください。',
    'active_url'           => '正しいURLではありません。',
    'after'                => '出勤時刻以降の日付にしてください。',
    'alpha'                => '英字のみにしてください。',
    'alpha_dash'           => '英数字とハイフンのみにしてください。',
    'alpha_num'            => '英数字のみにしてください。',
    'array'                => '配列にしてください。',
    'before'               => ':date以前の日付にしてください。',
    'between'              => [
        'numeric' => ':min〜:maxまでにしてください。',
        'file'    => ':min〜:max KBまでのファイルにしてください。',
        'string'  => ':min〜:max文字にしてください。',
        'array'   => ':min〜:max個までにしてください。',
    ],
    'boolean'              => 'trueかfalseにしてください。',
    'confirmed'            => '確認用項目と一致していません。',
    'date'                 => '正しい日付ではありません。',
    'date_format'          => '":format"書式と一致していません。',
    'different'            => ':otherと違うものにしてください。',
    'digits'               => ':digits桁にしてください',
    'digits_between'       => ':min〜:max桁にしてください。',
    'email'                => '正しいメールアドレスにしてください。',
    'filled'               => '必須です。',
    'exists'               => '選択された正しくありません。',
    'image'                => '画像にしてください。',
    'in'                   => '選択された正しくありません。',
    'integer'              => '整数にしてください。',
    'ip'                   => '正しいIPアドレスにしてください。',
    'max'                  => [
        'numeric' => ':max以下にしてください。',
        'file'    => ':max KB以下のファイルにしてください。.',
        'string'  => ':max文字以下にしてください。',
        'array'   => ':max個以下にしてください。',
    ],
    'mimes'                => ':valuesタイプのファイルにしてください。',
    'min'                  => [
        'numeric' => ':min以上にしてください。',
        'file'    => ':min KB以上のファイルにしてください。.',
        'string'  => ':min文字以上にしてください。',
        'array'   => ':min個以上にしてください。',
    ],
    'not_in'               => '選択された正しくありません。',
    'numeric'              => '数字にしてください。',
    'regex'                => '書式が正しくありません。',
    'required'             => '必須です。',
    'required_if'          => ':otherが:valueの時、必須です。',
    'required_with'        => ':valuesが存在する時、必須です。',
    'required_with_all'    => ':valuesが存在する時、必須です。',
    'required_without'     => ':valuesが存在しない時、必須です。',
    'required_without_all' => ':valuesが存在しない時、必須です。',
    'same'                 => ':otherは一致していません。',
    'size'                 => [
        'numeric' => ':sizeにしてください。',
        'file'    => ':size KBにしてください。.',
        'string'  => 'size文字にしてください。',
        'array'   => ':size個にしてください。',
    ],
    'string'               => '文字列にしてください。',
    'timezone'             => '正しいタイムゾーンをしていしてください。',
    'unique'               => '既に存在します。',
    'url'                  => '正しい書式にしてください。',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];