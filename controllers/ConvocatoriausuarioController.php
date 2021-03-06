<?php

namespace app\controllers;
use Yii;
use app\models\Convocatoria;
use app\models\Postulante;
use app\models\ConvocatoriaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Tipo;
use yii\grid\GridView;
use app\common\components\AccessRule;
use yii\filters\AccessControl;

class ConvocatoriausuarioController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'only' => ['misconvocatorias','postularse'],
                'rules' => [
                    [
                        'actions' => ['misconvocatorias','postularse'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    public function actionMisconvocatorias(){
        $searchModel = new ConvocatoriaSearch();
        $usuario = Yii::$app->user->identity;
        $dataProvider = $searchModel->search_postulante(Yii::$app->request->queryParams,$usuario->id_registro);
        
        //print_r($usuario->id_registro);

        return $this->render('misConvocatorias', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPostularse($id_convocatoria){
        $usuario = Yii::$app->user->identity;
        $model = new Postulante();
        $model->id_convocatoria = $id_convocatoria;
        $model->id_usuario=$usuario->id_registro;
        $model->id_estado=1;//poner constante en estado postulante, cuando est
        $model->orden_merito=0;                
        $model->fecha_postulado=date("Y-m-d");

      	if($model->save()){
      		return $this->redirect(['misconvocatorias']);
        } 
        echo("error");
    }
    public function actionVermas($id_convocatoria) {
        $model = Convocatoria::findOne($id_convocatoria);
        return $this->render('unaconvocatoria', [
            'model' => $model,
        ]);
    }

}