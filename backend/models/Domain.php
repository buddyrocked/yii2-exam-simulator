<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * This is the model class for table "domain".
 *
 * @property integer $id
 * @property integer $subject_id
 * @property string $name
 * @property integer $percentage
 * @property string $created
 * @property string $updated
 *
 * @property Subject $subject
 * @property QuestionDomain[] $questionDomains
 */
class Domain extends \yii\db\ActiveRecord
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
        return 'domain';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'percentage'], 'required'],
            [['subject_id', 'percentage'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['name'], 'string', 'max' => 255]
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
            'name' => 'Name',
            'percentage' => 'Percentage',
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
        return $this->hasMany(QuestionDomain::className(), ['domain_id' => 'id']);
    }
}
