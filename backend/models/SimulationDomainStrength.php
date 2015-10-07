<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "simulation_domain_strength".
 *
 * @property integer $id
 * @property integer $simulation_id
 * @property string $name
 * @property integer $min
 * @property integer $max
 * @property string $created
 * @property string $updated
 */
class SimulationDomainStrength extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'simulation_domain_strength';
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
            [['simulation_id', 'name', 'min', 'max'], 'required'],
            [['simulation_id', 'min', 'max'], 'integer'],
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
            'simulation_id' => 'Simulation ID',
            'name' => 'Name',
            'min' => 'Min',
            'max' => 'Max',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }
}
