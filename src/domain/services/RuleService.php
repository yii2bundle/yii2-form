<?php

namespace yii2bundle\form\domain\services;

use yii2bundle\form\domain\interfaces\services\RuleInterface;
use yii2rails\domain\services\base\BaseActiveService;

/**
 * Class RuleService
 * 
 * @package yii2bundle\form\domain\services
 * 
 * @property-read \yii2bundle\form\domain\Domain $domain
 * @property-read \yii2bundle\form\domain\interfaces\repositories\RuleInterface $repository
 */
class RuleService extends BaseActiveService implements RuleInterface {

}
