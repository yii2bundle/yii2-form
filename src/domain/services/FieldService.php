<?php

namespace yii2bundle\model\domain\services;

use yii2bundle\model\domain\interfaces\services\FieldInterface;
use yii2rails\domain\services\base\BaseActiveService;

/**
 * Class FieldService
 * 
 * @package yii2bundle\model\domain\services
 * 
 * @property-read \yii2bundle\model\domain\Domain $domain
 * @property-read \yii2bundle\model\domain\interfaces\repositories\FieldInterface $repository
 */
class FieldService extends BaseActiveService implements FieldInterface {

}
