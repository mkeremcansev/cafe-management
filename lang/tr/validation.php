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

    'accepted' => ':attribute alanı kabul edilmelidir.',
    'accepted_if' => ':attribute alanı, :other :value olduğunda kabul edilmelidir.',
    'active_url' => ':attribute alanı geçerli bir URL olmalıdır.',
    'after' => ':attribute alanı, :date tarihinden sonraki bir tarih olmalıdır.',
    'after_or_equal' => ':attribute alanı, :date tarihinden sonra veya bu tarihe eşit bir tarih olmalıdır.',
    'alpha' => ':attribute alanı sadece harflerden oluşmalıdır.',
    'alpha_dash' => ':attribute alanı sadece harfler, sayılar, tire ve alt çizgi içerebilir.',
    'alpha_num' => ':attribute alanı sadece harfler ve sayılardan oluşmalıdır.',
    'array' => ':attribute alanı bir dizi olmalıdır.',
    'ascii' => ':attribute alanı sadece tek baytlık alfanümerik karakterler ve semboller içermelidir.',
    'before' => ':attribute alanı, :date tarihinden önceki bir tarih olmalıdır.',
    'before_or_equal' => ':attribute alanı, :date tarihinden önce veya bu tarihe eşit bir tarih olmalıdır.',
    'between' => [
        'array' => ':attribute alanı, :min ve :max öğe arasında olmalıdır.',
        'file' => ':attribute alanı, :min ve :max kilobayt arasında olmalıdır.',
        'numeric' => ':attribute alanı, :min ve :max arasında olmalıdır.',
        'string' => ':attribute alanı, :min ve :max karakter arasında olmalıdır.',
    ],
    'boolean' => ':attribute alanı doğru veya yanlış olmalıdır.',
    'can' => ':attribute alanı yetkisiz bir değer içeriyor.',
    'confirmed' => ':attribute alanı onayı eşleşmiyor.',
    'contains' => ':attribute alanında gerekli bir değer eksik.',
    'current_password' => 'Parola yanlış.',
    'date' => ':attribute alanı geçerli bir tarih olmalıdır.',
    'date_equals' => ':attribute alanı, :date tarihine eşit bir tarih olmalıdır.',
    'date_format' => ':attribute alanı, :format formatıyla eşleşmelidir.',
    'decimal' => ':attribute alanı :decimal ondalık basamağa sahip olmalıdır.',
    'declined' => ':attribute alanı reddedilmelidir.',
    'declined_if' => ':attribute alanı, :other :value olduğunda reddedilmelidir.',
    'different' => ':attribute alanı ile :other farklı olmalıdır.',
    'digits' => ':attribute alanı :digits basamaklı olmalıdır.',
    'digits_between' => ':attribute alanı, :min ve :max basamak arasında olmalıdır.',
    'dimensions' => ':attribute alanı geçersiz resim boyutlarına sahip.',
    'distinct' => ':attribute alanı yinelenen bir değere sahip.',
    'doesnt_end_with' => ':attribute alanı şu değerlerden biri ile bitmemelidir: :values.',
    'doesnt_start_with' => ':attribute alanı şu değerlerden biri ile başlamamalıdır: :values.',
    'email' => ':attribute alanı geçerli bir e-posta adresi olmalıdır.',
    'ends_with' => ':attribute alanı şu değerlerden biri ile bitmelidir: :values.',
    'enum' => 'Seçilen :attribute geçersiz.',
    'exists' => 'Seçilen :attribute geçersiz.',
    'extensions' => ':attribute alanı şu uzantılardan birine sahip olmalıdır: :values.',
    'file' => ':attribute alanı bir dosya olmalıdır.',
    'filled' => ':attribute alanı bir değere sahip olmalıdır.',
    'gt' => [
        'array' => ':attribute alanı :value öğeden fazla olmalıdır.',
        'file' => ':attribute alanı :value kilobayttan büyük olmalıdır.',
        'numeric' => ':attribute alanı :value değerinden büyük olmalıdır.',
        'string' => ':attribute alanı :value karakterden uzun olmalıdır.',
    ],
    'gte' => [
        'array' => ':attribute alanı en az :value öğe içermelidir.',
        'file' => ':attribute alanı en az :value kilobayt olmalıdır.',
        'numeric' => ':attribute alanı en az :value olmalıdır.',
        'string' => ':attribute alanı en az :value karakter olmalıdır.',
    ],
    'hex_color' => ':attribute alanı geçerli bir onaltılık renk kodu olmalıdır.',
    'image' => ':attribute alanı bir resim olmalıdır.',
    'in' => 'Seçilen :attribute geçersiz.',
    'in_array' => ':attribute alanı :other içinde bulunmalıdır.',
    'integer' => ':attribute alanı bir tamsayı olmalıdır.',
    'ip' => ':attribute alanı geçerli bir IP adresi olmalıdır.',
    'ipv4' => ':attribute alanı geçerli bir IPv4 adresi olmalıdır.',
    'ipv6' => ':attribute alanı geçerli bir IPv6 adresi olmalıdır.',
    'json' => ':attribute alanı geçerli bir JSON dizesi olmalıdır.',
    'list' => ':attribute alanı bir liste olmalıdır.',
    'lowercase' => ':attribute alanı küçük harflerden oluşmalıdır.',
    'lt' => [
        'array' => ':attribute alanı :value öğeden az olmalıdır.',
        'file' => ':attribute alanı :value kilobayttan küçük olmalıdır.',
        'numeric' => ':attribute alanı :value değerinden küçük olmalıdır.',
        'string' => ':attribute alanı :value karakterden kısa olmalıdır.',
    ],
    'lte' => [
        'array' => ':attribute alanı en fazla :value öğe içermelidir.',
        'file' => ':attribute alanı en fazla :value kilobayt olmalıdır.',
        'numeric' => ':attribute alanı en fazla :value olmalıdır.',
        'string' => ':attribute alanı en fazla :value karakter olmalıdır.',
    ],
    'mac_address' => ':attribute alanı geçerli bir MAC adresi olmalıdır.',
    'max' => [
        'array' => ':attribute alanı en fazla :max öğe içermelidir.',
        'file' => ':attribute alanı en fazla :max kilobayt olmalıdır.',
        'numeric' => ':attribute alanı en fazla :max olmalıdır.',
        'string' => ':attribute alanı en fazla :max karakter olmalıdır.',
    ],
    'max_digits' => ':attribute alanı en fazla :max basamak olmalıdır.',
    'mimes' => ':attribute alanı şu dosya türlerinden biri olmalıdır: :values.',
    'mimetypes' => ':attribute alanı şu dosya türlerinden biri olmalıdır: :values.',
    'min' => [
        'array' => ':attribute alanı en az :min öğe içermelidir.',
        'file' => ':attribute alanı en az :min kilobayt olmalıdır.',
        'numeric' => ':attribute alanı en az :min olmalıdır.',
        'string' => ':attribute alanı en az :min karakter olmalıdır.',
    ],
    'min_digits' => ':attribute alanı en az :min basamak olmalıdır.',
    'missing' => ':attribute alanı eksik olmalıdır.',
    'missing_if' => ':attribute alanı :other :value olduğunda eksik olmalıdır.',
    'missing_unless' => ':attribute alanı :other :value olmadıkça eksik olmalıdır.',
    'missing_with' => ':attribute alanı :values mevcut olduğunda eksik olmalıdır.',
    'missing_with_all' => ':attribute alanı :values mevcut olduğunda eksik olmalıdır.',
    'multiple_of' => ':attribute alanı :value katı olmalıdır.',
    'not_in' => 'Seçilen :attribute geçersiz.',
    'not_regex' => ':attribute alanı formatı geçersiz.',
    'numeric' => ':attribute alanı bir sayı olmalıdır.',
    'password' => [
        'letters' => ':attribute alanı en az bir harf içermelidir.',
        'mixed' => ':attribute alanı en az bir büyük harf ve bir küçük harf içermelidir.',
        'numbers' => ':attribute alanı en az bir sayı içermelidir.',
        'symbols' => ':attribute alanı en az bir sembol içermelidir.',
        'uncompromised' => 'Verilen :attribute bir veri sızıntısında yer almış. Lütfen farklı bir :attribute seçin.',
    ],
    'present' => ':attribute alanı mevcut olmalıdır.',
    'present_if' => ':attribute alanı :other :value olduğunda mevcut olmalıdır.',
    'present_unless' => ':attribute alanı :other :value olmadıkça mevcut olmalıdır.',
    'present_with' => ':attribute alanı :values mevcut olduğunda mevcut olmalıdır.',
    'present_with_all' => ':attribute alanı :values mevcut olduğunda mevcut olmalıdır.',
    'prohibited' => ':attribute alanı yasaklanmıştır.',
    'prohibited_if' => ':attribute alanı :other :value olduğunda yasaklanmıştır.',
    'prohibited_unless' => ':attribute alanı :other :values içinde olmadıkça yasaklanmıştır.',
    'prohibits' => ':attribute alanı :other alanının mevcut olmasını engelliyor.',
    'regex' => ':attribute alanı formatı geçersiz.',
    'required' => ':attribute alanı gereklidir.',
    'required_array_keys' => ':attribute alanı şunlar için girişler içermelidir: :values.',
    'required_if' => ':attribute alanı :other :value olduğunda gereklidir.',
    'required_if_accepted' => ':attribute alanı :other kabul edildiğinde gereklidir.',
    'required_if_declined' => ':attribute alanı :other reddedildiğinde gereklidir.',
    'required_unless' => ':attribute alanı :other :values içinde olmadıkça gereklidir.',
    'required_with' => ':attribute alanı :values mevcut olduğunda gereklidir.',
    'required_with_all' => ':attribute alanı :values mevcut olduğunda gereklidir.',
    'required_without' => ':attribute alanı :values mevcut olmadığında gereklidir.',
    'required_without_all' => ':attribute alanı :values hiçbirisi mevcut olmadığında gereklidir.',
    'same' => ':attribute alanı :other ile eşleşmelidir.',
    'size' => [
        'array' => ':attribute alanı :size öğe içermelidir.',
        'file' => ':attribute alanı :size kilobayt olmalıdır.',
        'numeric' => ':attribute alanı :size olmalıdır.',
        'string' => ':attribute alanı :size karakter olmalıdır.',
    ],
    'starts_with' => ':attribute alanı şu değerlerden biri ile başlamalıdır: :values.',
    'string' => ':attribute alanı bir dize olmalıdır.',
    'timezone' => ':attribute alanı geçerli bir zaman dilimi olmalıdır.',
    'unique' => ':attribute zaten alınmış.',
    'uploaded' => ':attribute yüklenemedi.',
    'uppercase' => ':attribute alanı büyük harflerden oluşmalıdır.',
    'url' => ':attribute alanı geçerli bir URL olmalıdır.',
    'ulid' => ':attribute alanı geçerli bir ULID olmalıdır.',
    'uuid' => ':attribute alanı geçerli bir UUID olmalıdır.',

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
        'x' => [
            'regex' => 'x alanı için "a-b.c" formatında veri girmelisiniz.',
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
