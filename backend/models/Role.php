<?php

namespace backend\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "role".
 *
 * @property integer $id
 * @property integer $role_value
 * @property string $role_name
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_value', 'role_name'], 'required'],
            [['role_value'], 'integer'],
            [['role_name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_value' => 'Role Value',
            'role_name' => 'Role Name',
        ];
    }

    public function getUsers()
{
return $this->hasMany(User::className(), ['role_id' => 'role_value']);
}
}
