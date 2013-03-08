<?php

class DipaController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/main';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'index', 'view', 'kalkulasi', 'saverev'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionKalkulasi($id) {
        $model = $this->loadModel($id);
        $model->calculate();

        $this->redirect(array('/dipa/view/' . $model->uid));
    }

    public function actionSaverev($id) {
        $model = $this->loadModel($id);
        $model->saveRev();

        $this->redirect(array('/dipa/view/' . $model->uid));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {

        if ($id == 0) {
            $terbaru = Dipa::model()->find(array('order' => 'uid desc'));
            $this->redirect(array('/dipa/view/' . $terbaru->uid));
        }

        $model = Dipa::model()->find(array('condition' => 'uid = ' . $id));
        
        if ($model == null) {
            $terbaru = Dipa::model()->find(array('order' => 'uid desc'));
            $this->redirect(array('/dipa/view/' . $terbaru->uid));
        }
        
        
        $readonly = false;
        if (isset($_GET['rev']) && is_numeric($_GET['rev']) && $_GET['rev'] < $model->version) {
            $model = Dipa::model()->resetScope(true)->find(
                    array('condition' => 'uid = ' . $id . ' and version = ' . $_GET['rev']
            ));
            $readonly = true;
        }


        if (@$_GET['co'] == 1) {
            Yii::app()->clientScript->scriptMap = array(
                'jquery.js' => false,
                'jquery.ba-bbq.js' => false,
                'jquery.yiilistview.js' => false
            );
            $html = $this->renderPartial('view', array(
                'model' => $model,
                'readonly' => $readonly,
                    ), true, true);

            echo $html;
        } else {
            $this->render('view', array(
                'model' => $model,
                'readonly' => $readonly,
            ));
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Dipa;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Dipa'])) {
            $model->attributes = $_POST['Dipa'];
            if ($model->save()) {
                $model->uid = $model->id;
                $model->save();
                $this->redirect(array('/dipa/view/' . $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Dipa'])) {
            $model->attributes = $_POST['Dipa'];
            if ($model->save())
                $this->redirect(array('/dipa/view/' . $model->uid));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Dipa');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Dipa('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Dipa']))
            $model->attributes = $_GET['Dipa'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Dipa::model()->findByPk($id);

        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'dipa-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
