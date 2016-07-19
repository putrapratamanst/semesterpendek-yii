<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Approval;

/**
 * ApprovalSearch represents the model behind the search form about `backend\models\Approval`.
 */
class ApprovalSearch extends Approval
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status_approval', 'id_semesterpendek', 'user_id'], 'integer'],
            [['waktu_approval'], 'safe'],
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
        $query = Approval::find();

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
            'status_approval' => $this->status_approval,
            'waktu_approval' => $this->waktu_approval,
            'id_semesterpendek' => $this->id_semesterpendek,
            'user_id' => $this->user_id,
        ]);

        return $dataProvider;
    }
}
