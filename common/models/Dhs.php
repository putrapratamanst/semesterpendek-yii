<?php

namespace common\models;

use Yii;
use backend\models\Matakuliah;
/**
 * This is the model class for table "dhs".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $semester
 *
 * @property Matakuliah[] $matakuliahs
 */
class Dhs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dhs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'semester'], 'required'],
            [['user_id', 'semester'], 'integer']
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
            'semester' => 'Semester',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatakuliahs()
    {
        return $this->hasMany(Matakuliah::className(), ['id_dhs' => 'id']);
    }
}
