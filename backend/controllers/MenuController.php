<?php

namespace backend\controllers;

use Yii;
use common\models\Menu;
use common\models\LetakMenu;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * MenuController implements the CRUD actions for Menu model.
 */
class MenuController extends Controller
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
     * Lists all Menu models.
     * @return mixed
     */
    public function actionIndex($lmid)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Menu::find()->where(['letak_menu_id' => $lmid])->orderBy('urutan'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'letakMenu' => LetakMenu::findOne($lmid),
        ]);
    }

    /**
     * Displays a single Menu model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($lmid, $id)
    {
        $letakMenu = LetakMenu::findOne($lmid);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'letakMenu' => $letakMenu,
        ]);
    }

    public function actionUbahUrutan($lmid, $urutan, $action) {
        // menghitung jumlah menu yang berada di LetakMenu yang sama
        $jumlah_menu = Menu::find()->where(['letak_menu_id' => $lmid])->count();

        // jika action = up
        if ($action == 'up') {
            if ($urutan > 1) {
                $menu_before = Menu::find()->where(['letak_menu_id' => $lmid, 'urutan' => $urutan-1])->one();
                $current_menu = Menu::find()->where(['letak_menu_id' => $lmid, 'urutan' => $urutan])->one();

                $menu_before->urutan = intval($menu_before->urutan)+1;
                $menu_before->save();
                $current_menu->urutan = intval($current_menu->urutan)-1;
                $current_menu->save();

                //Yii::$app->session->setFlash('success', 'Urutan halaman berhasil diupdate');
                return $this->redirect(['index', 'lmid' => $lmid]);
            } else {
                Yii::$app->session->setFlash('danger', 'Halaman sudah berada di urutan paling atas');
                return $this->redirect(['index', 'lmid' => $lmid]);
            }
        } else if ($action == 'down') {
            if ($urutan < $jumlah_menu) {
                $menu_after = Menu::find()->where(['letak_menu_id' => $lmid, 'urutan' => $urutan+1])->one();
                $current_menu = Menu::find()->where(['letak_menu_id' => $lmid, 'urutan' => $urutan])->one();

                $menu_after->urutan = intval($menu_after->urutan)-1;
                $menu_after->save();
                $current_menu->urutan = intval($current_menu->urutan)+1;
                $current_menu->save();

                //Yii::$app->session->setFlash('success', 'Urutan halaman berhasil diupdate');
                return $this->redirect(['index', 'lmid' => $lmid]);
            } else {
                Yii::$app->session->setFlash('danger', 'Halaman sudah berada di urutan paling bawah');
                return $this->redirect(['index', 'lmid' => $lmid]);
            }
        }
    }

    /**
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($lmid)
    {
        $model = new Menu();

        if ($model->load(Yii::$app->request->post())) {

            $letakMenu = LetakMenu::findOne($model->letak_menu_id);
            $model->urutan = Menu::find()->where(['letak_menu_id' => $model->letak_menu_id])->count() + 1;

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Halaman berhasil disimpan');
                return $this->redirect(['view', 'lmid' => $letakMenu->id, 'id' => $model->id]);
            } else {
                Yii::$app->session->setFlash('danger', 'Halaman gagal disimpan');
                return $this->redirect(['index', 'lmid' => $letakMenu->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'letakMenu' => LetakMenu::findOne($lmid),
        ]);
    }

    /**
     * Updates an existing Menu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($lmid, $id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $letakMenu = LetakMenu::findOne($model->letak_menu_id);

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Halaman berhasil diupdate');
                return $this->redirect(['view', 'lmid' => $letakMenu->id, 'id' => $model->id]);
            } else {
                Yii::$app->session->setFlash('danger', 'Halaman gagal diupdate');
                return $this->redirect(['index', 'lmid' => $letakMenu->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'letakMenu' => LetakMenu::findOne($lmid),
        ]);
        
    }

    /**
     * Deletes an existing Menu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($lmid, $id, $urutan)
    {
        $this->findModel($id)->delete();

        $menus = Menu::find()->where(['letak_menu_id' => $lmid])->andWhere(['>', 'urutan', $urutan])->all();
        foreach ($menus as $menu) {
            $menu->urutan = $menu->urutan-1;
            $menu->save();
        }

        return $this->redirect(['index', 'lmid' => $lmid]);
    }

    /**
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
