<?php

namespace frontend\controllers;

use Yii;
use common\models\Task;
use common\models\TaskSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * TaskController implements the CRUD actions for Task model.
 */
class TaskController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
            }

    /**
     * Lists all Task models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TaskSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //check the current time and update plan status
        $date = date('Y-m-d H:i:s');
        $models_exp = Task::find()->where('finish_date < :close_date', [':close_date' => $date])->all();
        $models_go = Task::find()->where('finish_date >= :close_date', [':close_date' => $date])->all();


        if ($models_exp !=0)
        {
            foreach ($models_exp as $model) {
                $model->plan_id = 2;
                $model->save(false); // skipping validation as no user input is involved
            }

            foreach ($models_go as $model) {
                $model->plan_id = 1;
                $model->save(false); // skipping validation as no user input is involved
            }
        }
        else
        {
            Task::updateAll(['plan_id' => 1]);
        }


         return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

        }

     /**
     * Displays a single Task model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Task model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Task();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->status = $model->status_name;
            $model->project_id = $_GET['p_id'];
            $model->save();
          //  var_dump($_GET['id']);
            return $this->redirect(['view', 'id' => $model->id, 'p_id' => $_GET['p_id']]);
        }


        return $this->render('create', [
           'model' => $model,
        ]);
    }

    /**
     * Updates an existing Task model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //rbac
        if (\Yii::$app->user->can('UpdateAdmin', ['task' => $model])) {

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->status = $model->status_name;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id, 'p_id' => $_GET['p_id']]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    } else
        {
            return $this->render('no_access');
        }
    }


    /**
     * Deletes an existing Task model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        //rbac
        if (\Yii::$app->user->can('UpdateAdmin', ['task' => $model])) {
            $this->findModel($id)->delete();

            return $this->redirect(['index', 'p_id' => $_GET['p_id']]);
        } else
        {
            return $this->render('no_access');
        }
    }


    /**
     * Finds the Task model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Task the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Task::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
