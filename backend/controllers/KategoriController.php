<?php

namespace backend\controllers;

use Yii;
use common\models\Kategori;
use common\models\Url;
use common\components\Slug;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * KategoriController implements the CRUD actions for Kategori model.
 */
class KategoriController extends Controller
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
     * Lists all Kategori models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Kategori::find()->orderBy('parent_id', 'level'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kategori model.
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
     * Creates a new Kategori model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Kategori();

        if ($model->load(Yii::$app->request->post())) {
            $gambar = UploadedFile::getInstance($model, 'gambar');
            if (isset($gambar)) {
                $extension = end((explode(".", $gambar->name)));
                $model->gambar = Yii::$app->security->generateRandomString() . ".{$extension}";
                $path = Yii::$app->params['uploadPathBackendKategori'] . $model->gambar;
                $gambar->saveAs($path);
            }

            if ($model->save()) {
                // insert slug to url
                $url = new Url();
                $url->jenis = 'k';
                $url->data_id = $model->id;
                $url->url = Slug::slugify($model->nama);
                $url->save();

                Yii::$app->session->setFlash('success', 'Kategori berhasil disimpan');
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                unlink('uploads/kategori/'.$model->gambar);

                Yii::$app->session->setFlash('danger', 'Kategori gagal disimpan. '.var_dump($model->errors));
                return $this->redirect(['index', 'id' => $model->id]);
            }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Kategori model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $fileLama = $model->gambar;

        if ($model->load(Yii::$app->request->post())) {
            $gambar = UploadedFile::getInstance($model, 'gambar');
            if (isset($gambar)) {
                $extension = end((explode(".", $gambar->name)));
                $model->gambar = Yii::$app->security->generateRandomString() . ".{$extension}";
                $path = Yii::$app->params['uploadPathBackendKategori'] . $model->gambar;
                $gambar->saveAs($path);
            } else {
                $model->gambar = $fileLama;
            }

            if ($model->save()) {
                // update slug from url
                $url = Url::find()->where(['jenis' => 'k'])->andWhere(['data_id' => $model->id])->one();
                $url->url = Slug::slugify($model->nama);
                $url->save();

                Yii::$app->session->setFlash('success', 'Kategori berhasil diupdate');
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                unlink('uploads/kategori/'.$model->gambar);
                
                Yii::$app->session->setFlash('danger', 'Kategori gagal diupdate. '.var_dump($model->getErrors()));
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Kategori model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $kategori = Kategori::findOne($id);
        unlink('uploads/kategori/'.$kategori->gambar);

        $this->findModel($id)->delete();

        // delete slug from url
        $url = Url::find()->where(['jenis' => 'k'])->andWhere(['data_id' => $id])->one();
        $url->delete;

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kategori model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kategori the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kategori::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
