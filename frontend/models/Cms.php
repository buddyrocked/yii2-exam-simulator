<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "cms".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $image
 * @property integer $type
 * @property integer $is_html
 * @property integer $status
 * @property string $created
 * @property string $updated
 */
class Cms extends \yii\db\ActiveRecord
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
        return 'cms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'type', 'content', 'is_html'], 'required'],
            [['content'], 'string'],
            [['type', 'is_html', 'status'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['title', 'image'], 'string', 'max' => 255],
            [['image'], 'file', 'skipOnEmpty' => true],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'image' => 'Image',
            'type' => 'Type',
            'is_html' => 'Is Html',
            'status' => 'Status',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

    public function getLabelType(){
        $lists = ['1'=>'latest issue', '2'=>'training', '3'=>'services', '4'=>'events', '5'=>'product', '6'=>'client', '7'=>'partner', '8'=>'others'];
        return $lists[$this->type];
    }
}
