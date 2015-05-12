<?php
/**
  * wechat php test
  */

define("TOKEN", "czdpcw");
$wechatObj = new wechatCallbackapiTest();
$wechatObj->responseMsg();
//$wechatObj->valid();

class wechatCallbackapiTest
{
    /*public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }*/

    public function responseMsg()
    {
        //get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        //extract post data
        if (!empty($postStr)){
                libxml_disable_entity_loader(true);//安全性
                $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $RX_TYPE = trim($postObj->MsgType);
                switch($RX_TYPE)
                {
                    case "text":
                        $resultStr = $this->handleText($postObj);
                        break;
                    case "event":
                        $resultStr = $this->handleEvent($postObj);
                        break;
                    default:
                        $resultStr = "Unknow msg type: ".$RX_TYPE;
                        break;
                }
                echo $resultStr;
        }else {
            echo "";
            exit;
        }
    }

    public function handleText($postObj)//自动回复文本信息
    {
        $fromUsername = $postObj->FromUserName;
        $toUsername = $postObj->ToUserName;
        $keyword = trim($postObj->Content);
        $time = time();
        $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[%s]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    <FuncFlag>0</FuncFlag>
                    </xml>";             
        if(!empty( $keyword!=="1" &&$keyword!=="2" &&$keyword!=="3" &&$keyword!=="4" &&$keyword!=="5"))
        {
            $msgType = "text";
            $contentStr = "您好，请回复数字选择信息：\n   1.公司简介   \n   2.公司业务   \n   3.公司地址   \n   4.联系我们\n       相信专业的力量\n       东平助您成功！";
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
            echo $resultStr;
        }
       elseif($keyword=="1"){
            $msgType = "text";
            $contentStr = "长治市东平财务是一家专注于企业财务外包的顾问公司，成立于2011年，是经长治市城区工商局正式批准成立的财税代理机构，目前已经成长为长治地区优秀的对企业提供财务服务的公司。\n服务范围涵盖企业工商服务、代理记账、会计审计、纳税筹划、审计评估等一体化业务。\n多年来，东平财务陪伴上百家中小企业共同发展，积累了丰富的行业经验与坚实的技术操作机制。\n       相信专业的力量\n       东平助您成功！";
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
            echo $resultStr;       
       }
       elseif($keyword=="2"){
            $msgType = "text";
            $contentStr = "服务范围涵盖企业工商服务、代理记账、会计审计、纳税筹划、审计评估等一体化业务。\n东平财务也是长治地区速达财务软件总代理，涵盖进销存管理软件、财务管理软件、ERP管理软件。\n       相信专业的力量\n       东平助您成功！";
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
            echo $resultStr;       
       }
       elseif($keyword=="3"){
            $msgType = "text";
            $contentStr = "公司地址：\n一部:长治市紫金西街城区工商局一楼\n二部:长治市政务大厅东侧屈家庄一排\n       相信专业的力量\n       东平助您成功！";
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
            echo $resultStr;       
       }
       elseif($keyword=="4"){
            $msgType = "text";
            $contentStr = "公司电话：\n0355-2110444\n吴经理：13834306483\n公司官网：\nhttp://www.czdpcw.icoc.cc/\n       相信专业的力量\n       东平助您成功！";
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
            echo $resultStr;       
       }
        else{
            echo "Input something...";
        }
    }

    public function handleEvent($object)//关注事件
    {
        $contentStr = "";
        switch ($object->Event)
        {
            case "subscribe":
                $contentStr = "长治东平财务是一家专业从事长治企业财务外包的综合服务机构，主营代理记账、工商企业注册、财务会计顾问、纳税筹划、审计评估等一体化业务\n公司地址：\n一部:长治市紫金西街城区工商局一楼\n二部:长治市政务大厅东侧屈家庄一排\n公司官网:http://www.czdpcw.icoc.cc/\n财富热线:\n0355-2110444\n吴经理:\n13834306483\n       相信专业的力量\n       东平助您成功！";
                break;
            default :
                $contentStr = "Unknow Event: ".$object->Event;
                break;
        }
        $resultStr = $this->responseText($object, $contentStr);
        return $resultStr;
    }
    
    public function responseText($object, $content, $flag=0)//发布文本信息
    {
        $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[text]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    <FuncFlag>%d</FuncFlag>
                    </xml>";//
        $resultStr = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $content, $flag);
        return $resultStr;
    }



    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];    
                
        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );
        
        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }
}

?>