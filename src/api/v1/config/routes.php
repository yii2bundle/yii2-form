<?php

$version = API_VERSION_STRING;

return [
    "POST {$version}/model/validate/<id:\d+>" => "model/entity/validate",
    ["class" => "yii\\rest\UrlRule", "controller" => ["{$version}/model/entity" => "model/entity"]],
];
