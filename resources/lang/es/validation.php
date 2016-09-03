<?php
return array(
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used
    | by the validator class. Some of the rules contain multiple versions,
    | such as the size (max, min, between) rules. These versions are used
    | for different input types such as strings and files.
    |
    | These language lines may be easily changed to provide custom error
    | messages in your application. Error messages for custom validation
    | rules may also be added to this file.
    |
    */
    "accepted"       => "El campo :attribute debe ser aceptado.",
    "active_url"     => "El campo :attribute no es una URL v�lida.",
    "after"          => "El campo :attribute debe ser una fecha despu�s de :date.",
    "alpha"          => "El campo :attribute s�lo puede contener letras.",
    "alpha_dash"     => "El campo :attribute s�lo puede contener letras, n�meros y guiones.",
    "alpha_num"      => "El campo :attribute s�lo puede contener letras y n�meros.",
    "array"          => "El campo :attribute debe ser un arreglo.",
    "before"         => "El campo :attribute debe ser una fecha antes :date.",
    "between"        => array(
        "numeric" => "El campo :attribute debe estar entre :min - :max.",
        "file"    => "El campo :attribute debe estar entre :min - :max kilobytes.",
        "string"  => "El campo :attribute debe estar entre :min - :max caracteres.",
        "array"   => "El campo :attribute debe tener entre :min y :max elementos.",
    ),
    "boolean"        => "El campo :attribute debe ser verdadero o falso.",
    "confirmed"      => "El campo de confirmaci�n de :attribute no coincide.",
    "date"           => "El campo :attribute no es una fecha v�lida.",
    "date_format" 	 => "El campo :attribute no corresponde con el formato :format.",
    "different"      => "Los campos :attribute y :other deben ser diferentes.",
    "digits"         => "El campo :attribute debe ser de :digits d�gitos.",
    "digits_between" => "El campo :attribute debe tener entre :min y :max d�gitos.",
    "email"          => "El formato del :attribute es inv�lido.",
    "exists"         => "El campo :attribute seleccionado es inv�lido.",
    "filled"         => 'El campo :attribute es requerido.',
    "image"          => "El campo :attribute debe ser una imagen.",
    "in"             => "El campo :attribute seleccionado es inv�lido.",
    "integer"        => "El campo :attribute debe ser un entero.",
    "ip"             => "El campo :attribute debe ser una direcci�n IP v�lida.",
    "json"           => "El campo :attribute debe ser una cadena JSON v�lida.",
    "match"          => "El formato :attribute es inv�lido.",
    "max"            => array(
        "numeric" => "El campo :attribute debe ser menor que :max.",
        "file"    => "El campo :attribute debe ser menor que :max kilobytes.",
        "string"  => "El campo :attribute debe ser menor que :max caracteres.",
        "array"   => "El campo :attribute debe tener al menos :min elementos.",
    ),
    "mimes"         => "El campo :attribute debe ser un archivo de tipo :values.",
    "min"           => array(
        "numeric" => "El campo :attribute debe tener al menos :min.",
        "file"    => "El campo :attribute debe tener al menos :min kilobytes.",
        "string"  => "El campo :attribute debe tener al menos :min caracteres.",
    ),
    "not_in"                => "El campo :attribute seleccionado es invalido.",
    "numeric"               => "El campo :attribute debe ser un n�mero.",
    "regex"                 => "El formato del campo :attribute es inv�lido.",
    "required"              => "El campo :attribute es requerido.",
    "required_if"           => "El campo :attribute es requerido cuando el campo :other es :value.",
    "required_unless"       => 'El campo :attribute es requerido a menos que :other est� presente en :values.',
    "required_with"         => "El campo :attribute es requerido cuando :values est� presente.",
    "required_with_all"     => "El campo :attribute es requerido cuando :values est� presente.",
    "required_without"      => "El campo :attribute es requerido cuando :values no est� presente.",
    "required_without_all"  => "El campo :attribute es requerido cuando ning�n :values est� presente.",
    "same"                  => "El campo :attribute y :other debe coincidir.",
    "size"                  => array(
        "numeric" => "El campo :attribute debe ser :size.",
        "file"    => "El campo :attribute debe tener :size kilobytes.",
        "string"  => "El campo :attribute debe tener :size caracteres.",
        "array"   => "El campo :attribute debe contener :size elementos.",
    ),
    "string"               => "El campo :attribute debe ser una cadena.",
    "unique"         => "El campo :attribute ya ha sido tomado.",
    "url"            => "El formato de :attribute es inv�lido.",
    "timezone"       => "El campo :attribute debe ser una zona v�lida.",
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute_rule" to name the lines. This helps keep your
    | custom validation clean and tidy.
    |
    | So, say you want to use a custom validation message when validating that
    | the "email" attribute is unique. Just add "email_unique" to this array
    | with your custom message. The Validator will handle the rest!
    |
    */
    'custom' => array(
        'attribute-name' => array(
            'rule-name'  => 'custom-message',
        ),
    ),
    /*
    |--------------------------------------------------------------------------
    | Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". Your users will thank you.
    |
    | The Validator class will automatically search this array of lines it
    | is attempting to replace the :attribute place-holder in messages.
    | It's pretty slick. We think you'll like it.
    |
    */
    'attributes' => array(
        'username' => 'usuario',
        'password' => 'contrase�a'
    ),
);