<?php

namespace yii2bundle\model\domain\services;

use yii2bundle\model\domain\interfaces\services\RuleInterface;
use yii2rails\domain\services\base\BaseActiveService;

/**
 * Class RuleService
 * 
 * @package yii2bundle\model\domain\services
 * 
 * @property-read \yii2bundle\model\domain\Domain $domain
 * @property-read \yii2bundle\model\domain\interfaces\repositories\RuleInterface $repository
 */
class RuleService extends BaseActiveService implements RuleInterface {

}
