<?php

namespace backend\models;

use webvimark\modules\UserManagement\models\forms\RegistrationForm;
use webvimark\modules\UserManagement\models\User;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\helpers\ArrayHelper;
use Yii;

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
class RegistrationFormProfile extends RegistrationForm
{
    public $first_name;
    public $user_id;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = [
            ['captcha', 'captcha', 'captchaAction'=>'/user-management/auth/captcha'],

            [['username', 'password', 'repeat_password', 'captcha', 'first_name'], 'required'],
            [['username', 'password', 'repeat_password', 'first_name'], 'trim'],

            ['username', 'unique',
                'targetClass'     => 'webvimark\modules\UserManagement\models\User',
                'targetAttribute' => 'username',
            ],

            ['username', 'purgeXSS'],

            ['password', 'string', 'max' => 255],

            ['repeat_password', 'compare', 'compareAttribute'=>'password'],
        ];

        if ( Yii::$app->getModule('user-management')->useEmailAsLogin )
        {
            $rules[] = ['username', 'email'];
        }
        else
        {
            $rules[] = ['username', 'string', 'max' => 50];

            $rules[] = ['username', 'match', 'pattern'=>Yii::$app->getModule('user-management')->registrationRegexp];
            $rules[] = ['username', 'match', 'not'=>true, 'pattern'=>Yii::$app->getModule('user-management')->registrationBlackRegexp];
        }

        return $rules;
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

    /**
     * Look in parent class for details
     *
     * @param User $user
     */
    protected function saveProfile($user)
    {
        $model = new Profile();

        $model->user_id = $user->id;
        $model->first_name = $this->first_name;

        $model->save(false);
    }
}
