<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "custom_xj".
 *
 * @property integer $id
 * @property integer $custom_id
 * @property integer $xj_type_id
 * @property string $custom_name
 */
class CustomXj extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'custom_xj';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['custom_id', 'xj_type_id'], 'required'],
            [['custom_id', 'xj_type_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'custom_id' => 'Custom ID',
            'xj_type_id' => 'Xj Type ID',
            'custom_name' => 'Xj Type ID',
        ];
    }

    public function getCustom()
    {
        return $this->hasMany(Custom::className(), ['custom_id' => 'custom_id']);
    }

    public function getXjType()
    {
        return $this->hasMany(XunJianType::className(), ['id' => 'xj_type_id']);
    }
}
