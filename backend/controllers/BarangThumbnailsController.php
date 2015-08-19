<?php

namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use harrytang\fineuploader\FineuploaderHandler;

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
    public function actionIndex($klp, $warna = null)
    {
        /*
        $dataProvider = new ActiveDataProvider([
            'query' => BarangThumbnail::find()->where(['barang_id' => $id]),
        ]);
        */
        $barangs = Barang::find()->where(['kelompok' => $klp])->all();
        //$thumbnails = BarangThumbnail::find()->where(['barang_id' => $id])->all();

        $model = new BarangThumbnail();
        /*
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
                return $this->redirect(['index', 'klp' => $model->barang->kelompok, 'warna' => $model->barang->barangWarna->nama]);
            } else {
                Yii::$app->session->setFlash('danger', 'Gambar gagal disimpan. '.var_dump($model->getErrors()));
                return $this->redirect(['index', 'klp' => $model->barang->kelompok]);
            }
        }
        */

        return $this->render('index', [
            'firstBarang' => $barangs[0],
            'barangs' => $barangs,
            'newThumbnails' => new BarangThumbnail(),
            //'thumbnails' => $thumbnails,
        ]);
    }

    public function actionFineUpload()
    {

        $uploader = new FineuploaderHandler();
        $uploader->allowedExtensions = ['jpeg', 'jpg', 'png', 'bmp', 'gif']; // all files types allowed by default
        //$uploader->sizeLimit = 5;
        $uploader->inputName = "qqfile"; // matches Fine Uploader's default inputName value by default
        //$uploader->chunksFolder = "chunks";
        if (Yii::$app->request->isPost) {
            // upload file
            $result = $uploader->handleUpload("uploads/thumbnails");
            if (isset($result['success']) && $result['success'] == true) {
                // do something more
                echo json_encode($result);
            }
            echo json_encode($result);
        }
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
    public function actionOldCreate($id)
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

    public function actionCreate() {
        if (empty($_FILES['gambar'])) {
            echo json_encode(['error' => 'No files found for upload.']); // You can add any exception here
            return;
        }

        $gambars = $_FILES['gambar']; // ambil gambar[]. ingat, nama file harus array biar bis multiple
        $success = null;
        $filepath = []; // Path to store file, it must be array for multiple file upload
        $paths = [];
        $filenames = $gambars['name'];
        for ($i = 0; $i < count($filenames); $i++) {
            $ext = explode(".", basename($filenames[$i]));
            $url = Yii::$app->security->generateRandomString().'.'.$ext[1];
            $target = Yii::getAlias("@thumbnail_upload_path/").$url;
            if (move_uploaded_file($gambars['tmp_name'][$i], $target)) {
                $success = true;
                $paths[] = $target;
            } else {
                $success = false;
                break;
            }

            // Insert into database
            $thumbnail = new BarangThumbnail();
            $thumbnail->barang_id = Yii::$app->request->post('barang_id');
            $thumbnail->url = $url;
            $thumbnail->save();
        }

        if ($success === true) {
            $output = json_encode(['error' => 'File uploaded.']);
        } elseif ($success === false) {
            $output = json_encode(['error' => 'Error while upload image']);
            foreach($paths as $file) {
                unlink($file);
            }
        } else {
            $output = json_encode(['error' => 'No files were processed']);
        }

        echo $output;
        return;
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
        $klp = $thumbnail->barang->kelompok;
        unlink(Yii::getAlias("@thumbnail_upload_path/").$thumbnail->url);

        $this->findModel($id)->delete();

        return $this->redirect(['index', 'klp' => $klp, 'warna' => $thumbnail->barang->barangWarna->nama]);
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
