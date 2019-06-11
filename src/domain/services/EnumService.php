<?php

namespace yii2bundle\model\domain\services;

use yii2bundle\model\domain\interfaces\services\EnumInterface;
use yii2rails\domain\services\base\BaseActiveService;

/**
 * Class EnumService
 * 
 * @package yii2bundle\model\domain\services
 * 
 * @property-read \yii2bundle\model\domain\Domain $domain
 * @property-read \yii2bundle\model\domain\interfaces\repositories\EnumInterface $repository
 */
class EnumService extends BaseActiveService implements EnumInterface {

}
