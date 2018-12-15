<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CarreraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carreras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carrera-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Carrera', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
    	'layout' => '{items}',
        'filterModel' => $searchModel,
    		
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_carrera',
            'nombre',
            'anios',
            'cant_materias',
            'id_dependencia',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
