<?php

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

    'accepted'             => ':attribute 必须接受。',
    'active_url'           => ':attribute 不是合法的URL。',
    'after'                => ':attribute 必须是 :date 之后的日期。',
    'after_or_equal'       => ':attribute 必须是 :date 当天或者之后的日期。',
    'alpha'                => ':attribute 只能由字母构成。',
    'alpha_dash'           => ':attribute 只能由字母、数字、横杆与下划线构成。',
    'alpha_num'            => ':attribute 只能由字母与数字构成。',
    'array'                => ':attribute 必须是一个数组。',
    'before'               => ':attribute 必须是 :date 之前的日期。',
    'before_or_equal'      => ':attribute 必须是 :date 当天或者之前的日期。',
    'between'              => [
        'numeric' => ':attribute 必须在 :min - :max 位之间。',
        'file'    => ':attribute 必须在 :min - :max kB之间。',
        'string'  => ':attribute 必须在 :min - :max 字符之间。',
        'array'   => ':attribute 必须在 :min - :max 个元素之间。',
    ],
    'boolean'              => ':attribute 字段必须填 true 或者 false。',
    'confirmed'            => ':attribute confirmation does not match.',
    'date'                 => ':attribute 不是一个合法日期。',
    'date_format'          => ':attribute 与给定的日期格式 :format 不匹配。',
    'different'            => ':attribute 必须与 :other 不同。',
    'digits'               => ':attribute 必须是 :digits 位。',
    'digits_between'       => ':attribute 必须介于 :min 与 :max 位之间。',
    'dimensions'           => ':attribute has invalid image dimensions.',
    'distinct'             => ':attribute field has a duplicate value.',
    'email'                => ':attribute 必须是一个合法的电子邮箱地址。',
    'exists'               => '选定的 :attribute 是无效的。',
    'file'                 => ':attribute 必须是一个文件。',
    'filled'               => ':attribute 字段是必须的。',
    'image'                => ':attribute 必须是一个图片。',
    'in'                   => '选定的 :attribute 是无效的。',
    'in_array'             => ':attribute 字段不再 :other 之中。',
    'integer'              => ':attribute 必须是一个整数。',
    'ip'                   => ':attribute 必须是一个合法的IP地址。',
    'json'                 => ':attribute 必须是一个合法的JSON字符串。',
    'max'                  => [
        'numeric' => ':attribute 不能超过 :max 位。',
        'file'    => ':attribute 不能超过 :max kB。',
        'string'  => ':attribute 不能超过 :max 个字符。',
        'array'   => ':attribute 不能超过 :max 个元素。',
    ],
    'mimes'                => ':attribute 文件类型必须是：:values。',
    'mimetypes'            => ':attribute 文件类型必须是：:values。',
    'min'                  => [
        'numeric' => ':attribute 至少要有 :min 位。',
        'file'    => ':attribute 至少要有 :min kB。',
        'string'  => ':attribute 至少要有 :min 个字符。',
        'array'   => ':attribute 至少要有 :min 个元素。',
    ],
    'not_in'               => '选定的 :attribute 是无效的。',
    'numeric'              => ':attribute 必须是数字。',
    'present'              => ':attribute 字段必须存在。',
    'regex'                => ':attribute 格式是无效的。',
    'required'             => ':attribute 字段是必须的。  ',
    'required_if'          => '当 :other 为 :value 时，:attribute 字段是必须的。',
    'required_unless'      => '当 :other 不在 :values 之中时，:attribute 字段是必须的。',
    'required_with'        => '当 :values 存在时，:attribute 字段是必须的。',
    'required_with_all'    => '当 :values 都存在时，:attribute 字段是必须的。',
    'required_without'     => '当 :values 不存在时，:attribute 字段是必须的。',
    'required_without_all' => '当 :values 都不存在时，:attribute 字段是必须的。',
    'same'                 => ':attribute 与 :other 必须匹配。',
    'size'                 => [
        'numeric' => ':attribute 必须是 :size 位。',
        'file'    => ':attribute 必须是 :size kB。',
        'string'  => ':attribute 必须是 :size 个字符。',
        'array'   => ':attribute 必须包含 :size 个元素。',
    ],
    'string'               => ':attribute 必须是一个字符串。',
    'timezone'             => ':attribute 必须是一个合法的时区。',
    'unique'               => ':attribute 已存在。',
    'uploaded'             => ':attribute 上传失败。',
    'url'                  => ':attribute 无效的格式。',

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
