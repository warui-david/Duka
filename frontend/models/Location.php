<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property int $location_id
 * @property float $longitude
 * @property float $latitude
 * @property string $city
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['longitude', 'latitude', 'city'], 'required'],
            [['longitude', 'latitude'], 'number'],
            [['city'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'location_id' => 'Location ID',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'city' => 'City',
        ];
    }
}
