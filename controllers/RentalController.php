<?php

namespace app\controllers;

use Yii;
use app\models\UserRental;
use app\models\UserRentalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use backend\models\Standard;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\filters\AccessControl;

/**
 * UserRentalController implements the CRUD actions for UserRental model.
 */
class RentalController extends Controller {

    public function behaviors() {
        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['post'],
//                ],
//            ],
            'access' => [
                'class' => 'yii\filters\AccessControl',
                'ruleConfig' => [
                    'class' => 'app\components\AccessRule' // <==== HERE IT IS!
                ],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@', 'admin'],
                    ],
                ],
            ],
        ];
    }

//    public function behaviors() {
//        return [
//            'access' => [
//                'class' => 'yii\web\AccessControl',
//                'ruleConfig' => [
//                    'class' => 'app\components\AccessRule' // <==== HERE IT IS!
//                ],
//                'rules' => [
//                    [
//                        'allow' => true,
//                        'roles' => ['moderator', 'admin'],
//                    ],
//                ],
//            ],
//        ];
//    }

    /**
     * Lists all UserRental models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new UserRentalSearch();



        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

//dummy comment
    /**
     * Displays a single UserRental model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UserRental model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new UserRental();
        $model->user_id = Yii::$app->user->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->rental_id]);
        } else {


            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UserRental model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->rental_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UserRental model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserRental model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserRental the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = UserRental::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
