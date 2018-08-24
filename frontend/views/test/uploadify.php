<pre name="code" class="php"><?php
	$this->registerJsFile('res/js/jquery.uploadify.min.js', ['depends' => 'yii\web\YiiAsset']);
	?>
	<link rel="stylesheet" type="text/css" href="res/css/uploadify.css">
<form>
    <input id="file_upload" name="file_upload" type="file" multiple="true">
</form>
<input type="text" id ="tu">
<?php
$csrfParam = Yii::$app->request->csrfParam;
$csrfToken = Yii::$app->request->csrfToken;
$uploadUrl = Yii::$app->urlManager->createUrl('/test/upload');
$this->registerJs("
    $('#file_upload').uploadify({
        'debug'    : true,
        'multi'    : false,单图和多图参数设置
        'height'   : 50,
        'width'    :150,
        'buttonText': '上传图片',
        'fileExt': '*.jpg;*.jpeg;*.gif;*.png',
        'formData': {
            '{$csrfParam}': '{$csrfToken}',
        },
        'swf': 'res/js/uploadify.swf',
        'uploader': '{$uploadUrl}',
        'onUploadSuccess' : function(file, data, response) {
            $('#tu').val(data);
             console.log(data);
             var dataObj = eval('('+data+')');
             console.log(dataObj);
        },
        
    });
");
?>