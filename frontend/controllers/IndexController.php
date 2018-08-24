<?php
/**
 * Created by 流星liuxingl.
 * Date: 2018/6/25
 * Time: 20:35
 */

namespace frontend\controllers;

use common\models\Brand;
use common\models\Category;
use common\models\Featured;
use common\models\History;
use common\models\OrderDetail;
use common\models\Product;
use yii\data\Pagination;
use yii\web\Response;
use frontend\models\Text;
use yii\web\Controller;

class IndexController extends BaseController
{
	protected $except = ['*'];
    public function actionIndex(){
    	//var_dump(\Yii::$app->cache);

    	//var_dump($_SESSION);
    	 if (\Yii::$app->request->isGet){
		     if (\Yii::$app->user->isGuest) {
			     //echo "XXXX";
			     \Yii::$app->session->setFlash('error', '您尚未登录!');
		     }

			//$cache = \Yii::$app->cache;
		     $key = 'cates';
		     //if (!$cates = $cache->get($key)){
		     	$cates = Category::find()->joinWith('soncate')
			        ->all();
		     //	$cache->set($key,$cates,3600*2);
		     //}
		     $brands = Brand::find()
			     ->limit(8)
			     ->all();

		     // 获取推荐位
		     $featureds = Featured::find()
			     ->where('status = :s and id > :i',[
		     	':s' => 1,
			     ':i' => 1
		     ])->orderBy('listorder asc')->all();
		     //$featureds = \yii\helpers\ArrayHelper::toArray($featureds);
		     //var_dump($featureds);die;

		     // 每刷新一次首页 重置一次 ‘获取更多’ 的  ssion值
		     \Yii::$app->session['istui'] = [
			     'i' => 0
		     ];

		     //var_dump($featureds);die;
			foreach ($featureds as $k => $v){
				//var_dump($v->id);die;
				\Yii::$app->session[$v->title] = [
					'i' => 0
				];
			}


		     //首页推荐
		     $count = Product::find()
			     ->joinWith('featured')
			     ->where([
			     'jd_featured.title' => '首页推荐',
			     ])->count();
		     $pagination = new Pagination([
			    'totalCount' => $count,
			    'pageSize' => 4,
			    'Page' => 0

		     ]);
		     $istui = Product::find()
			     ->joinWith('featured')
			     ->joinWith('brand')
			     ->where([
				     'jd_featured.title' => '首页推荐',
			     ])
			     ->offset($pagination->offset)
			     ->orderBy('id DESC')
			     ->limit($pagination->limit)
			     ->all();
		     //$istui = \yii\helpers\ArrayHelper::toArray($istui);
		     //var_dump($istui);die;


				//循环
		     $arr = array(array());
		     foreach ($featureds as $k => $v){
			     $count = Product::find()
				     ->joinWith('featured')
				     ->where([
					     'jd_featured.title' => $featureds[$k]['title'],
				     ])->count();
			     $pagination = new Pagination([
				     'totalCount' => $count,
				     'pageSize' => 4,
				     'Page' => 0

			     ]);
			     $feas = Product::find()
				     ->joinWith('featured')
				     ->joinWith('brand')
				     ->where([
					     'jd_featured.title' => $featureds[$k]['title'],
				     ])
				     ->offset($pagination->offset)
				     ->orderBy('id DESC')
				     ->limit($pagination->limit)
				     ->all();
			     \Yii::$app->session['istui'] = [
				     'i' => 0
			     ];

			     //$feas = \yii\helpers\ArrayHelper::toArray($feas);
			     //var_dump($feas);die;
			     $arr[$k] = $feas;


		     }
		     // 获取畅销商品 sql Select productid, sum(productnum) from jd_order_detail group by productid ORDER BY sum(productnum) desc limit 0,20
		     $productarr = OrderDetail::find()
			     ->select(['productid','sum(productnum)'])
			     ->groupBy(['productid'])
			     ->orderBy('sum(productnum) desc')
			     ->limit('6')
			     ->asArray()
			     ->all();
		     $changxiao = [];
			foreach ($productarr as $a){
				$changxiao[] = Product::find()
					->where(['id' => $a['productid']])
					->asArray()
					->one();

			}
			$top = $changxiao[0];
			$changxiao1 = array_slice($changxiao,0,3);
			$changxiao2 = array_slice($changxiao,3,3);
		    //var_dump($changxiao2);die;
		     //获取浏览历史
			$historys = History::find()
				->joinWith('product')
				->where(['userid' => \Yii::$app->user->id])
				->orderBy('id desc')
				->limit('20')
				->asArray()
				->all();
			//var_dump($historys);die;
		     $this->layout = "index1";
		     return $this->render('index',[
			     'featureds' => $featureds,
			     'cates' => $cates,
			     'istui' => $istui,
			     'arr' => $arr,
			     'changxiao1' => $changxiao1,
			     'changxiao2' => $changxiao2,
			     'top' => $top,
			     'historys' => $historys,
			     'brands' => $brands,
		     ]);

	    }


	    if (\Yii::$app->request->isAjax){




	    	if (\Yii::$app->request->post('id') == 'istui'){

			    \Yii::$app->session['istui'] = [
				    'i' => \Yii::$app->session['istui']['i'] + 1
			    ];


			    $count = Product::find()
				    ->joinWith('featured')
				    ->where([
					    'jd_featured.title' => '首页推荐',
				    ])->count();
			    //var_dump(\Yii::$app->session['istui']['i']);die;
			    $pagination = new Pagination([
				    'totalCount' => $count,
				    'pageSize' => 4,
				    'Page' => \Yii::$app->session['istui']['i'],


			    ]);
			    $istui = Product::find()
				    ->joinWith('featured')
				    ->joinWith('brand')
				    ->where([
					    'jd_featured.title' => '首页推荐',
				    ])
				    ->offset($pagination->offset)
				    ->orderBy('id DESC')
				    ->limit($pagination->limit)
				    ->all();
			    if(empty($istui)){
				    //\Yii::$app->response->format=Response::FORMAT_JSON;
				    return json_encode(['status' => 0,'msg'=> "没有更多了！"]);
			    }
			    //$istui = \yii\helpers\ArrayHelper::toArray($istui);
			    //var_dump($istui);die;
			    \Yii::$app->response->format=Response::FORMAT_JSON;
			    return ['status' => 1,'msg'=> $istui];


		    }
			    $featureds = Featured::find()
				    ->where('status = :s and id > :i',[
					    ':s' => 1,
					    ':i' => 1
				    ])->orderBy('listorder asc')->all();
			    foreach ($featureds as $k => $v){
				    //var_dump($v[$k]['id']);die;
				    if (\Yii::$app->request->post('featuredid') == $v->id){

					    \Yii::$app->session[$v->title] = [
						    'i' => \Yii::$app->session[$v->title]['i'] + 1
					    ];

					    $count = Product::find()
						    ->joinWith('featured')
						    ->where([
							    'jd_featured.title' => $v->title,
						    ])->count();
					    //var_dump(\Yii::$app->session['istui']['i']);die;
					    $pagination = new Pagination([
						    'totalCount' => $count,
						    'pageSize' => 4,
						    'Page' =>  \Yii::$app->session[$v->title]['i'],

					    ]);
					    $istui = Product::find()
						    ->joinWith('featured')
						    ->where([
							    'jd_featured.title' => $v->title,
						    ])
						    ->offset($pagination->offset)
						    ->orderBy('id DESC')
						    ->limit($pagination->limit)
						    ->all();
					    if(empty($istui)){
						    //\Yii::$app->response->format=Response::FORMAT_JSON;
						    return json_encode(['status' => 0,'msg'=> "没有更多了！"]);
					    }
					    //$istui = \yii\helpers\ArrayHelper::toArray($istui);
					    //var_dump($istui);die;
					    \Yii::$app->response->format=Response::FORMAT_JSON;
					    return ['status' => 1,'msg'=> $istui];


				    }

			    }





	    }


    }
}