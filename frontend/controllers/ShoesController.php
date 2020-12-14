<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Shoes;
use frontend\models\Images;
use frontend\models\Order;
use frontend\models\ShoesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use frontend\models\ShoeBrand;
use frontend\models\ShoeCategory;

/**
 * ShoesController implements the CRUD actions for Shoes model.
 */
class ShoesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Shoes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ShoesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Shoes model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Shoes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Shoes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['addimage', 'shoe_id' => $model->shoe_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionAddimage($shoe_id)
    {
        $model = new Images();
        if ($model->load(Yii::$app->request->post())) {
            //generates images with unique names
            $imageName = bin2hex(openssl_random_pseudo_bytes(10));
            $model->img_path = UploadedFile::getInstance($model, 'img_path');
            //saves file in the root directory
            $model->img_path->saveAs('images/' . $imageName . '.' . $model->img_path->extension);
            //save in the db
            $model->img_path = 'images/' . $imageName . '.' . $model->img_path->extension;
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('addimage', [
            'model' => $model,
            'shoe_id' => $shoe_id,
        ]);
    }

    public function actionAddcategory()
    {
        $model = new \frontend\models\ShoeCategory();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->save()) {
                return $this->redirect(['create']);
            }
        }

        return $this->renderAjax('addcategory', [
            'model' => $model,
        ]);
    }

    public function actionAddbrand()
{
    $model = new \frontend\models\ShoeBrand();

    if ($model->load(Yii::$app->request->post())) {
        if ($model->validate() && $model->save()) {
            return $this->redirect(['create']);
        
        }
    }

    return $this->renderAjax('addbrand', [
        'model' => $model,
    ]);
}


// public function actionAddtocart($shoe_id)
// {
//     $model = new \frontend\models\Cart();

//     if ($model->load(Yii::$app->request->post())) {
//         if ($model->validate() && $model->save()) {
//             return $this->redirect(['site/index']);
        
//         }
//     }

//     return $this->render('addtocart', [
//         'model' => $model,
//         'shoe_id' => $shoe_id,
//     ]);
// }

public function actionOrder()
{
    $model = new \frontend\models\Order();

    if ($model->load(Yii::$app->request->post())) {
        if ($model->validate() && $model->save()) {
            return $this->redirect(['site/index']);
        
        }
    }

    return $this->render('order', [
        'model' => $model,
    ]);
}
    /**
     * Updates an existing Shoes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->shoe_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Shoes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Shoes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Shoes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Shoes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
