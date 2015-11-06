<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * This is the model class for table "question_option".
 *
 * @property integer $id
 * @property integer $question_id
 * @property string $option
 * @property integer $is_correct
 * @property string $answer
 * @property string $created
 * @property string $updated
 *
 * @property Question $question
 */
class QuestionOption extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created',
                'updatedAtAttribute' => 'updated',
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_option';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['option'], 'required'],
            [['question_id', 'is_correct'], 'integer'],
            [['option', 'answer'], 'string'],
            [['created', 'updated'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question_id' => 'Question',
            'option' => 'Option',
            'is_correct' => 'Correct',
            'answer' => 'Explanation',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['id' => 'question_id']);
    }
}
