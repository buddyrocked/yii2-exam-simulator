<?php

namespace backend\models;

use webvimark\modules\UserManagement\models\User;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "profile".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $surname
 * @property integer $display_surname_preference
 * @property string $suffix
 * @property integer $gender_id
 * @property string $dob
 * @property string $pob
 * @property string $job
 * @property string $street1
 * @property string $street2
 * @property string $city
 * @property integer $province_id
 * @property integer $country_id
 * @property string $postal_code
 * @property integer $status
 * @property string $photo
 * @property string $created
 * @property string $updated
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name'], 'required'],
            [['user_id', 'display_surname_preference', 'gender_id', 'province_id', 'country_id', 'status'], 'integer'],
            [['dob', 'created', 'updated'], 'safe'],
            [['street1', 'street2', 'city', 'postal_code'], 'string'],
            [['first_name', 'middle_name', 'surname', 'suffix', 'pob', 'job', 'photo'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'surname' => 'Surname',
            'display_surname_preference' => 'Display Surname Preference',
            'suffix' => 'Suffix',
            'gender_id' => 'Gender ID',
            'dob' => 'Dob',
            'pob' => 'Pob',
            'job' => 'Job',
            'street1' => 'Street1',
            'street2' => 'Street2',
            'city' => 'City',
            'province_id' => 'Province ID',
            'country_id' => 'Country ID',
            'postal_code' => 'Postal Code',
            'status' => 'Status',
            'photo' => 'Photo',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

    public function getUser(){
        return $this->hasOne(User::className(), ['id'=>'user_id']);
    }
}
