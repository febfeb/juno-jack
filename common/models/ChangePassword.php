<?php
namespace common\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $role_id
 * @property integer $status_id
 * @property integer $user_type_id
 * @property integer $instance_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
# class ChangePassword extends ActiveRecord implements IdentityInterface
class ChangePassword extends Model
{
    public $password_hash;
    public $oldPassword;
    public $newPassword;
    public $confirmPassword;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
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
     * @inheritdoc
     */

    /**
    * validation rules
    */
    public function rules()
    {
        return [
            [['oldPassword', 'newPassword', 'confirmPassword'], 'required'],
            // ['oldPassword', 'compare', 'compareAttribute' => 'password_hash', 'message' => 'Password anda salah'],
            ['confirmPassword', 'compare', 'compareAttribute' => 'newPassword', 'message' => 'Password konfirmasi salah'],
        ];
    }

    /* Your model attribute labels */
    public function attributeLabels()
    {
        return [
            'oldPassword' => 'Password Lama',
            'newPassword' => 'Password Baru',
            'confirmPassword' => 'Konfirmasi Password',
        ];
    }

    public function changePassword()
    {
        $user = User::findOne(Yii::$app->user->identity->id);
        //$user->setPassword($this->newPassword);
        $user->password_hash = Yii::$app->security->generatePasswordHash($this->newPassword);
        echo 'console.log("nama: '.$user->nama.'");';
        echo 'console.log("oldpassword: '.$this->oldPassword.'");';
        echo 'console.log("newpassword: '.$this->newPassword.'");';
        if ($user->save() && Yii::$app->getUser()->logout($user)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status_id' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['auth_key' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status_id' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        if ($timestamp + $expire < time()) {
            // token expired
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status_id' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by auth_key
     *
     * @param string $auth user authentication key
     * @return static|null
     */
    public static function findByAuthKey($auth)
    {
        return static::findOne([
            'auth_key' => $auth,
            'status_id' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
}
