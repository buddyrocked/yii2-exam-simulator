<?php
namespace backend\components;

use yii;
use backend\models\LeaveRequest;
use yii\base\Widget;
use yii\helpers\Html;

class LeaveWidget extends Widget {

	public $models;

	public function init(){
		parent::init();
	}

	public function run(){
		$models = LeaveRequest::find()->where(['status'=>1])->andWhere(['supervisor_id'=>Yii::$app->profile->detail()->id])->orderBy('id DESC');
		$modelsApproved = LeaveRequest::find()->where(['status'=>2])->andWhere(['employee_id'=>Yii::$app->profile->detail()->id])->andWhere(['is_hide'=>NULL])->orderBy('id DESC');
		$modelsRejected = LeaveRequest::find()->where(['status'=>3])->andWhere(['employee_id'=>Yii::$app->profile->detail()->id])->andWhere(['is_hide'=>NULL])->orderBy('id DESC');
		return $this->render('leave', [
			'models'=>$models,
			'modelsApproved'=>$modelsApproved,
			'modelsRejected'=>$modelsRejected
		]);
	}	

}