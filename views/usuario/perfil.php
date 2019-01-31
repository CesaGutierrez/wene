<?php

namespace app\controllers;
use Yii;
use yii\helpers\Url;
use app\models\Convocatoria;
use app\models\Postulante;
use app\models\ConvocatoriaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Tipo;
use yii\grid\GridView;
use yii\widgets\DetailView;;
use yii\helpers\Html;
use kartik\file\FileInput;
use yii\widgets\ActiveForm;
?>
<h3 align="center" > Perfil Publico</h3>
<br>

<body>
<div class="col-sm-4" style="align=center;"> 
</div>

<div class="col-sm-4" style="align=center;"> 
        <?= DetailView::widget([
            'model' => $modeluser,
            'attributes' => [
                'nombre',
                'apellido',
                'dni',
                'localidad.nombre',
                ['attribute'=>'fecha_nac',
                        'format'=>['DateTime','php:d-m-Y']
                    ],

            ],
        ]) ?>
    </div>
<br>
<br>    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="col-sm-6" style="align=center;"> 
    <h3 align="center" > Experiencia Laboral</h3>
    <br>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id_experiencia',
                //'id_usuario',
                'titulo',
                'descripcion',

            ],
        ]); ?>
    </div>
    <br>
    <br>
    <div class="col-sm-6" style="align=center;">         
    <h3 align="center" > Aptitudes </h3>
    <br>
    
    <?= GridView::widget([
        'dataProvider' => $dataProviderAptitud,
        'filterModel' => $searchModelAptitud,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_aptitud',
            'tipo',
            'nivel',
            //'id_usuario',
        ],
    ]); ?>
    </div>
    <br>
    <br>
    <div class="col-sm-6" style="align=center;"> 
    <h3 align="center" > Estudios Realizados</h3>
    <br>
    <?= GridView::widget([
        'dataProvider' => $dataProviderEstudio,
        'filterModel' => $searchModelEstudio,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_aptitud',
            'titulo',
            'institucion',
        		
        	['attribute'=>'fecha_egreso',
        			'format'=>['DateTime','php:d-m-Y']
        		],
            //'id_usuario',

        ],
    ]); ?>
    </div>
<br>
<br>
<div class="col-sm-6" style="align=center;"> 
<h3 align="center" > Publicaciones Realizados</h3>
    <br>
    <?= GridView::widget([
        'dataProvider' => $dataProviderPublicacion,
        'filterModel' => $searchModelPublicacion,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_aptitud',
            'titulo',
            ['attribute'=>'fecha',
        			'format'=>['DateTime','php:d-m-Y']
        		],
            //'id_usuario',

        ],
    ]); ?>
</div>

