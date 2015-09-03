<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "subject".
 *
 * @property integer $id
 * @property string $id_subject
 * @property string $name
 * @property string $desc
 * @property integer $question_number
 * @property integer $time
 * @property string $created
 * @property string $updated
 *
 * @property Domain[] $domains
 * @property Question[] $questions
 */
class Subject extends \yii\db\ActiveRecord
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
        return 'subject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'question_number', 'time'], 'required'],
            [['desc'], 'string'],
            [['question_number', 'time'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['id_subject', 'name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_subject' => 'Id Subject',
            'name' => 'Name',
            'desc' => 'Desc',
            'question_number' => 'Question Number',
            'time' => 'Time',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDomains()
    {
        return $this->hasMany(Domain::className(), ['subject_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['subject_id' => 'id']);
    }

    public function getLastNumber(){
        return $this::find()->andWhere(['like', 'id_subject', $this->name.'%', false]);
    }

    public function generateNumber(){
        $lastNumber = $this->getLastNumber();
        return $this->name.str_pad($lastNumber->count() + 1, 4, '0', STR_PAD_LEFT);
    }
}
