<?php

namespace backend\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "status".
 *
 * @property integer $id
 * @property integer $status_value
 * @property string $status_name
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_value', 'status_name'], 'required'],
            [['status_value'], 'integer'],
            [['status_name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_value' => 'Status Value',
            'status_name' => 'Status Name',
        ];
    }
    public function getUsers()
{
return $this->hasMany(User::className(), ['status_id' => 'status_value']);
}
}
