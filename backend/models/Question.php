<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * This is the model class for table "question".
 *
 * @property integer $id
 * @property integer $subject_id
 * @property string $id_question
 * @property integer $passage_id
 * @property string $question
 * @property integer $level
 * @property integer $time
 * @property integer $is_random
 * @property string $created
 * @property string $updated
 *
 * @property Subject $subject
 * @property QuestionDomain[] $questionDomains
 * @property QuestionOption[] $questionOptions
 */
class Question extends \yii\db\ActiveRecord
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
        return 'question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level', 'is_random'], 'required'],
            [['subject_id', 'passage_id', 'level', 'time', 'is_random'], 'integer'],
            [['question'], 'string'],
            [['created', 'updated'], 'safe'],
            [['id_question'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject_id' => 'Subject ID',
            'id_question' => 'Id Question',
            'passage_id' => 'Passage ID',
            'question' => 'Question',
            'level' => 'Level',
            'time' => 'Time',
            'is_random' => 'Is Random',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestionDomains()
    {
        return $this->hasMany(QuestionDomain::className(), ['question_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestionOptions()
    {
        return $this->hasMany(QuestionOption::className(), ['question_id' => 'id']);
    }

    public function getLastNumber(){
        return $this::find()->andWhere(['subject_id' => $this->subject_id]);
    }

    public function generateNumber($name){
        $lastNumber = $this->getLastNumber();
        return $name.str_pad($lastNumber->count() + 1, 4, '0', STR_PAD_LEFT);
    }
}
