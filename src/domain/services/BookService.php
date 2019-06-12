<?php

namespace yii2bundle\model\domain\services;

use yii2bundle\model\domain\interfaces\services\BookInterface;
use yii2rails\domain\services\base\BaseActiveService;

/**
 * Class BookService
 * 
 * @package yii2bundle\model\domain\services
 * 
 * @property-read \yii2bundle\model\domain\Domain $domain
 * @property-read \yii2bundle\model\domain\interfaces\repositories\BookInterface $repository
 */
class BookService extends BaseActiveService implements BookInterface {

}
