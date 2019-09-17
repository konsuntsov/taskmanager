<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id идентификатор
 * @property string $email адрес email
 * @property string $password пароль
 * @property string $surname фамилия
 * @property string $name имя
 * @property string $patronymic отчество
 *
 * @property Task[] $tasks
 * @property Task[] $tasks0
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password', 'surname', 'name'], 'required'],
            [['email'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 25],
            [['surname', 'name', 'patronymic'], 'string', 'max' => 50],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'идентификатор',
            'email' => 'адрес email',
            'password' => 'пароль',
            'surname' => 'фамилия',
            'name' => 'имя',
            'patronymic' => 'отчество',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['authorId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks0()
    {
        return $this->hasMany(Task::className(), ['executorId' => 'id']);
    }
}
