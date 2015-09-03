<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "question_domain".
 *
 * @property integer $id
 * @property integer $question_id
 * @property integer $domain_id
 *
 * @property Domain $domain
 * @property Question $question
 */
class QuestionDomain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_domain';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['domain_id'], 'required'],
            [['question_id', 'domain_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question_id' => 'Question ID',
            'domain_id' => 'Domain ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDomain()
    {
        return $this->hasOne(Domain::className(), ['id' => 'domain_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['id' => 'question_id']);
    }
}
