<?php
namespace backend\components;

use yii;
use backend\models\Setting;
use backend\models\Project;
use backend\models\Pipeline;
use yii\base\Widget;
use yii\helpers\Html;

class BatchWidget extends Widget {

	public $models;

	public function init(){
		parent::init();
		
	}

	public function run(){
		$models = Project::find()->with('client')->where(['>', new \yii\db\Expression('NOW()'), new \yii\db\Expression('updated + INTERVAL '.$this->getSettingProject().' DAY')])->andWhere(['sales_employee_id'=>Yii::$app->profile->detail()->id])->andWhere(['>', 'end_date', new \yii\db\Expression('NOW()')]);
		$modelPipelines = Pipeline::find()->with('client')->where(['<>', 'pipeline_status_id', '6'])->andWhere(['>', new \yii\db\Expression('NOW()'), new \yii\db\Expression('updated + INTERVAL '.$this->getSettingPipeline().' DAY')])->andWhere(['sales_employee_id'=>Yii::$app->profile->detail()->id]);
		return $this->render('batch', [
			'models'=>$models,
			'modelPipelines'=>$modelPipelines
		]);
	}

	public function getSettingProject(){
		$setting = Setting::find()->where(['key'=>'batch_project'])->one();

		return (isset($setting->value)?$setting->value:7);
	}

	public function getSettingPipeline(){
		$setting = Setting::find()->where(['key'=>'batch_pipeline'])->one();

		return (isset($setting->value)?$setting->value:7);
	}	

}