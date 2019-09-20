<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $id Идентификатор
 * @property string $name Наименование
 *
 * @property Task[] $tasks
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'name' => 'Наименование',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['projectId' => 'id']);
    }
    /**
     * Получить массив проектов в формате [id => name]
     * @return array
     */
    public static function getList(): array {
        $list = [];
        $models = Project::find()->orderBy('id')->all();
        foreach($models as $model) {
            $list[$model->id] = $model->id.' - '.$model->name;
        }
        return $list;
    }
}
