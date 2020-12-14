<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "store".
 *
 * @property int $store
 * @property string $store_name
 * @property int $user_id
 * @property int $location_id
 */
class Store extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'store';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['store_name', 'user_id', 'location_id'], 'required'],
            [['user_id', 'location_id'], 'integer'],
            [['store_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'store' => 'Store',
            'store_name' => 'Store Name',
            'user_id' => 'User ID',
            'location_id' => 'Location ID',
        ];
    }
}
