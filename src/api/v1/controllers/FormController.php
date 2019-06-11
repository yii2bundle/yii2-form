<?php

namespace yii2bundle\model\api\v1\controllers;

use yii2bundle\model\domain\enums\ModelPermissionEnum;
use yubundle\money\domain\v1\interfaces\services\DivisionInterface;
use yii2lab\rest\domain\rest\ActiveControllerWithQuery as Controller;
use yii2rails\extension\web\helpers\Behavior;

class FormController extends Controller
{

	public $service = 'model.form';

	public function behaviors()
    {
        return [
            Behavior::cors(),
            //Behavior::auth(),
            Behavior::access(ModelPermissionEnum::MANAGE, ['create', 'update', 'delete']),
        ];
    }

}
