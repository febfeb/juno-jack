<?php

namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

use common\models\Barang;
use common\models\BarangThumbnail;

/**
 * BarangThumbnailController implements the CRUD actions for BarangThumbnail model.
 */
class BarangThumbnailsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all BarangThumbnail models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        /*
        $dataProvider = new ActiveDataProvider([
            'query' => BarangThumbnail::find()->where(['barang_id' => $id]),
        ]);
        */
        $barang = Barang::findOne($id);
        $thumbnails = BarangThumbnail::find()->where(['barang_id' => $id])->all();
        return $this->render('index', [
            'barang' => $barang,
            'thumbnails' => $thumbnails,
        ]);
    }

    /**
     * Displays a single BarangThumbnail model.
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
     * Creates a new BarangThumbnail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $barang = Barang::findOne($id);

        $model = new BarangThumbnail();

        if ($model->load(Yii::$app->request->post())) {
            $gambar = UploadedFile::getInstance($model, 'gambar');
            if (isset($gambar)) {
                $extension = end((explode(".", $gambar->name)));
                $model->url = Yii::$app->security->generateRandomString() . ".{$extension}";
                $path = Yii::getAlias("@thumbnail_upload_path/").$model->url;
                $gambar->saveAs($path);
            }

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Gambar berhasil disimpan');
                return $this->redirect(['index', 'id' => $barang->id]);
            } else {
                Yii::$app->session->setFlash('danger', 'Gambar gagal disimpan. '.var_dump($model->getErrors()));
                return $this->redirect(['index', 'id' => $model->id]);
            }

        } else {
            return $this->render('create', [
                'model' => $model,
                'barang' => $barang,
            ]);
        }
    }

    /**
     * Deletes an existing BarangThumbnail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $thumbnail = BarangThumbnail::findOne($id);
        $barang_id = $thumbnail->barang_id;
        unlink(Yii::getAlias("@thumbnail_upload_path/").$thumbnail->url);

        $this->findModel($id)->delete();

        return $this->redirect(['index', 'id' => $barang_id]);
    }

    /**
     * Finds the BarangThumbnail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BarangThumbnail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BarangThumbnail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
