<?php

namespace yii2bundle\model\domain\services;

use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii2bundle\model\domain\helpers\RuleHelper;
use yii2bundle\model\domain\interfaces\services\FormInterface;
use yii2rails\domain\data\Query;
use yii2rails\domain\exceptions\UnprocessableEntityHttpException;
use yii2rails\domain\services\base\BaseActiveService;
use yii2rails\extension\common\enums\StatusEnum;

/**
 * Class FormService
 * 
 * @package yii2bundle\model\domain\services
 * 
 * @property-read \yii2bundle\model\domain\Domain $domain
 * @property-read \yii2bundle\model\domain\interfaces\repositories\FormInterface $repository
 */
class FormService extends BaseActiveService implements FormInterface {

    public function createModel(int $formId, array $data) : Model {
        $fieldCollection = $this->allByFormId($formId);
        $data = RuleHelper::filterAttributes($fieldCollection, $data);
        $rules = RuleHelper::fieldCollectionToRules($fieldCollection);
        $attributes = ArrayHelper::getColumn($fieldCollection, 'name');
        $model = RuleHelper::createModel($rules, $data, $attributes, $fieldCollection);
        return $model;
    }

    /**
     * @param $modelId
     * @param Query|null $query
     * @return FieldEntity[]
     */
    public function allByFormId($formId, Query $query = null)
    {
        $query = new Query;
        $query->with(['fields.rules', 'fields.enums']);
        //$query->andWhere(['is_visible' => 1]);
        /** @var SformEntity $formEntity */
        $formEntity = \App::$domain->model->form->oneById($formId, $query);
        return $formEntity->fields;
        /* $query = Query::forge($query);
         $query->andWhere(['form_id' => $formId]);
         $query->with('rules', 'enums');
         return $this->all($query);*/
    }

    public function validate(int $formId, array $data) : Model {
        $model = $this->createModel($formId, $data);
        $isValid = $model->validate();
        if(!$isValid) {
            throw new UnprocessableEntityHttpException($model);
        }
        //d($isValid);
        //d($model->toArray());
        return $model;
    }

}
