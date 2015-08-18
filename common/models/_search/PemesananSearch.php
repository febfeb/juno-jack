<?php

namespace common\models\_search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pemesanan;

/**
 * PemesananSearch represents the model behind the search form about `common\models\Pemesanan`.
 */
class PemesananSearch extends Pemesanan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'total', 'pemesanan_status_id'], 'integer'],
            [['waktu', 'nama_lengkap', 'telepon', 'alamat', 'negara', 'kode_pos'], 'safe'],
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
        $query = Pemesanan::find();

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
            'waktu' => $this->waktu,
            'user_id' => $this->user_id,
            'total' => $this->total,
            'pemesanan_status_id' => $this->pemesanan_status_id,
        ]);

        $query->andFilterWhere(['like', 'nama_lengkap', $this->nama_lengkap])
            ->andFilterWhere(['like', 'telepon', $this->telepon])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'negara', $this->negara])
            ->andFilterWhere(['like', 'kode_pos', $this->kode_pos]);

        return $dataProvider;
    }
}
