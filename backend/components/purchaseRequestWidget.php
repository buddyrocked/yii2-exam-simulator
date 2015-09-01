<?php
namespace backend\components;

use yii;
use backend\models\PurchaseRequest;
use yii\base\Widget;
use yii\helpers\Html;

class purchaseRequestWidget extends Widget {

	public $models;

	public function init(){
		parent::init();
		
	}

	public function run(){
		$models = PurchaseRequest::find()->where(['employee_supervisor_id'=>Yii::$app->profile->detail()->id])->orderBy('id DESC');
		//$modelsApproved = LeaveRequest::find()->where(['status'=>2])->andWhere(['employee_id'=>Yii::$app->profile->detail()->id])->andWhere(['is_hide'=>NULL])->orderBy('id DESC');
		//$modelsRejected = LeaveRequest::find()->where(['status'=>3])->andWhere(['employee_id'=>Yii::$app->profile->detail()->id])->andWhere(['is_hide'=>NULL])->orderBy('id DESC');
		return $this->render('purchaseRequest', [
			'models'=>$models,
			//'modelsApproved'=>$modelsApproved,
			//'modelsRejected'=>$modelsRejected
		]);
	}	

}