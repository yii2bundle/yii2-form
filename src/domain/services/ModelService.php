<?php

namespace yii2bundle\form\domain\services;

use yii2bundle\form\domain\interfaces\services\ModelInterface;
use yii2rails\domain\services\base\BaseActiveService;

/**
 * Class ModelService
 * 
 * @package yii2bundle\form\domain\services
 * 
 * @property-read \yii2bundle\form\domain\Domain $domain
 * @property-read \yii2bundle\form\domain\interfaces\repositories\ModelInterface $repository
 */
class ModelService extends BaseActiveService implements ModelInterface {

}
