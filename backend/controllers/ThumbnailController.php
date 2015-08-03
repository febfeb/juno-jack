<?php

namespace backend\controllers;

use Yii;
use backend\models\BarangThumbnail;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BarangThumbnailController implements the CRUD actions for BarangThumbnail model.
 */
class BarangThumbnailController extends Controller
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
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => BarangThumbnail::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
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

    public function actionViewLaporan($id)
    {
        $model = $this->findModel($id);
        $path = Yii::$app->params['uploadPathBackendBarangThumbnail'] . $model->file_laporan;

        if(file_exists($path)) {
            header('Content-type: application/pdf');
            header('Content-Disposition: inline; filename="'.$path.'"');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($path));
            header('Accept-Ranges: bytes');
            readfile($path);
        } else {
            // PDF doesn't exist so throw an error or something
        }
    }

    public function actionViewSk($id)
    {
        $model = $this->findModel($id);
        $path = 'uploads/kegiatan/' . $model->sk;

        if(file_exists($path)) {
            return '<img src="'.$path.'" />';
        } else {
            // PDF doesn't exist so throw an error or something
        }
    }

    /**
     * Creates a new BarangThumbnail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BarangThumbnail();

        if ($model->load(Yii::$app->request->post())) {
            $sk = UploadedFile::getInstance($model, 'sk');
            if (isset($sk)) {
                $extension = end((explode(".", $sk->name)));
                $model->sk = Yii::$app->security->generateRandomString() . ".{$extension}";
                $path = Yii::$app->params['uploadPathBackendBarangThumbnail'] . $model->sk;
                $sk->saveAs($path);
            }

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'BarangThumbnail dosen berhasil disimpan');
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                Yii::$app->session->setFlash('danger', 'BarangThumbnail Dosen gagal disimpan. '.var_dump($model->getErrors()));
                return $this->redirect(['index']);
            }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BarangThumbnail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $fileLama = $model->file_laporan;
        $skLama = $model->sk;

        if ($model->load(Yii::$app->request->post())) {
            $file_laporan = UploadedFile::getInstance($model, 'file_laporan');
            if (isset($file_laporan)) {
                $extension = end((explode(".", $file_laporan->name)));
                $model->file_laporan = Yii::$app->security->generateRandomString() . ".{$extension}";
                $path = Yii::$app->params['uploadPathBackendBarangThumbnail'] . $model->file_laporan;
                $file_laporan->saveAs($path);
            } else {
                $model->file_laporan = $fileLama;
            }

            $sk = UploadedFile::getInstance($model, 'sk');
            if (isset($sk)) {
                $extension = end((explode(".", $sk->name)));
                $model->sk = Yii::$app->security->generateRandomString() . ".{$extension}";
                $path = Yii::$app->params['uploadPathBackendBarangThumbnail'] . $model->sk;
                $sk->saveAs($path);
            } else {
                $model->sk = $skLama;
            }

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'BarangThumbnail dosen berhasil diupdate');
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                Yii::$app->session->setFlash('danger', 'BarangThumbnail dosen gagal diupdate. '.var_dump($model->getErrors()));
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
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
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
