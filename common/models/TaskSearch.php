<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Task;

/**
 * TaskSearch represents the model behind the search form of `common\models\Task`.
 */
class TaskSearch extends Task
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'implementer', 'creator', 'plan_id', 'project_id'], 'integer'],
            [['task_name', 'description', 'date_creation', 'date_update', 'finish_date', 'status_name', 'implementer_name', 'project_id'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Task::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'status_name' => $this->status_name,
            'date_creation' => $this->date_creation,
            'date_update' => $this->date_update,
            'finish_date' => $this->finish_date,
            'implementer' => $this->implementer,
            'creator' => $this->creator,
            'implementer_name' => $this->implementer_name,
        ]);

        $query->andFilterWhere(['like', 'task_name', $this->task_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'plan_id', $this->plan_id])
            ->andFilterWhere(['like', 'project_id', $_GET['p_id']]);

        return $dataProvider;
    }
}
