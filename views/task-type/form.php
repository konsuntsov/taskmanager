<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TaskType */
/* @var $form yii\widgets\ActiveForm */

$this->title = $model->isNewRecord ? 'Создать тип задачи' : 'Изменить тип задачи';

$this->params['breadcrumbs'][] = ['label' => 'Типы задач', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-type-create">

    <h1><?= Html::encode($this->title) ?></h1>        

    <div class="task-type-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
