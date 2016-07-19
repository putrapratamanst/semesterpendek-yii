<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "approval".
 *
 * @property integer $id
 * @property integer $status_approval
 * @property string $waktu_approval
 * @property integer $id_semesterpendek
 * @property integer $user_id
 *
 * @property Semesterpendek $idSemesterpendek
 * @property Status $statusApproval
 */
class Approval extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'approval';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_approval', 'waktu_approval', 'id_semesterpendek', 'user_id'], 'required'],
            [['status_approval', 'id_semesterpendek', 'user_id'], 'integer'],
            [['waktu_approval'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_approval' => 'Status Approval',
            'waktu_approval' => 'Waktu Approval',
            'id_semesterpendek' => 'Id Semesterpendek',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSemesterpendek()
    {
        return $this->hasOne(Semesterpendek::className(), ['id' => 'id_semesterpendek']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusApproval()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_approval']);
    }
}
