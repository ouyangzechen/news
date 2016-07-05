<?php
    require_once './newsData.php';
    header("Content-type: text/html; charset=utf-8");

    if(time()-$createTime>60*60*24) {

        $url ="http://weixin.sogou.com/weixin?type=1&query=%E6%B5%B7%E6%99%AE%E6%B4%9B%E6%96%AF";
        $data=file_get_contents($url);
//        echo $data;exit;
        preg_match("/gotourl\('(.*)',event,this/",$data,$str_array);
        if(!count($str_array)>0){
            exit;
        }
        $url =$str_array[1];

        $url=str_replace("amp;","",$url);

        $data=trim(file_get_contents($url));

//        $data ="{list:[{comm_msg_info:{id:1000000010,type:49,datetime:1467625652,fakeid:3015049318,status:2,content:},app_msg_ext_info:{title:菠萝|&nbsp;今天轰动全球的抗癌新药Niraparib到底是个啥？,digest:我很想问朱莉：如果能重来，你还会做同样的决定吗？,content:,fileid:403855435,content_url:\\/s?timestamp=1467690161&src=3&ver=1&signature=1t22brT1q3ITxNIdN0fDVyAqZAbQkDzTqFSTibz1SqiJ*TSdjvyptE4WTCE6r8ZmB7zgiIbFWzWG48vtOsf4xkvWGXHs7pyKcm9hcsGhlX9MKLkuToc-Jrfg*gUsSS1zvslLwqw3YrNdncna0lm5gk0UI7OujwsBN0uXROKYRvc=,source_url:http:\\/\\/mp.weixin.qq.com\\/s?__biz=MzI1MjMyMzIxMw==&mid=2247483820&idx=1&sn=8eb9a8157e91b863c5daa20d3d85a4a9&scene=24&srcid=0704twFnWQnGEdwSSt3VUlk2#wechat_redirect,cover:http:\\/\\/mmbiz.qpic.cn\\/mmbiz\\/iaJU94oZ03r6kSLXkpfoSzBOJvsh7Q69riaLyE5iaKhJficzYuxZlBvxvpMsicpWPZica9tftxhozPXBRyWUqBwFvLZw\\/0?wx_fmt=jpeg,subtype:0,is_multi:0,multi_app_msg_item_list:[],author:菠萝,copyright_stat:101}},{comm_msg_info:{id:1000000009,type:49,datetime:1467434907,fakeid:3015049318,status:2,content:},app_msg_ext_info:{title:【会议】2016CSMO，海普洛斯卫星会，iPad大奖等您来！,digest:海普洛斯将在CSMO2016举办卫星会，期待您的参与。让我们携手，共同推动中国抗癌事业的发展。,content:,fileid:504520004,content_url:\\/s?timestamp=1467690161&src=3&ver=1&signature=1t22brT1q3ITxNIdN0fDVyAqZAbQkDzTqFSTibz1SqiJ*TSdjvyptE4WTCE6r8ZmB7zgiIbFWzWG48vtOsf4xnDxBS2GGOLKRu94*2PXmEOVCqcC6Z6AHDxBeZqtPmy6uocfOWVfbGfWpTtzkXUqtCfG8*Q7BU5xvwmHYKNUk60=,source_url:http:\\/\\/www.medmeeting.org\\/minisite\\/index\\/2730,cover:http:\\/\\/mmbiz.qpic.cn\\/mmbiz\\/iaJU94oZ03r4b0F7BvBFCN9ufT8u4mUOwPrKLJYvPSCfC1ER8dKUG5JhiaPkAWRiar3OxwFDHl6kJqaoiabrtLUQrg\\/0?wx_fmt=jpeg,subtype:0,is_multi:0,multi_app_msg_item_list:[],author:海普洛斯HaploX,copyright_stat:100}},{comm_msg_info:{id:1000000008,type:49,datetime:1467287198,fakeid:3015049318,status:2,content:},app_msg_ext_info:{title:IVD及精准医疗产业与投资联盟成立，海普洛斯拟任理事,digest:IVD及精准医疗产业与投资联盟成立，海普洛斯拟任理事。IVD独角兽项目路演，鑫诺美迪、丹娜生物分获冠亚军，微策生物、默禾医疗获季军。,content:,fileid:504519990,content_url:\\/s?timestamp=1467690161&src=3&ver=1&signature=1t22brT1q3ITxNIdN0fDVyAqZAbQkDzTqFSTibz1SqiJ*TSdjvyptE4WTCE6r8ZmB7zgiIbFWzWG48vtOsf4xvGD5ShMneRtQWzFWy1bIwtMh1y2MGIiAQvHHQl9exozpLSdsKze8SSOVUoJscj14tNEwbIYXpP-YaErcXInK-s=,source_url:,cover:https:\\/\\/mmbiz.qlogo.cn\\/mmbiz\\/iaJU94oZ03r76HnGpnCjy2gRNot3Z2JM0AKSea7LvPZr5IEyqz6ZY8xE3p4bWS3GHicQ78ksmc8uF4qq5rCfVKicA\\/0?wx_fmt=jpeg,subtype:0,is_multi:0,multi_app_msg_item_list:[],author:海普洛斯HaploX,copyright_stat:100}},{comm_msg_info:{id:1000000007,type:49,datetime:1467193182,fakeid:3015049318,status:2,content:},app_msg_ext_info:{title:【论坛】第三届IVD&nbsp;CEO论坛第一天，大咖云集！,digest:第三届中国IVD产业投资与并购CEO论坛第一天，现场大咖云集！,content:,fileid:504519984,content_url:\\/s?timestamp=1467690161&src=3&ver=1&signature=1t22brT1q3ITxNIdN0fDVyAqZAbQkDzTqFSTibz1SqiJ*TSdjvyptE4WTCE6r8ZmB7zgiIbFWzWG48vtOsf4xnMpybsajX6JIOLz-0F2jlnv3Zfuy1TDs7Z54j95afktl8C4vyNQTfkb*RDvUh4zNjauaVclQFTODIG5m61byUg=,source_url:,cover:http:\\/\\/mmbiz.qpic.cn\\/mmbiz\\/iaJU94oZ03r5ichtGg037mPlxxDn8EXm74rZaRnjfW3NkqJNR1FZOF2v6xtwOibmCFOWD7Jex5ib56VfTBPSiaXuA8g\\/0?wx_fmt=jpeg,subtype:0,is_multi:1,multi_app_msg_item_list:[{title:喜大普奔！这种特效药有望防止BRCA1突变携带者患上乳腺癌！而且6年前就上市了！,digest:如果这个研究早些出来，安吉丽娜朱莉可能就不会选择切除乳腺了噜。,content:,fileid:206768095,content_url:\\/s?timestamp=1467690161&src=3&ver=1&signature=1t22brT1q3ITxNIdN0fDVyAqZAbQkDzTqFSTibz1SqiJ*TSdjvyptE4WTCE6r8ZmB7zgiIbFWzWG48vtOsf4xnMpybsajX6JIOLz-0F2jlkrt3c3y5zHxJo5pdxhni6QJRYPym-KQtS4Tn2lbuavXMq7tgbcLk1qsXYGIG9yDeQ=,source_url:,cover:http:\\/\\/mmbiz.qpic.cn\\/mmbiz\\/iaJU94oZ03r5ichtGg037mPlxxDn8EXm74TWInThSkmLAPc2q63t4JjDuiaEpX9afQVZLaic6w66CDjeJ4xHQrfkTQ\\/0?wx_fmt=jpeg,author:熊猫君,copyright_stat:11}],author:,copyright_stat:100}},{comm_msg_info:{id:1000000006,type:49,datetime:1467121064,fakeid:3015049318,status:2,content:},app_msg_ext_info:{title:【论坛】海普洛斯CEO许明炎博士将出席第三届中国IVD产业投资与并购CEO论坛,digest:6月29日14:30~15:30的圆桌讨论，及6月30日9:00~9:20的项目路演，海普洛斯CEO许明炎博士期待与您相见！,content:,fileid:404507118,content_url:\\/s?timestamp=1467690161&src=3&ver=1&signature=1t22brT1q3ITxNIdN0fDVyAqZAbQkDzTqFSTibz1SqiJ*TSdjvyptE4WTCE6r8ZmB7zgiIbFWzWG48vtOsf4xuJc-s1sHpMaOUNneUcEK9P2vDBhYH3SDdBuvmfHncVzUmpmYS3ByC43WSE4mRHeuBF3kUsrgJrwLZHVeGCdOAI=,source_url:,cover:http:\\/\\/mmbiz.qpic.cn\\/mmbiz\\/iaJU94oZ03r4icTRB2ySOgAjlqjTckdcUT6p86H4eaibwu75cU7wIq7icfVycNVuOpBGqvS1rLePAPFAClTJlMTr8g\\/0?wx_fmt=jpeg,subtype:0,is_multi:0,multi_app_msg_item_list:[],author:,copyright_stat:100}},{comm_msg_info:{id:1000000005,type:49,datetime:1467027513,fakeid:3015049318,status:2,content:},app_msg_ext_info:{title:【ASCO&nbsp;2016】胃癌免疫疗法黑马--Claudin18.2抗体IMAB362,digest:IMAB362联合一线化疗会带来PFS和OS上的临床相关获益，存在良好风险\\/获益属性。,content:,fileid:504519853,content_url:\\/s?timestamp=1467690161&src=3&ver=1&signature=1t22brT1q3ITxNIdN0fDVyAqZAbQkDzTqFSTibz1SqiJ*TSdjvyptE4WTCE6r8ZmB7zgiIbFWzWG48vtOsf4xq8yGz9E8lwh-O2079J-6PEGPX9NgpvuyJ8IwzyeUkRgukPQ7o6Mz*7QnuTgq4Y6CHFbzo0RNlQzoFhYpZa3DOU=,source_url:,cover:http:\\/\\/mmbiz.qpic.cn\\/mmbiz\\/iaJU94oZ03r4PibPKY2g4UJibqBp7dQltbKEhyWcGFoXgPYFe2pBNfqfkNauExTsEud3LGfMWvdadib8GSOWq7liatg\\/0?wx_fmt=jpeg,subtype:0,is_multi:0,multi_app_msg_item_list:[],author:Lily,copyright_stat:11}},{comm_msg_info:{id:1000000004,type:49,datetime:1466920012,fakeid:3015049318,status:2,content:},app_msg_ext_info:{title:医师节谈医生：感谢您数年如一日的坚守,digest:是平凡人，也是天使。,content:,fileid:504519934,content_url:\\/s?timestamp=1467690161&src=3&ver=1&signature=1t22brT1q3ITxNIdN0fDVyAqZAbQkDzTqFSTibz1SqiJ*TSdjvyptE4WTCE6r8ZmB7zgiIbFWzWG48vtOsf4xr0Y2lUIS5vmKVUKekgq87R7f1COqRPfd5moMvEqDixBedNqwbHOm2p-Rq08HYM4IA8nL7NRXHMthpNSYYO3KYY=,source_url:,cover:http:\\/\\/mmbiz.qpic.cn\\/mmbiz\\/iaJU94oZ03r729NTGic4FYllGt3uOMqybwNAdenq8r5QHkGQvhlS48mD14mlFa61R42Pvg7cW0kvziaoPRS9U2DMA\\/0?wx_fmt=jpeg,subtype:0,is_multi:0,multi_app_msg_item_list:[],author:,copyright_stat:100}},{comm_msg_info:{id:1000000003,type:49,datetime:1466864495,fakeid:3015049318,status:2,content:},app_msg_ext_info:{title:【会议】HaploX&nbsp;CEO&nbsp;许明炎在中美论坛的演讲现场座无虚席,digest:许明炎在第七届中美临床与转化医学国际论坛分论坛二上演讲，现场座无虚席，过道上也站着听讲的人。本届论坛大咖云集，海普洛斯发起的“万人癌症基因测序计划”受到关注。,content:,fileid:504519960,content_url:\\/s?timestamp=1467690161&src=3&ver=1&signature=1t22brT1q3ITxNIdN0fDVyAqZAbQkDzTqFSTibz1SqiJ*TSdjvyptE4WTCE6r8ZmB7zgiIbFWzWG48vtOsf4xnwUNPcnYRlM4Ks2wqpCrnPZoix8LUtjsyC5vuPWiSvYUhKMJET450E02q0zV2vJIRZ3wXMtXGVMNWjsUjqJUcU=,source_url:,cover:http:\\/\\/mmbiz.qpic.cn\\/mmbiz\\/iaJU94oZ03r5COrmWVEjkzNDruZJwALsQ2c1JJHRLIJs5Ks8D29jaE87ic4ucjlRJiaIEibGpoZicZ2eibvZrAU2GqyA\\/0?wx_fmt=jpeg,subtype:0,is_multi:0,multi_app_msg_item_list:[],author:Lily,copyright_stat:11}},{comm_msg_info:{id:1000000002,type:49,datetime:1466761744,fakeid:3015049318,status:2,content:},app_msg_ext_info:{title:【ASCO&nbsp;2016】聚焦中国：结直肠癌原发肿瘤位置或与贝伐珠疗效有关,digest:右半结肠癌患者不能从贝伐珠单抗添加中取得生存获益，在右半和左半结肠癌之间对贝伐珠单抗的不同响应并非是由常规临床和病理特征引起的。,content:,fileid:504519866,content_url:\\/s?timestamp=1467690161&src=3&ver=1&signature=1t22brT1q3ITxNIdN0fDVyAqZAbQkDzTqFSTibz1SqiJ*TSdjvyptE4WTCE6r8ZmB7zgiIbFWzWG48vtOsf4xqOp61bLapJPiV7CQBBTA6qrSAKywZEdM65OJw0COJxjm1ChpsyR-1reB61WuCw042l9fkArNReiIdylpjt59qs=,source_url:http:\\/\\/news.medlive.cn\\/cancer\\/info-progress\\/show-114752_53.html,cover:http:\\/\\/mmbiz.qpic.cn\\/mmbiz\\/iaJU94oZ03r5wgWYKY2QcWEjLpj79H1aicMBGEcPO6PSejOejwC6CnBJmj76z0W9Pcas8rs2eibHEhVnJ3giaqsYyQ\\/0?wx_fmt=jpeg,subtype:0,is_multi:0,multi_app_msg_item_list:[],author:,copyright_stat:100}},{comm_msg_info:{id:1000000001,type:49,datetime:1466676686,fakeid:3015049318,status:2,content:},app_msg_ext_info:{title:【JuliaCon】HaploX组织的Julia&nbsp;shenzhen&nbsp;meetup在JuliaCon上展示！,digest:HaploX组织的Julia&nbsp;shenzhen&nbsp;meetup在JuliaCon上展示！归队吧，程序员们，你们即将改变世界！,content:,fileid:504519519,content_url:\\/s?timestamp=1467690161&src=3&ver=1&signature=1t22brT1q3ITxNIdN0fDVyAqZAbQkDzTqFSTibz1SqiJ*TSdjvyptE4WTCE6r8ZmB7zgiIbFWzWG48vtOsf4xmyoaY*qfXem5iztf9QwysnocQxKqxR0Qsk8XT0BIKt8waIfiXGMu6T1bJJffM9VGZyMjCLjBJPTAPOy8WqixSY=,source_url:,cover:http:\\/\\/mmsns.qpic.cn\\/mmsns\\/iaJU94oZ03r6ZmpVUaJLsjibrBUQ18esDbzUyMICIXDj8yFA9Qx2icsdg\\/0,subtype:0,is_multi:0,multi_app_msg_item_list:[],author:Lily,copyright_stat:100}}]}";

        $data=str_replace("&quot;","",$data);
        $data=str_replace("quot;","",$data);
        $data=str_replace("&nbsp;","",$data);
        $data=trim($data);
        $data=str_replace("wx_fmt=","wx_fmt.",$data);
        $data=str_replace('\\\\\/','/',$data);
//        $data=str_replace("","",$data);
        preg_match_all('/{title:(.*?)digest:(.*?)content:,fileid:(.*?),content_url:(.*?),source_url:(.*?),cover:(.*?),subtype/',$data,$str_array);
        $arrayDict =array(1=>"title",2=>"digest",3=>"fileid",4=>"content_url",5=>"source_url",6=>"cover");
        $array = array();
        for($i=1;$i<count($str_array);$i++){
            for($j=0;$j<count($str_array[$i]);$j++){
                $array[$j][$arrayDict[$i]]=$str_array[$i][$j];
            }
        }
//        var_dump(json_encode($array));exit;
        $json=json_encode($array);
        $json=str_replace("wx_fmt=","wx_fmt.",$json);
        $json=str_replace('\\','',$json);
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



