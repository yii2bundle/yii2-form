<?php

$version = API_VERSION_STRING;

return [
    "POST {$version}/form-validate/<id:\d+>" => "model/form/validate",
    ["class" => "yii\\rest\UrlRule", "controller" => ["{$version}/form" => "model/form"]],
];
