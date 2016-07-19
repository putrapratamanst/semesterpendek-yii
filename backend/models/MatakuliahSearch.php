<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Matakuliah;

/**
 * MatakuliahSearch represents the model behind the search form about `backend\models\Matakuliah`.
 */
class MatakuliahSearch extends Matakuliah
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_dhs', 'sks_matakuliah'], 'integer'],
            [['nama_matakuliah', 'nilai_matakuliah'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Matakuliah::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_dhs' => $this->id_dhs,
            'sks_matakuliah' => $this->sks_matakuliah,
        ]);

        $query->andFilterWhere(['like', 'nama_matakuliah', $this->nama_matakuliah])
            ->andFilterWhere(['like', 'nilai_matakuliah', $this->nilai_matakuliah]);

        return $dataProvider;
    }
}
