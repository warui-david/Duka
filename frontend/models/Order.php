<?php

namespace frontend\models;
use common\models\User;
use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $order_id
 * @property int $user_id
 * @property string $delivery_address
 * @property string $paymethod
 *
 * @property User $user
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'delivery_address'], 'required'],
            [['user_id'], 'integer'],
            [['paymethod'], 'string'],
            [['delivery_address'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'user_id' => 'User ID',
            'delivery_address' => 'Delivery Address',
            'paymethod' => 'Paymethod',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
