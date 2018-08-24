<?php

namespace app\modules\admin\controllers;

use common\models\Order;
use yii\web\Controller;

/**
 * Default controller for the `index` module
 */
class IndexController extends BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = "index";
        return $this->render('index');
    }
	public function actionIframe()
	{
		$totalprice = Order::find()
			->select("SUM(totalprice) as total")
			->where(['status' => 2])
			->asArray()
			->all();
		return $this->renderPartial('iframe',[
			'totalprice' => $totalprice[0]['total'],
		]);
	}

}
