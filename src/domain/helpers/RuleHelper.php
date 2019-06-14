<?php

namespace yii2bundle\model\domain\helpers;

use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii2bundle\model\domain\entities\FieldEntity;
use yii2bundle\model\domain\enums\FieldTypeEnum;
use yii2rails\domain\exceptions\UnprocessableEntityHttpException;
use yii2rails\domain\values\NullValue;
use yii2rails\extension\common\helpers\TypeEncodeHelper;
use yii2rails\extension\common\helpers\TypeHelper;
use yii2rails\extension\validator\DynamicModel;

class RuleHelper {

    public static function filterAttributes($fieldCollection, $data) {
        $names = ArrayHelper::getColumn($fieldCollection, 'name');
        $data = ArrayHelper::filter($data, $names);
        return $data;
    }

    private static function forgeDefaultValues(Model $model, array $fieldCollection) {
        $attributes = [];
        foreach ($fieldCollection as $fieldEntity) {
            if($fieldEntity->default !== null) {
                $attributes[$fieldEntity->name] = $fieldEntity->default;
            } else {
                $attributes[$fieldEntity->name] = null;
            }
        }
        return $attributes;
    }

    public static function createModelFromFields(array $data, array $fieldCollection = []) : Model {
        $data = RuleHelper::filterAttributes($fieldCollection, $data);
        $rules = RuleHelper::fieldCollectionToRules($fieldCollection);
        $model = RuleHelper::createModel($rules, $data, $fieldCollection);
        return $model;
    }

    public static function createModel(array $rules, array $data, array $fieldCollection = []) : Model {
        $model = new DynamicModel;
        $defaultValues = self::forgeDefaultValues($model, $fieldCollection);
        $model->loadData($defaultValues);
        $model->loadRules($rules);
        $model->loadData($data);
        $map = ArrayHelper::map($fieldCollection, 'name', 'title');
        $defaultLabels = [
            'currency_id' => ['money/transaction', 'currency'],
            'account' => ['money/payment', 'account'],
            'amount' => ['money/payment', 'amount'],
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

    private static function entityToRule(string $attributeName, string $validator, $params) {
        $validator = \App::$domain->model->rule->validatorClassByName($validator);
        $rule = [$attributeName, $validator];
        $params = is_array($params) ? $params : [];
        $rule = ArrayHelper::merge($rule, $params);
        return $rule;
    }

    private static function prepareErrorAttributes(array $errors, string $prefix = 'data') {
        $newErrors = [];
        foreach ($errors as $errorAttribute => $errorMessages) {
            $newErrors[$errorAttribute] = $errorMessages;
        }
        return $newErrors;
    }

    private static function validate(array $rules, array &$data) {
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

    /*private static function setAttributes(Model $model, array $fieldCollection) {
        $attributes = ArrayHelper::getColumn($fieldCollection, 'name');
        foreach ($attributes as $attribute) {
            $model->{$attribute} = null;
        }
    }*/

    private static function fieldEntityToRules(FieldEntity $fieldEntity) : array {
        $rules = [];
        if($fieldEntity->is_required) {
            $rules[] = [$fieldEntity->name, 'required'];
        }
        if($fieldEntity->default) {
            $rules[] = [$fieldEntity->name, 'default', 'value' => $fieldEntity->default];
        }

        $typeRules = self::getTypeRule($fieldEntity);
        if($typeRules) {
            $rules = array_merge($rules, $typeRules);
        }

        if($fieldEntity->rules) {
            foreach ($fieldEntity->rules as $ruleEntity) {
                $rule = self::entityToRule($fieldEntity->name, $ruleEntity->name,$ruleEntity->params);
                $rules[] = $rule;
            }
        }
        return $rules;
    }

    private static function getTypeRule(FieldEntity $fieldEntity) {
        $handledTypes = [
            FieldTypeEnum::INTEGER => 'intval',
            FieldTypeEnum::DOUBLE => 'floatval',
            FieldTypeEnum::STRING => 'strval',
            FieldTypeEnum::SAFE_STRING => 'strval',
            FieldTypeEnum::BOOLEAN => [TypeEncodeHelper::class, 'bool'],
        ];
        $rules = [];
        if($fieldEntity->type && isset($handledTypes[$fieldEntity->type])) {
            $rules[] = [$fieldEntity->name, 'filter', 'filter' => $handledTypes[$fieldEntity->type]];
        }
        if($fieldEntity->type == FieldTypeEnum::ENUM) {
            $rules[] = [$fieldEntity->name, 'trim'];
            $rules[] = self::enumToRule($fieldEntity->name, $fieldEntity->enums);
        }
        if($fieldEntity->type == FieldTypeEnum::ENUMS) {
            $rules[] = [$fieldEntity->name, 'trim'];
            $rules[] = self::enumToRule($fieldEntity->name, $fieldEntity->enums, true);
        }
        if($fieldEntity->type == FieldTypeEnum::SAFE_STRING) {
            $rules[] = [$fieldEntity->name, 'filter', 'filter' => '\yii\helpers\HtmlPurifier::process'];
            $rules[] = [$fieldEntity->name, 'trim'];
        }
        return $rules;
    }

    private static function enumToRule($fieldName, $enums, $allowArray = false) : array {
        $enumOptions = ArrayHelper::map($enums, 'name', 'title');
        $enumNames = array_keys($enumOptions);
        return [$fieldName, 'in', 'range' => $enumNames, 'allowArray' => $allowArray];
    }

}
