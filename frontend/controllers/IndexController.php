<?php
/**
 * Created by PhpStorm.
 * User: jacklu
 * Date: 2018/4/13
 * Time: 下午1:00
 */

namespace frontend\controllers;


use common\models\Article;
use common\models\Comment;
use common\models\Contact;
use yii\bootstrap\ActiveForm;
use yii\data\Pagination;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;

class IndexController extends Controller
{
    public $layout = 'index_layout';

    public function actions()
    {
        return [
//            'error' => [
//                'class' => 'yii\web\ErrorAction',
//            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'maxLength' => 4,
                'minLength' => 4
            ],
        ];
    }

    /**
     * 首页
     * @return string
     */
    public function actionIndex()
    {
        $model = new Article();
        $page = new Pagination(['totalCount' => $model::find()->count()]);
        $list = $model::find()
            ->select('a.id,a.cover_image,a.title,a.summary,a.read_count,a.status,a.sort,a.created_at,a.updated_at')
            ->offset($page->offset)
            ->limit($page->limit)
            ->alias('a')
            ->where(['status' => 1])
            ->orderBy(['a.created_at' => SORT_DESC])
            ->all();
        return $this->render('index', [
            'model' => $model,
            'pages' => $page,
            'list' => $list
        ]);
    }

    /**
     * 文章
     * @return string
     */
    public function actionArticle()
    {
        $id = \Yii::$app->request->get('id');
        if (!$id) {
            return $this->redirect(['not-found']);
        }
        $model = new Article();
        $article = $model::findOne($id);
        $prev_article = $model::find()
            ->select('id,title')
            ->where(['status' => '1'])
            ->andwhere(['>', 'id', $id])
            ->orderBy(['id' => SORT_ASC])
            ->limit(1)
            ->asArray()
            ->one();
        $next_article = $model::find()
            ->select('id,title')
            ->where(['status' => '1'])
            ->andwhere(['<', 'id', $id])
            ->orderBy(['id' => SORT_DESC])
            ->limit(1)
            ->asArray()
            ->one();
        $page['prev_article'] = [
            'url' => !$prev_article ? 'javascript:;' : Url::current(['id' => $prev_article['id']]),
            'title' => !$prev_article ? '没有了' : $prev_article['title'],
        ];

        $page['next_article'] = [
            'url' => !$next_article ? 'javascript:;' : Url::current(['id' => $next_article['id']]),
            'title' => !$next_article ? '没有了' : $next_article['title'],
        ];
        return $this->render('article', [
            'article' => $article,
            'page' => $page,
            'model' => new Comment()
        ]);
    }

    /**
     * 归档
     * @return string
     */
    public function actionArchives()
    {
        $model = new Article();
        $years = $model::find()
            ->select('year')
            ->groupBy('year')
            ->where(['status' => 1])
            ->orderBy(['year' => SORT_DESC])
            ->all();
        return $this->render('archives', [
            'years' => $years
        ]);
    }

    /**
     * 关于
     * @return string
     */
    public function actionAbout()
    {
        $model = new Contact();
        return $this->render('about', [
            'model' => $model,
        ]);
    }

    /**
     * 联系我
     * @return array|bool
     */
    public function actionContact()
    {
        $model = new Contact();
        if ($model->load(\Yii::$app->request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ['status' => $model->save()];
        }
        return false;
    }

    /**
     * @return array|bool
     */
    public function actionContactValidate()
    {
        $model = new Contact();
        if (\Yii::$app->request->isAjax && $model->load(\Yii::$app->request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        return false;
    }

    /**
     * @return array|bool
     */
    public function actionComment()
    {
        $model = new Comment();
        if ($model->load(\Yii::$app->request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ['status' => $model->save()];
        }
        return false;
    }

    /**
     * @return array|bool
     */
    public function actionCommentValidate()
    {
        $model = new Contact();
        if (\Yii::$app->request->isAjax && $model->load(\Yii::$app->request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        return false;
    }

    /**
     * @return string
     */
    public function actionNotFound()
    {
        $this->layout = false;
        return $this->render('404');
    }
}