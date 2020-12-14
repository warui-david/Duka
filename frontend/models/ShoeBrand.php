<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "shoe_brand".
 *
 * @property int $brand_id
 * @property string $brand_name
 * @property string $brand_logo
 *
 * @property Shoes[] $shoes
 */
class ShoeBrand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shoe_brand';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brand_name'], 'required'],
            [['brand_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'brand_id' => 'Brand ID',
            'brand_name' => 'Brand Name',
        ];
    }

    /**
     * Gets query for [[Shoes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShoes()
    {
        return $this->hasMany(Shoes::className(), ['brand_id' => 'brand_id']);
    }
}
