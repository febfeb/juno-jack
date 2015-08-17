<?php

namespace frontend\controllers;

use common\models\LoginForm;
use Yii;
use yii\web\Controller;

class MemberController extends Controller {

    public function beforeAction($action) {
        parent::beforeAction($action);

        if ($action->id == "login") {
            return TRUE;
        } else {
            if (Yii::$app->user->isGuest) {
                return $this->redirect(["login"]);
            } else {
                return TRUE;
            }
        }
    }

    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goHome();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionLogout() {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionCheckout() {
        return $this->render("checkout");
    }

}
