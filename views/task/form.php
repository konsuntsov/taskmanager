<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $projects array */
/* @var $types array */
/* @var $users array */
/* @var $priorities array */
/* @var $statuses array */

$this->title = $model->isNewRecord ? 'Создать задачу' : 'Изменить задачу';
$this->params['breadcrumbs'][] = ['label' => 'Задачи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="task-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'projectId')->dropDownList($projects) ?>

        <?= $form->field($model, 'typeId')->dropDownList($types) ?>

        <?= $form->field($model, 'priority')->dropDownList($priorities) ?>        

        <?= $form->field($model, 'executorId')->dropDownList($users) ?>

        <?= $form->field($model, 'status')->dropDownList($statuses) ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>        

        <?= $form->field($model, 'content')->textArea(['maxlength' => 4000]) ?>        

        <?= $form->field($model, 'dateLimit')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
