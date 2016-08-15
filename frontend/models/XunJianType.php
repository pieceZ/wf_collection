<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "xun_jian_type".
 *
 * @property integer $id
 * @property string $code
 * @property string $remark
 * @property string $action_url
 * @property string $support_version
 */
class XunJianType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xun_jian_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['remark','sql_text'], 'string'],
            [['code','rule',  'action_url', 'support_version'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => '巡检编码',
            'rule' => '巡检规则',
            'remark' => '备注',
            'action_url' => '巡检Url',
            'support_version' => '支持版本',
            'sql_text' => 'SQL',
            'level' => '级别'
        ];
    }

    public function getCustomXj()
    {
        return $this->hasMany(CustomXj::className(), ['xj_type_id' => 'id']);
    }
}
