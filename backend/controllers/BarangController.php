<?php

namespace backend\controllers;

use common\components\Slug;
use common\models\Barang;
use common\models\Kategori;
use common\models\Url;
use common\models\Warna;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * BarangController implements the CRUD actions for Barang model.
 */
class BarangController extends Controller {

    public function behaviors() {
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
    public function actionIndex() {
        /*
          $dataProvider = new ActiveDataProvider([
          'query' => Barang::find()->select(['nama'])->distinct(),
          ]); */

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
    public function actionView($klp) {
        //$barang = Barang::findOne($id);
        //$thumbnails = BarangThumbnail::find()->where(['barang_id' => $id])->all();

        return $this->render('view', [
                    //'model' => $this->findModel($id),
                    'barang' => Barang::find()->where(['kelompok' => $klp])->one(),
                        //'thumbnails' => $thumbnails,
        ]);
    }

    /**
     * Creates a new Barang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Barang();
        $array_barang = [];
        $array_url = [];
        $id_barang = intval(Barang::find()->max('id')) + 1;

        if ($model->load(Yii::$app->request->post())) {
            foreach ($model->array_warna as $warna) {
                $array_barang[] = [
                    'id' => $id_barang,
                    'nama' => $model->nama,
                    'kode' => $model->kode,
                    'warna' => $warna,
                    'review' => 0,
                    'kelompok' => intval(Barang::find()->max('kelompok')) + 1,
                    'harga_beli' => $model->harga_beli,
                    'harga_normal' => $model->harga_normal,
                    'harga_promo' => $model->harga_promo,
                    'kategori_id' => $model->kategori_id,
                    'overview_1' => $model->overview_1,
                    'overview_2' => $model->overview_2,
                ];

                $slug_warna = strtolower(Warna::findOne($warna)->nama);
                $array_url[] = [
                    'jenis' => 'b',
                    'data_id' => $id_barang,
                    'url' => Slug::slugify($model->nama . '-' . $slug_warna),
                ];

                $id_barang++;
            }

            Yii::$app->db->createCommand()->batchInsert('barang', ['id', 'nama', 'kode', 'warna', 'review', 'kelompok', 'harga_beli', 'harga_normal', 'harga_promo', 'kategori_id', 'overview_1', 'overview_2'], $array_barang)->execute();
            Yii::$app->db->createCommand()->batchInsert('url', ['jenis', 'data_id', 'url'], $array_url)->execute();


            return $this->redirect(['index']);
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
    public function actionUpdate($klp) {
        //$model = $this->findModel($id);
        $model = Barang::find()->where(['kelompok' => $klp])->one();

        if ($model->load(Yii::$app->request->post())) {
            // update slug from url
            /*
              $url = Url::find()->where(['jenis' => 'b'])->andWhere(['data_id' => $model->id])->one();
              $url->url = Slug::slugify($model->nama);
              $url->save();
             */
            return $this->redirect(['view', 'klp' => $model->kelompok]);
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
    public function actionDelete($id) {
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
    protected function findModel($id) {
        if (($model = Barang::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
