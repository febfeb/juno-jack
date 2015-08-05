<?php

namespace backend\controllers;

use Yii;
use common\models\Merk;
use common\models\Url;
use common\components\Slug;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * MerkController implements the CRUD actions for Merk model.
 */
class MerkController extends Controller
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
     * Lists all Merk models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Merk::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Merk model.
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
     * Creates a new Merk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Merk();

        if ($model->load(Yii::$app->request->post())) {
            $gambar = UploadedFile::getInstance($model, 'gambar');
            if (isset($gambar)) {
                $extension = end((explode(".", $gambar->name)));
                $model->gambar = Yii::$app->security->generateRandomString() . ".{$extension}";
                $path = Yii::$app->params['uploadPathBackendMerk'] . $model->gambar;
                $gambar->saveAs($path);
            }

            if ($model->save()) {
                // insert slug to url
                $url = new Url();
                $url->jenis = 'm';
                $url->data_id = $model->id;
                $url->url = Slug::slugify($model->nama);
                $url->save();

                Yii::$app->session->setFlash('success', 'Merk berhasil disimpan');
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                unlink('uploads/kategori/'.$model->gambar);

                Yii::$app->session->setFlash('danger', 'Merk gagal disimpan. '.var_dump($model->getErrors()));
                return $this->redirect(['index', 'id' => $model->id]);
            }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Merk model.
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
                $path = Yii::$app->params['uploadPathBackendMerk'] . $model->gambar;
                $gambar->saveAs($path);
            } else {
                $model->gambar = $fileLama;
            }

            if ($model->save()) {
                // update slug from url
                $url = Url::find()->where(['jenis' => 'm'])->andWhere(['data_id' => $model->id])->one();
                $url->url = Slug::slugify($model->nama);
                $url->save();

                Yii::$app->session->setFlash('success', 'Merk berhasil diupdate');
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                unlink('uploads/kategori/'.$model->gambar);
                
                Yii::$app->session->setFlash('danger', 'Merk gagal diupdate. '.var_dump($model->getErrors()));
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Merk model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $kategori = Merk::findOne($id);
        unlink('uploads/kategori/'.$kategori->gambar);

        $this->findModel($id)->delete();

        // delete slug from url
        $url = Url::find()->where(['jenis' => 'k'])->andWhere(['data_id' => $model->id])->one();
        $url->delete;

        return $this->redirect(['index']);
    }

    /**
     * Finds the Merk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Merk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Merk::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
