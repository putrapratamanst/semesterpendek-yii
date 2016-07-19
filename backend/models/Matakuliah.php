<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "matakuliah".
 *
 * @property integer $id
 * @property string $nama_matakuliah
 * @property string $nilai_matakuliah
 * @property integer $id_dhs
 * @property integer $sks_matakuliah
 *
 * @property Dhs $idDhs
 * @property Semesterpendek[] $semesterpendeks
 */
class Matakuliah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'matakuliah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_matakuliah', 'nilai_matakuliah', 'sks_matakuliah'], 'required'],
            [['id_dhs', 'sks_matakuliah'], 'integer'],
            [['nama_matakuliah'], 'string', 'max' => 30],
            [['nilai_matakuliah'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_matakuliah' => 'Nama Matakuliah',
            'nilai_matakuliah' => 'Nilai Matakuliah',
            'id_dhs' => 'Id Dhs',
            'sks_matakuliah' => 'Sks Matakuliah',
            //  'id_semesterpendek'=> 'Id Semesterpendek',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDhs()
    {
        return $this->hasOne(Dhs::className(), ['id' => 'id_dhs']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSemesterpendeks()
    {
        return $this->hasOne(Semesterpendek::className(), ['id' => 'id_semesterpendek']);
    }
}
