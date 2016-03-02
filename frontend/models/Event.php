<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "event".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $note
 * @property string $datetime
 * @property string $venue
 * @property string $address
 * @property string $file
 * @property string $image
 * @property integer $published
 * @property string $created
 * @property string $updated
 */
class Event extends \yii\db\ActiveRecord
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
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'datetime', 'venue', 'address', 'published', 'popup'], 'required'],
            [['description', 'note', 'address'], 'string'],
            [['datetime', 'created', 'updated'], 'safe'],
            [['published', 'popup'], 'integer'],
            [['name', 'venue', 'file', 'image'], 'string', 'max' => 255],
            [['image', 'file'], 'file', 'skipOnEmpty' => true],
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
            'description' => 'Description',
            'note' => 'Note',
            'datetime' => 'Datetime',
            'venue' => 'Venue',
            'address' => 'Address',
            'file' => 'File',
            'image' => 'Image',
            'published' => 'Published',
            'created' => 'Created',
            'updated' => 'Updated',
            'popup' => 'Pop Up'
        ];
    }

    public function getEventRegistrations(){
        return $this->hasMany(EventRegistration::className(), ['event_id'=>'id']);
    }
}
