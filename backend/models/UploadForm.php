<?php
/**
 * Created by PhpStorm.
 * User: jacklu
 * Date: 2019/4/15
 * Time: 5:12 PM
 */

namespace backend\models;


use Faker\Provider\Image;
use yii\base\Model;
use yii\helpers\FileHelper;

/**
 * 上传文件必须配置两个参数
 *
 * 1. 在 `/common/config/bootstrap.php` 文件中,配置`@uploadPath`的值,例如:`dirname(dirname(__DIR__)) . '/frontend/web/uploads'`
 *
 * 2. 在 `/backend/config/params.php` 文件中,配置`assetDomain`的值,例如:`http://localhost/yii2/advanced/frontend/web/uploads`
 *
 * Class UploadForm
 * @package backend\models
 */
class UploadForm extends Model
{
    public $imageFile;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg'],
        ];
    }

    /**
     * @return array|bool
     * @throws \yii\base\Exception
     */
    public function upload()
    {
        if ($this->validate()) {
            $path = \Yii::getAlias('@uploadPath') . '/' . date('Ymd');
            if (!is_dir($path) || !is_writable($path)) {
                FileHelper::createDirectory($path, 0777, true);
            }
            $filePath = $path . '/' . \Yii::$app->request->post('model', '') . '_' . md5(uniqid() . mt_rand(1000, 99999999)) . '.' . $this->imageFile->extension;
            if ($this->imageFile->saveAS($filePath)) {
                // 将上传成功后的图片信息保存到数据库
                $imageUrl = $this->parseImageUrl($filePath);
                $imageModel = new Article();
                $imageModel->url = $imageUrl;
                $imageModel->created_at = time();
                $imageModel->status = 0;
                $imageModel->module = \Yii::$app->request->post('model', '');

                $imageModel->save(false);
                $imageId = \Yii::$app->db->getLastInsertID();

                return ['imageUrl' => $imageUrl, 'imageId' => $imageId];
            }
        }
        return false;
    }

    /**
     * 这里在 upload 中定义了上传目录根目录别名，以及图片域名
     * 将/var/www/html/advanced/frontend/web/uploads/20160626/file.png 转化为 http://statics.gushanxia.com/uploads/20160626/file.png
     * format:http://domain/path/file.extension
     * @param $filePath
     * @return string
     */
    private function parseImageUrl($filePath)
    {
        if (strpos($filePath, \Yii::getAlias('@uploadPath')) !== false) {
            return \Yii::$app->params['assetDomain'] . str_replace(\Yii::getAlias('@uploadPath'), '', $filePath);
        } else {
            return $filePath;
        }
    }
}