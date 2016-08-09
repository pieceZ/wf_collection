<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "workflow_log".
 *
 * @property integer $id
 * @property string $LogGuid
 * @property string $DateTime
 * @property string $Message
 * @property string $Type
 * @property string $RequestUrl
 * @property string $ClientIP
 * @property string $RequestType
 * @property string $PostData
 * @property string $Browser
 * @property string $Sessions
 * @property string $Cookies
 * @property string $ClinetCode
 */
class WorkflowLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workflow_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DateTime'], 'safe'],
            [['RequestUrl', 'PostData', 'Sessions', 'Cookies'], 'string'],
            [['LogGuid'], 'string', 'max' => 36],
            [['Message', 'Type', 'ClientIP', 'RequestType', 'Browser', 'ClientCode'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'LogGuid' => 'LogGuid',
            'DateTime' => 'DateTime',
            'Message' => 'Message',
            'Type' => 'Type',
            'RequestUrl' => 'RequestUrl',
            'ClientIP' => 'ClientIp',
            'RequestType' => 'RequestType',
            'PostData' => 'PostData',
            'Browser' => 'Browser',
            'Sessions' => 'Sessions',
            'Cookies' => 'Cookies',
            'ClientCode' => 'ClientCode',
        ];
    }
}
