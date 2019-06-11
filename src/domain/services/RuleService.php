<?php

namespace yii2bundle\model\domain\services;

use yii\helpers\ArrayHelper;
use yii2bundle\model\domain\interfaces\services\RuleInterface;
use yii2rails\domain\data\Query;
use yii2rails\domain\services\base\BaseActiveService;
use yii2rails\extension\common\enums\StatusEnum;

/**
 * Class RuleService
 * 
 * @package yii2bundle\model\domain\services
 * 
 * @property-read \yii2bundle\model\domain\Domain $domain
 * @property-read \yii2bundle\model\domain\interfaces\repositories\RuleInterface $repository
 */
class RuleService extends BaseActiveService implements RuleInterface {


    public $validatorClasses = [
        'userLoginValidator' => 'yubundle\money\domain\validators\UserLoginValidator',
        'charFilter' => 'yubundle\money\domain\validators\CharFilter',
    ];

    protected function prepareQuery(Query $query = null)
    {
        $query = Query::forge($query);
        $query->andWhere(['status' => StatusEnum::ENABLE]);
        $query->orderBy(['sort' => SORT_ASC]);
        return $query;
    }

    public function validatorClassByName(string $validator) : string {
        return ArrayHelper::getValue($this->validatorClasses, $validator, $validator);
    }


}
