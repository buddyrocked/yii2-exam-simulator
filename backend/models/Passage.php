<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "passage".
 *
 * @property integer $id
 * @property string $name
 * @property string $desc
 * @property string $created
 * @property string $updated
 */
class Passage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'passage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['desc'], 'string'],
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
            'name' => 'Name',
            'desc' => 'Desc',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }
}
