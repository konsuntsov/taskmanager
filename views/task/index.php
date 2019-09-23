<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $projects array */
/* @var $types array */
/* @var $users array */
/* @var $priorities array */
/* @var $statuses array */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать задачу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [            

            'id',
            [
                'attribute' => 'projectId',
                'value' => function(app\models\Task $model) {
                    return $model->project->name;
                },
                'filter' => $projects
            ],
            [
                'attribute' => 'typeId',
                'value' => function(app\models\Task $model) {
                    return $model->type->name;
                }
            ],            
            [
                'attribute' => 'priority',
                'value' => function(app\models\Task $model)  use($priorities) {
                    return $priorities[$model->priority];
                },
                'filter' => $priorities
            ],
            [
                'attribute' => 'authorId',
                'value' => function(app\models\Task $model) {
                    return $model->author->surname.' '.$model->author->name;
                }
            ],
            [
                'attribute' => 'executorId',
                'value' => function(app\models\Task $model) {
                    return $model->executor->surname.' '.$model->executor->name;
                }
            ],            
            'status',
            'name',
            'dateStart',
            'content',
            'dateEnd',
            'dateLimit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
