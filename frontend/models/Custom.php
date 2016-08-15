<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "custom".
 *
 * @property integer $custom_id
 * @property string $custom_code
 * @property string $custom_name
 * @property string $custom_wf_url
 * @property string $custom_erp_url
 * @property string $custom_erp_version
 */
class Custom extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'custom';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['custom_code', 'custom_name', 'custom_wf_url', 'custom_erp_url', 'custom_erp_version'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'custom_id' => '客户ID',
            'custom_code' => '客户编码',
            'custom_name' => '客户名称',
            'custom_wf_url' => '工作流地址',
            'custom_erp_url' => 'Erp地址',
            'custom_erp_version' => 'Erp版本',
        ];
    }

    public function getCustomXj()
    {
        return $this->hasMany(CustomXj::className(), ['custom_id' => 'custom_id']);
    }
}
