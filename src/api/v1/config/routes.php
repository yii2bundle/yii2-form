<?php

$version = API_VERSION_STRING;

return [
    ["class" => "yii\\rest\UrlRule", "controller" => ["{$version}/meta-entity" => "model/entity"]],
];
