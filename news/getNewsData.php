<?php
require_once './newsData.php';
header("Content-type: text/html; charset=utf-8");
    if(!isset($createTime)||time()-$createTime>60*60*1) {

        $url ="http://weixin.sogou.com/weixin?type=1&query=%E6%B5%B7%E6%99%AE%E6%B4%9B%E6%96%AF";
        $data=file_get_contents($url);

        preg_match("/gotourl\('(.*)',event,this/",$data,$str_array);
        if(!count($str_array)>0){
            exit;
        }
        $url =$str_array[1];

//echo $url;

        $url = str_replace('&amp;', '&', $url);
//$url = 'http://mp.weixin.qq.com/profile?src=3&timestamp=1467682135&ver=1&signature=klwAfc5RUSxsmHSqZyam9nrClhy6muENJeYZzjln*b4pCsXTSzAobOIo8R8L-3z98vljOP3JTCZSd1G4TwQ7Rw==';

        $content = file_get_contents($url);

        $json='';
        $startPos = strpos($content, 'var msgList = ');
        if($startPos > 10)
        {
            $endPos = strpos($content, "}}]}';");

            $json = trim(substr($content, $startPos+15, $endPos-($startPos+11)));

            $json = json_decode( htmlspecialchars_decode($json) )->list;

            $array=array();
            for($i=0;$i<count($json);$i++){
                $array[$i]['title'] = $json[$i]->app_msg_ext_info->title;
                $array[$i]['digest'] = $json[$i]->app_msg_ext_info->digest;
                $array[$i]['content_url'] =str_replace('\/','/','http://mp.weixin.qq.com'.$json[$i]->app_msg_ext_info->content_url);
                $array[$i]['cover'] = str_replace('\/','/',$json[$i]->app_msg_ext_info->cover);

            }
            $json =json_encode($array);
        }
//      preg_match_all('/{title:(.*?)digest:(.*?)content:,fileid:(.*?),content_url:(.*?),source_url:(.*?),cover:(.*?),subtype/',$data,$str_array);

        write($json);
        echo $json;
        exit;

    }else{

        echo $json;
        exit;
    }



    function post($url,$data){
        //1 初始化
        $ch = curl_init();
        //2设置参数
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_HEADER,0);
        //禁止SSL
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,true);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);

        //3  执行
        $output = curl_exec($ch);

        if($output === false)
            echo 'error:'.curl_error($ch);
        echo $output;
        //关闭
        curl_close($ch);

    }
    function get($url){
        $data = file_get_contents($url);
        return $data;
    }
    function write($str){
        //将获取到的AccessToken 和创建时间写入AccessToken.php文件中
        $file = fopen("./newsData.php",'w');

        if(!(@fwrite($file,"<?php\r\n")))
        {

            echo "文件输入错误";
            //当文件输入错误时退出并删除文件；
            unlink("./newsData.php");
            exit;
        }

        if(!(@fwrite($file,'$createTime='.time().';'."\r\n")))
        {

            echo "文件输入错误";
            //当文件输入错误时退出并删除文件；
            unlink('./newsData.php');
            exit;
        }

        if(!(@fwrite($file,'$json='."'".$str."'".";"."\r\n")))
        {

            echo "文件输入错误";
            //当文件输入错误时退出并删除文件；
            unlink('./newsData.php');
            exit;
        }

        if(!(@fwrite($file,"?>\r\n")))
        {

            echo "文件输入错误";
            //当文件输入错误时退出并删除文件；
            unlink('./newsData.php');
            exit;
        }
        //关闭文件
        fclose($file);
    }



