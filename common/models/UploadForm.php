<?php
/**
 * Created by 流星liuxingl.
 * Date: 2018/7/8
 * Time: 19:01
 */

namespace common\models;


use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
	/**
	 * @var UploadedFile
	 */
	public $imageFile;

	public function rules()
	{
		return [
			[['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
		];
	}

	public function upload()
	{
		if ($this->validate()) {
			$this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
			return true;
		} else {
			return false;
		}
	}
}