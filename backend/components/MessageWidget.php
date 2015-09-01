<?php
namespace backend\components;

use yii;
use backend\models\Candidate;
use yii\base\Widget;
use yii\helpers\Html;

class MessageWidget extends Widget {

	public $messages;

	public function init(){
		parent::init();
		
	}

	public function run(){
		$candidates = Candidate::find()->where(['interview_status_id'=>3]);
		return $this->render('messages', [
			'candidates'=>$candidates
		]);
	}	

}