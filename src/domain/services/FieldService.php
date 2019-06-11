<?php

namespace yii2bundle\model\domain\services;

use yii2bundle\model\domain\interfaces\services\FieldInterface;
use yii2rails\domain\data\Query;
use yii2rails\domain\services\base\BaseActiveService;
use yii2rails\extension\common\enums\StatusEnum;

/**
 * Class FieldService
 * 
 * @package yii2bundle\model\domain\services
 * 
 * @property-read \yii2bundle\model\domain\Domain $domain
 * @property-read \yii2bundle\model\domain\interfaces\repositories\FieldInterface $repository
 */
class FieldService extends BaseActiveService implements FieldInterface {

    protected function prepareQuery(Query $query = null) {
        $query = Query::forge($query);
        $query->andWhere(['status' => StatusEnum::ENABLE]);
        $query->orderBy(['sort' => SORT_ASC]);
        return $query;
    }

}
