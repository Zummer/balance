<?php

namespace app\controllers;

use app\models\Comments;
use app\models\TransferForm;
use app\services\TransferService;
use Yii;
use app\models\Users;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
{
    private $transferService;

    public function __construct($id, $module, TransferService $transferService, $config = [])
    {
        $this->transferService = $transferService;
        parent::__construct($id, $module, $config = []);
    }

    /**
     * @inheritdoc
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
        ];
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Users::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionCommentCreate($id)
    {
        $model = new Comments($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['comments/view', 'id' => $model->id]);
        } else {
            return $this->render('comment', [
                'model' => $model,
            ]);
        }
    }

    public function actionTransferCreate($id)
    {
        $model = $this->findModel($id);
        $form = new TransferForm($id);

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
                $this->transferService->transferBalance(
                    $model->id,
                    $form->user_to_id,
                    $form->sum
                );
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('transfer', [
                'model' => $model,
                'transferForm' => $form,
            ]);
        }
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
