<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $phone
 * @property integer $floor
 * @property integer $cabinet
 * @property integer $create_date
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'phone', 'floor', 'cabinet'], 'required'],
            [['create_date'], 'safe'],
            [['floor', 'cabinet'], 'integer'],
            [['name', 'surname', 'patronymic'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'surname' => Yii::t('app', 'Surname'),
            'patronymic' => Yii::t('app', 'Patronymic'),
            'phone' => Yii::t('app', 'Phone'),
            'floor' => Yii::t('app', 'Floor'),
            'cabinet' => Yii::t('app', 'Cabinet'),
            'create_date' => Yii::t('app', 'Create Date'),
        ];
    }

    /**
     * Save info about changed model
     * @return bool error existance
     */
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert))
        {
            if($this->isNewRecord)
            {
                $this->create_date = time();
            }

            return true;
        }
        else
            return false;
    }
}
