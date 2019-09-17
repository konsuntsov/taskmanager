<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TaskSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'projectId') ?>

    <?= $form->field($model, 'typeId') ?>

    <?= $form->field($model, 'priority') ?>

    <?= $form->field($model, 'authorId') ?>

    <?php // echo $form->field($model, 'executorId') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'dateStart') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'dateEnd') ?>

    <?php // echo $form->field($model, 'dateLimit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
