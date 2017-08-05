<?php
namespace common\models;
 
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\IdentityInterface;
use yii\helpers\Security;
use yii\helpers\ArrayHelper;

use backend\models\UserRole;
use backend\models\UserStatus;
use backend\models\UserType;
 
/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $user_role_id
 * @property integer $user_status_id
 * @property integer $user_type_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
 
class User extends ActiveRecord implements IdentityInterface
{
    
    const STATUS_ACTIVE = 1;
 
    
    public static function tableName()
    {
        return 'user';
    }
 
    /**
    * behaviors
    */
 
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }
 
    /**
    * validation rules
    */
 
    public function rules()
    {
        return [
            ['user_status_id', 'default', 'value' => self::STATUS_ACTIVE],
            [['user_status_id'], 'in', 'range' => array_keys($this->getUserStatusList())],
            ['user_role_id', 'default', 'value' => 1],
            [['user_role_id'], 'in', 'range' => array_keys($this->getUserRoleList())],
            ['user_type_id', 'default', 'value' => 1],
            [['user_type_id'], 'in', 'range' => array_keys($this->getUserTypeList())],
 
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique'],
            ['username', 'string', 'min' => 2, 'max' => 255],
 
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique'],
       ];
    }
    
    /* Your model attribute labels */
 
    public function attributeLabels() 
    {
        return [
            /* Your other attribute labels */
        ];
    }
 
    /**
    * @findIdentity
    */
 
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'user_status_id' => self::STATUS_ACTIVE]);
    }
 
    /**
    * @inheritdoc
    */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
 
    /**
    * Finds user by username
    * @param string $username
    * @return static|null
    */
   
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'user_status_id' => self::STATUS_ACTIVE]);
    }
 
    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
 
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }
 
        return static::findOne([
            'password_reset_token' => $token,
            'user_status_id' => self::STATUS_ACTIVE,
        ]);
    }
 
    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
 
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }
 
    /**
     * @getId
     */
 
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * get user role relationship
     */

    public function getUserRole()
    {
        return $this->hasOne(UserRole::className(), ['id' => 'user_role_id']);
    }

    /**
     * get user role name
     */

    public function getUserRoleName()
    {
        return $this->userRole ? $this->userRole->user_role_name : '- tidak ada role - ';
    }

    /**
     * get user role list
     */

    public static function getUserRoleList()
    {
        $droptions = UserRole::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'id', 'user_role_name');
    }


    /**
     * get user status relation
     */

    public function getUserStatus()
    {
        return $this->hasOne(UserStatus::className(), ['id' => 'user_status_id']);
    }

    /**
     * get user status name
     */

    public function getUserStatusName()
    {
        return $this->userStatus ? $this->userStatus->user_status_name : '- tidak ada status -';
    }

    /**
     * get user status list
     */
    
    public static function getUserStatusList()
    {
        $droptions = UserStatus::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'id', 'user_status_name');
    }

    /** 
     * get user type relation
     */

    public function getUserType()
    {
        return $this->hasOne(UserType::className(), ['id' => 'user_type_id']);
    }

    /**
     * get user type name
     */

    public function getUserTypeName()
    {
        return $this->userType ? this->userType->user_type_name : '- tidak ada tipe user -';
    }

    /**
     * get user type list
     */

    public static function getUserTypeList()
    {
        $droptions = UserType::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'id', 'user_type_name');
    }

    /**
     * get user type id
     */

    public function getUserTypeId()
    {
        return $this->userType ? $this->userType->id, 'none';
    }
 
    /**
     * @getAuthKey
     */
 
    public function getAuthKey()
    {
        return $this->auth_key;
    }
 
    /**
     * @validateAuthKey
     */
 
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
 
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
 
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
 
    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
 
    public function setPassword($password)
    {
         $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
 
    /**
     * Generates "remember me" authentication key
     */
 
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
 
    /**
     * Generates new password reset token
     * broken into 2 lines to avoid wordwrapping
     */
 
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString()  . '_' . time();
    }
 
    /**
     * Removes password reset token
     */
 
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    
}
