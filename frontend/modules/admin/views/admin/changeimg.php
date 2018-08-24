<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>修改头像</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.staticfile.org/font-awesome/4.4.0/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/css/style.min-v=4.1.0.css" rel="stylesheet">
     <script type="text/javascript" src="assets/js/swfobject.js"></script>  
    <script type="text/javascript" src="assets/js/fullAvatarEditor.js"></script>  

</head>

<body class="gray-bg">
<div style="width:630px;margin: 0 auto;">
            <h1 style="text-align:center">富头像上传编辑器演示</h1>
            <div>
                <p id="swfContainer">
                    本组件需要安装Flash Player后才可使用，请从<a href="http://www.adobe.com/go/getflashplayer">这里</a>下载安装。
                </p>
            </div>
            <p style="text-align:center"><button type="button" id="upload">自定义上传按钮</button></p>
            <p style="text-align:center">提示：本演示使用的上传接口类型为ASP，如要测试上传，请在服务器环境中演示，更多演示请看<a href="http://www.fullavatareditor.com/demo.html">http://www.fullavatareditor.com/demo.html</a></p>
        </div>
        <script type="text/javascript">
            swfobject.addDomLoadEvent(function () {
                var swf = new fullAvatarEditor("swfContainer", {
                        id: 'swf',
                        upload_url: 'asp/Upload.asp',
                        src_upload:2
                    }, function (msg) {
                        switch(msg.code)
                        {
                            case 1 : alert("页面成功加载了组件！");break;
                            case 2 : alert("已成功加载默认指定的图片到编辑面板。");break;
                            case 3 :
                                if(msg.type == 0)
                                {
                                    alert("摄像头已准备就绪且用户已允许使用。");
                                }
                                else if(msg.type == 1)
                                {
                                    alert("摄像头已准备就绪但用户未允许使用！");
                                }
                                else
                                {
                                    alert("摄像头被占用！");
                                }
                            break;
                            case 5 : 
                                if(msg.type == 0)
                                {
                                    if(msg.content.sourceUrl)
                                    {
                                        alert("原图已成功保存至服务器，url为：\n" +　msg.content.sourceUrl);
                                    }
                                    alert("头像已成功保存至服务器，url为：\n" + msg.content.avatarUrls.join("\n"));
                                }
                            break;
                        }
                    }
                );
                document.getElementById("upload").onclick=function(){
                    swf.call("upload");
                };
            });
            var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
            document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F5f036dd99455cb8adc9de73e2f052f72' type='text/javascript'%3E%3C/script%3E"));
        </script>
<script src="https://cdn.staticfile.org/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="assets/js/content.min-v=1.0.0.js"></script>
<script type="assets/text/javascript" src="plugins/fullavatareditor/scripts/swfobject.js"></script>
<script type="assets/text/javascript" src="plugins/fullavatareditor/scripts/fullAvatarEditor.js"></script>
<script type="assets/text/javascript" src="plugins/fullavatareditor/scripts/jQuery.Cookie.js"></script>
<script type="assets/text/javascript" src="plugins/fullavatareditor/scripts/test.js"></script>

</body>

</html>
