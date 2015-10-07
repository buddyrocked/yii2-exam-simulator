<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "strength_setting".
 *
 * @property integer $id
 * @property integer $subject_id
 * @property string $name
 * @property integer $min
 * @property integer $max
 * @property string $created
 * @property string $updated
 */
class StrengthSetting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'strength_setting';
    }

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
    public function rules()
    {
        return [
            [['subject_id', 'min', 'max'], 'integer'],
            [['name', 'min', 'max'], 'required'],
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
            'min' => 'Min',
            'max' => 'Max',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }
}
