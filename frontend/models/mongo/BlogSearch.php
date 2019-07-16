<?php

namespace frontend\models\mongo;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\mongo\Blog;

/**
 * BlogSearch represents the model behind the search form about `frontend\models\mongo\Blog`.
 */
class BlogSearch extends Blog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created' ], 'yii\mongodb\validators\MongoDateValidator', 'format' => 'dd-mm-yyyy'],
            [['_id', 'title', 'summary_text', 'full_text', 'uid'], 'safe'],
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
        $query = Blog::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', '_id', $this->_id])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'created', $this->created])
            ->andFilterWhere(['like', 'summary_text', $this->summary_text])
            ->andFilterWhere(['like', 'full_text', $this->full_text])
            ->andFilterWhere(['like', 'uid', $this->uid]);

        return $dataProvider;
    }
}
