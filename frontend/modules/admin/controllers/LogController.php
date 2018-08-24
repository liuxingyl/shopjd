<?php
/**
 * Created by 流星liuxingl.
 * Date: 2018/6/26
 * Time: 13:06
 */

namespace app\modules\admin\controllers;

use app\modules\admin\models\Rbac;
use app\modules\admin\models\Admin;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\Response;
use app\modules\admin\models\Log;
class LogController extends BaseController
{

    
    public function actionLst()
    {
    	
        $this->layout = 'iframe';

        //var_dump($admins);die;

        $log = Log::find();
        $count = $log->count();

        $pagination = new Pagination([
            'totalCount' => $count,
            'pageSize' => 15,

            ]);

        $logs = $log->offset($pagination->offset)
        	->orderBy('create_time desc')
            ->limit($pagination->limit)
            ->all();
        //var_dump($admin);die;
        return $this->render('Lst',[
            'logs' => $logs,
            'pagination' =>$pagination,
            'count' => $count,
        ]);
    }

}