<?php

namespace common\models;

use Yii;
use backend\models\Matakuliah;
/**
 * This is the model class for table "semesterpendek".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $id_matakuliah
 *
 * @property Approval[] $approvals
 * @property Matakuliah $idMatakuliah
 */
class Semesterpendek extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'semesterpendek';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id',], 'required'],
            [['user_id'], 'integer']
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
          ///  'id_matakuliah' => 'Id Matakuliah',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApprovals()
    {
        return $this->hasMany(Approval::className(), ['id_semesterpendek' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
  //  public function getIdMatakuliah()
    //{
      //  return $this->hasOne(Matakuliah::className(), ['id' => 'id_matakuliah']);
  // /  }
  //  public function getMatakuliah()
    //{
      //  return $this->hasMany(Matakuliah::className(), ['id_semesterpendek' => 'id']);
    //}
    public function getMatakuliahs()
    {
        return $this->hasMany(Matakuliah::className(), ['id_semesterpendek' => 'id']);
    }
    
}
