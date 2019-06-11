<?php

$version = API_VERSION_STRING;

return [
    "POST {$version}/entity-validate/<id:\d+>" => "model/entity/validate",
    ["class" => "yii\\rest\UrlRule", "controller" => ["{$version}/entity" => "model/entity"]],
];
