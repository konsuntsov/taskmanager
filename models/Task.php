<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id Индетификатор
 * @property int $projectId идентификатор проекта
 * @property int $typeId идентификатор типа
 * @property int $priority приоритет
 * @property int $authorId идентификатор автора
 * @property int $executorId идентификатор исполнителя
 * @property int $status статус
 * @property string $name название
 * @property string $dateStart время начала
 * @property string $content содержимое
 * @property string $dateEnd дата конца
 * @property string $dateLimit контрольная дата
 *
 * @property Users $author
 * @property Users $executor
 * @property Project $project
 * @property TaskType $type
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['projectId', 'typeId', 'priority', 'authorId', 'executorId', 'status', 'name', 'dateStart'], 'required'],
            [['projectId', 'typeId', 'priority', 'authorId', 'executorId', 'status'], 'integer'],
            [['dateStart', 'dateEnd', 'dateLimit'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['content'], 'string', 'max' => 2000],
            [['authorId'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['authorId' => 'id']],
            [['executorId'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['executorId' => 'id']],
            [['projectId'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['projectId' => 'id']],
            [['typeId'], 'exist', 'skipOnError' => true, 'targetClass' => TaskType::className(), 'targetAttribute' => ['typeId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Индетификатор',
            'projectId' => 'идентификатор проекта',
            'typeId' => 'идентификатор типа',
            'priority' => 'приоритет',
            'authorId' => 'идентификатор автора',
            'executorId' => 'идентификатор исполнителя',
            'status' => 'статус',
            'name' => 'название',
            'dateStart' => 'время начала',
            'content' => 'содержимое',
            'dateEnd' => 'дата конца',
            'dateLimit' => 'контрольная дата',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Users::className(), ['id' => 'authorId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExecutor()
    {
        return $this->hasOne(Users::className(), ['id' => 'executorId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'projectId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(TaskType::className(), ['id' => 'typeId']);
    }
}
