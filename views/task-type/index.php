<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Типы задач';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать типы задачи', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [            
            'id',
            'name',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Управление',
                'template' => '{update} {delete}',                
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
