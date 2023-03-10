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

    'accepted' => 'ال :attribute يجب قبوله.',
    'accepted_if' => 'ال :attribute يجب قبوله عندما: الآخر هو: القيمة.',
    'active_url' => 'ال :attribute ليس صحيحا URL.',
    'after' => 'ال :attribute يجب أن يكون تاريخًا بعد: التاريخ.',
    'after_or_equal' => 'ال :attribute يجب أن يكون تاريخًا بعد: التاريخ أو مساويًا له.',
    'alpha' => 'ال :attribute يجب أن يحتوي على أحرف فقط.',
    'alpha_dash' => 'ال :attribute يجب أن تحتوي فقط على أحرف وأرقام وشرطات وشرطات سفلية.',
    'alpha_num' => 'ال :attribute يجب أن يحتوي على أحرف وأرقام فقط.',
    'array' => 'ال :attribute يجب أن يكون مصفوفة.',
    'before' => 'ال :attribute يجب أن يكون تاريخًا قبل: التاريخ.',
    'before_or_equal' => 'ال :attribute يجب أن يكون تاريخًا يسبق أو يساوي: التاريخ.',
    'between' => [
        'array' => 'ال :attribute must have between :min and :max items.',
        'file' => 'ال :attribute must be between :min and :max kilobytes.',
        'numeric' => 'ال :attribute must be between :min and :max.',
        'string' => 'ال :attribute must be between :min and :max characters.',
    ],
    'boolean' => 'ال :attribute field must be true or false.',
    'confirmed' => 'ال :attribute confirmation does not match.',
    'current_password' => 'ال password is incorrect.',
    'date' => 'ال :attribute is not a valid date.',
    'date_equals' => 'ال :attribute must be a date equal to :date.',
    'date_format' => 'ال :attribute does not match the format :format.',
    'declined' => 'ال :attribute must be declined.',
    'declined_if' => 'ال :attribute must be declined when :other is :value.',
    'different' => 'ال :attribute and :other must be different.',
    'digits' => 'ال :attribute must be :digits digits.',
    'digits_between' => 'ال :attribute must be between :min and :max digits.',
    'dimensions' => 'ال :attribute has invalid image dimensions.',
    'distinct' => 'ال :attribute field has a duplicate value.',
    'doesnt_end_with' => 'ال :attribute may not end with one of the following: :values.',
    'doesnt_start_with' => 'ال :attribute may not start with one of the following: :values.',
    'email' => 'ال :attribute must be a valid email address.',
    'ends_with' => 'ال :attribute must end with one of the following: :values.',
    'enum' => 'ال selected :attribute is invalid.',
    'exists' => 'ال selected :attribute is invalid.',
    'file' => 'ال :attribute must be a file.',
    'filled' => 'ال :attribute field must have a value.',
    'gt' => [
        'array' => 'ال :attribute must have more than :value items.',
        'file' => 'ال :attribute must be greater than :value kilobytes.',
        'numeric' => 'ال :attribute must be greater than :value.',
        'string' => 'ال :attribute must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'ال :attribute must have :value items or more.',
        'file' => 'ال :attribute must be greater than or equal to :value kilobytes.',
        'numeric' => 'ال :attribute must be greater than or equal to :value.',
        'string' => 'ال :attribute must be greater than or equal to :value characters.',
    ],
    'image' => 'ال :attribute must be an image.',
    'in' => 'ال selected :attribute is invalid.',
    'in_array' => 'ال :attribute field does not exist in :other.',
    'integer' => 'ال :attribute must be an integer.',
    'ip' => 'ال :attribute must be a valid IP address.',
    'ipv4' => 'ال :attribute must be a valid IPv4 address.',
    'ipv6' => 'ال :attribute must be a valid IPv6 address.',
    'json' => 'ال :attribute must be a valid JSON string.',
    'lt' => [
        'array' => 'ال :attribute must have less than :value items.',
        'file' => 'ال :attribute must be less than :value kilobytes.',
        'numeric' => 'ال :attribute must be less than :value.',
        'string' => 'ال :attribute must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'ال :attribute must not have more than :value items.',
        'file' => 'ال :attribute must be less than or equal to :value kilobytes.',
        'numeric' => 'ال :attribute must be less than or equal to :value.',
        'string' => 'ال :attribute must be less than or equal to :value characters.',
    ],
    'mac_address' => 'ال :attribute must be a valid MAC address.',
    'max' => [
        'array' => 'ال :attribute must not have more than :max items.',
        'file' => 'ال :attribute must not be greater than :max kilobytes.',
        'numeric' => 'ال :attribute must not be greater than :max.',
        'string' => 'ال :attribute must not be greater than :max characters.',
    ],
    'mimes' => 'ال :attribute must be a file of type: :values.',
    'mimetypes' => 'ال :attribute must be a file of type: :values.',
    'min' => [
        'array' => 'ال :attribute must have at least :min items.',
        'file' => 'ال :attribute must be at least :min kilobytes.',
        'numeric' => 'ال :attribute must be at least :min.',
        'string' => 'ال :attribute must be at least :min characters.',
    ],
    'multiple_of' => 'ال :attribute must be a multiple of :value.',
    'not_in' => 'ال selected :attribute is invalid.',
    'not_regex' => 'ال :attribute format is invalid.',
    'numeric' => 'ال :attribute must be a number.',
    'password' => [
        'letters' => 'ال :attribute must contain at least one letter.',
        'mixed' => 'ال :attribute must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'ال :attribute must contain at least one number.',
        'symbols' => 'ال :attribute must contain at least one symbol.',
        'uncompromised' => 'ال given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'ال :attribute field must be present.',
    'prohibited' => 'ال :attribute field is prohibited.',
    'prohibited_if' => 'ال :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'ال :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'ال :attribute field prohibits :other from being present.',
    'regex' => 'ال :attribute format is invalid.',
    'required' => 'ال :attribute field is required.',
    'required_array_keys' => 'ال :attribute field must contain entries for: :values.',
    'required_if' => 'ال :attribute field is required when :other is :value.',
    'required_unless' => 'ال :attribute field is required unless :other is in :values.',
    'required_with' => 'ال :attribute field is required when :values is present.',
    'required_with_all' => 'ال :attribute field is required when :values are present.',
    'required_without' => 'ال :attribute field is required when :values is not present.',
    'required_without_all' => 'ال :attribute field is required when none of :values are present.',
    'same' => 'ال :attribute and :other must match.',
    'size' => [
        'array' => 'ال :attribute must contain :size items.',
        'file' => 'ال :attribute must be :size kilobytes.',
        'numeric' => 'ال :attribute must be :size.',
        'string' => 'ال :attribute must be :size characters.',
    ],
    'starts_with' => 'ال :attribute must start with one of the following: :values.',
    'string' => 'ال :attribute must be a string.',
    'timezone' => 'ال :attribute must be a valid timezone.',
    'unique' => 'ال :attribute has already been taken.',
    'uploaded' => 'ال :attribute failed to upload.',
    'url' => 'ال :attribute must be a valid URL.',
    'uuid' => 'ال :attribute must be a valid UUID.',

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
