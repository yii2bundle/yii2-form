<?php

namespace yii2bundle\model\domain\helpers;

use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii2bundle\model\domain\enums\FieldTypeEnum;
use yii2rails\domain\exceptions\UnprocessableEntityHttpException;
use yii2rails\extension\validator\DynamicModel;
use yubundle\money\domain\entities\FieldEntity;

class RuleHelper {

    public static function filterAttributes($fieldCollection, $data) {
        $names = ArrayHelper::getColumn($fieldCollection, 'name');
        $data = ArrayHelper::filter($data, $names);
        return $data;
    }

    public static function createModel(array $rules, array $data, array $attributes = [], array $fieldCollection = []) : Model {
        $model = new DynamicModel;
        self::setAttributes($model, $attributes);
        $model->loadRules($rules);
        $model->loadData($data);
        $map = ArrayHelper::map($fieldCollection, 'name', 'title');
        //d($map);
        $defaultLabels = [
            'currency_id' => \Yii::t('money/transaction', 'currency'),
            'account' => \Yii::t('money/payment', 'account'),
            'amount' => \Yii::t('money/payment', 'amount'),
        ];
        $map = ArrayHelper::merge($defaultLabels, $map);
        $model->loadAttributeLabels($map);
        /*$model->loadAttributeLabels([
            'currency_id' => \Yii::t('money/transaction', 'currency'),
            'account' => \Yii::t('money/payment', 'account'),
            'amount' => \Yii::t('money/payment', 'amount'),
        ]);*/
        return $model;
    }

    public static function fieldCollectionToRules($fieldCollection) : array {
        $rules = [];
        /** @var FieldEntity[] $fieldCollection */
        foreach ($fieldCollection as $fieldEntity) {
            $entityRules = self::fieldEntityToRules($fieldEntity);
            $rules = ArrayHelper::merge($rules, $entityRules);
        }
        return $rules;
    }

    private static function entityToRule($attributeName, $validator, $params) {
        $validator = \App::$domain->model->rule->validatorClassByName($validator);
        $rule = [$attributeName, $validator];
        $params = is_array($params) ? $params : [];
        $rule = ArrayHelper::merge($rule, $params);
        return $rule;
    }

    private static function prepareErrorAttributes($errors, $prefix = 'data') {
        $newErrors = [];
        foreach ($errors as $errorAttribute => $errorMessages) {
            $newErrors[$errorAttribute] = $errorMessages;
        }
        return $newErrors;
    }

    private static function validate($rules, &$data) {
        $model = self::createModel($rules, $data);
        /*$model = new DynamicModel;
        $model->loadRules($rules);
        $model->loadData($data);*/
        $isValid = $model->validate();
        $data = $model->toArray();
        if(!$isValid) {
            return $model->getErrors();
        }
        return null;
    }

    private static function setAttributes(Model $model, array $attributes) {
        foreach ($attributes as $attribute) {
            $model->{$attribute} = null;
        }
    }

    private static function fieldEntityToRules(FieldEntity $fieldEntity) : array {
        $rules = [];
        if($fieldEntity->rules) {
            foreach ($fieldEntity->rules as $ruleEntity) {
                $rule = self::entityToRule($fieldEntity->name, $ruleEntity->name,$ruleEntity->params);
                $rules[] = $rule;
            }
        }
        if($fieldEntity->type == FieldTypeEnum::ENUM) {
            $rule = self::enumToRule($fieldEntity->name, $fieldEntity->enums);
            $rules[] = $rule;
        }
        return $rules;
    }

    private static function enumToRule($fieldName, $enums) : array {
        $enumOptions = ArrayHelper::map($enums, 'name', 'title');
        $enumNames = array_keys($enumOptions);
        return [$fieldName, 'in', 'range' => $enumNames];
    }

}
