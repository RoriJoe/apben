<?php

class TagihanController extends Controller {

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
                'actions' => array('create', 'update', 'admin', 'delete', 'rekap', 'suboutput_dropdown', 'mak_dropdown', 'sptb'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionSuboutput_dropdown($id) {
        echo CHtml::dropDownList('Tagihan[kode_suboutput]', null, Suboutput::getDropDownList($id), array('class' => 'span5', 'maxlength' => 25));
    }

    public function actionMak_dropdown() {
        $output = @$_GET['o'];
        $suboutput = @$_GET['s'];
        echo CHtml::dropDownList('Tagihan[kode_mak]', null, Mak::getDropDownList($output, $suboutput), array('class' => 'span5', 'maxlength' => 25, 'options' => Mak::getDropDownListOptions($output, $suboutput)));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionSptb($id) {
        $dataProvider = new CActiveDataProvider('Tagihan', array('criteria' => array(
                'condition' => 'id = ' . $id
        )));

        $tagihan = Tagihan::model()->find(array('condition' => 'id = ' . $id));
        $dipa = Dipa::model()->find(array('condition' => 'uid = ' . $tagihan->dipa_uid, 'order' => 'uid desc'));

        $this->render('sptb', array(
            'dataProvider' => $dataProvider,
            'tagihan' => $tagihan,
            'dipa' => $dipa
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Tagihan;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Tagihan'])) {
            $model->attributes = $_POST['Tagihan'];
            if ($model->save())
                $this->redirect(array('admin'));
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

        if (isset($_POST['Tagihan'])) {
            $model->attributes = $_POST['Tagihan'];
            if ($model->save())
                $this->redirect(array('/tagihan/sptb/' . $model->id));
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
        $dataProvider = new CActiveDataProvider('Tagihan');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionRekap() {
        $model = new Tagihan('rekap');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['Tagihan']))
            $model->attributes = $_GET['Tagihan'];

        $this->render('rekap', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Tagihan('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['Tagihan']))
            $model->attributes = $_GET['Tagihan'];

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
        $model = Tagihan::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'tagihan-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
