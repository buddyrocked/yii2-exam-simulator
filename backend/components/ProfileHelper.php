<?php
namespace backend\components;
use yii;
use backend\models\Profile;

class ProfileHelper {

	public static function detail(){
		if(!Yii::$app->user->isGuest):
			return Profile::find()->where(['user_id'=>Yii::$app->user->identity->id])->one();
		else:
			return false;
		endif;		
	}

}