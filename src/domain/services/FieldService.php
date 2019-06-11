<?php

namespace yii2bundle\form\domain\services;

use yii2bundle\form\domain\interfaces\services\FieldInterface;
use yii2rails\domain\services\base\BaseActiveService;

/**
 * Class FieldService
 * 
 * @package yii2bundle\form\domain\services
 * 
 * @property-read \yii2bundle\form\domain\Domain $domain
 * @property-read \yii2bundle\form\domain\interfaces\repositories\FieldInterface $repository
 */
class FieldService extends BaseActiveService implements FieldInterface {

}
