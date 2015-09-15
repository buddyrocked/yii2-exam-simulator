<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property string $image
 * @property integer $type
 * @property integer $is_html
 * @property integer $status
 * @property string $seo_title
 * @property string $seo_keyword
 * @property string $seo_description
 * @property string $created
 * @property string $updated
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'type', 'is_html'], 'required'],
            [['content'], 'string'],
            [['type', 'is_html', 'status'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['title', 'slug', 'image', 'seo_title', 'seo_keyword', 'seo_description'], 'string', 'max' => 255]
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
            'slug' => 'Slug',
            'content' => 'Content',
            'image' => 'Image',
            'type' => 'Type',
            'is_html' => 'Is Html',
            'status' => 'Status',
            'seo_title' => 'Seo Title',
            'seo_keyword' => 'Seo Keyword',
            'seo_description' => 'Seo Description',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }
}
