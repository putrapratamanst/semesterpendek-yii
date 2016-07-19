<?php

namespace common\models;

use Yii;
use yii\base\Model;
use backend\models\Matakuliah;
use yii\db\Connection;


/**
 * This is the model class for table "mahasiswa".
 *
 * @property integer $id
 * @property string $nama_mahasiswa
 * @property string $kelas
 * @property string $tanggal_lahir
 * @property integer $tahun_angkatan
 * @property integer $user_id
 *
 * @property Dhs[] $dhs
 */
class Mahasiswa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mahasiswa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_mahasiswa', 'kelas', 'tanggal_lahir', 'tahun_angkatan', 'user_id'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['tahun_angkatan'], 'integer'],
            [['nama_mahasiswa'], 'string', 'max' => 50],
            [['kelas','user_id'], 'string', 'max' => 20],
        //    ['user_id','unique','targetAttribute' =>'user_id'],
            ['user_id', 'unique', 'targetAttribute' => 'user_id', 'message' => 'NPM ini sudah ada.'],


        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_mahasiswa' => 'Nama Mahasiswa',
            'kelas' => 'Kelas',
            'tanggal_lahir' => 'Tanggal Lahir',
            'tahun_angkatan' => 'Tahun Angkatan',
            'user_id' => 'NPM',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDhs()
    {
        return $this->hasMany(Dhs::className(), ['id_mahasiswa' => 'id']);
    }

    public function getLastInsertID($sequenceName = '')
    {
        return $this->getSchema()->getLastInsertID($sequenceName);
    }
}
