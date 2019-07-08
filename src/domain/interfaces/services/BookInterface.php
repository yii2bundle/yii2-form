<?php

namespace yii2bundle\model\domain\interfaces\services;

use yii2bundle\model\domain\entities\BookEntity;
use yii2rails\domain\data\Query;
use yii2rails\domain\interfaces\services\CrudInterface;

/**
 * Interface BookInterface
 * 
 * @package yii2bundle\model\domain\interfaces\services
 * 
 * @property-read \yii2bundle\model\domain\Domain $domain
 * @property-read \yii2bundle\model\domain\interfaces\repositories\BookInterface $repository
 */
interface BookInterface extends CrudInterface {

    public function oneByName($bookName, Query $query = null) : BookEntity;

}
