<?php

namespace backend\controllers;

use Yii;
use common\models\Barang;
use common\models\BarangThumbnail;
use common\models\Url;
use common\components\Slug;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BarangController implements the CRUD actions for Barang model.
 */
class BarangController extends Controller
{
    public function behaviors()
    {
        return [
        /*
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            */
        ];
    }

    /**
     * Lists all Barang models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Barang::find()->select(['nama'])->distinct(),
        ]);

        return $this->render('index', [
            //'dataProvider' => $dataProvider,
            'barangs' => Barang::find()->select(['kelompok'])->distinct()->all()
        ]);
    }

    /**
     * Displays a single Barang model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $barang = Barang::findOne($id);
        $thumbnails = BarangThumbnail::find()->where(['barang_id' => $id])->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'barang' => $barang,
            'thumbnails' => $thumbnails,
        ]);
    }

    /**
     * Creates a new Barang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Barang();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // insert slug to url
            $url = new Url();
            $url->jenis = 'b';
            $url->data_id = $model->id;
            $url->url = Slug::slugify($model->nama);
            $url->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Barang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // update slug from url
            $url = Url::find()->where(['jenis' => 'b'])->andWhere(['data_id' => $model->id])->one();
            $url->url = Slug::slugify($model->nama);
            $url->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Barang model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        // delete slug from url
        $url = Url::find()->where(['jenis' => 'k'])->andWhere(['data_id' => $model->id])->one();
        $url->delete;

        return $this->redirect(['index']);
    }

    /**
     * Finds the Barang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Barang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Barang::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
