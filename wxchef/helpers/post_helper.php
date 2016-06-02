<?php 
  function curl_post($url='',$data=''){
	 if (empty($url) || empty($data)) {
            return false;
        }
        
        $postUrl = $url;
        $curlPost = $data;
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
         curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json; charset=utf-8',
      'Content-Length: ' . strlen($curlPost)
    )
  );//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
        $data = curl_exec($ch);//运行curl
        curl_close($ch);
        
        return $data; 
	}

function postData($url, $data = array()){      
  $header = array(
    'Content-Type: multipart/form-data',
  );
  $ch = curl_init(); 
  curl_setopt ($ch, CURLOPT_URL, $url);
  curl_setopt( $ch, CURLOPT_HTTPHEADER, $header);
  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
  curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10);
  curl_setopt ($ch, CURLOPT_BINARYTRANSFER,true); 
  //curl_setopt ($ch, CURLOPT_POSTFIELDS, $data);
   curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); 
 // curl_custom_postfields($ch, $data, $data1);
  $dxycontent = curl_exec($ch);
  curl_close($ch);
  return $dxycontent;
}



  // 加入购物车
function array_no_empty($arr) {
        if (is_array($arr)) {
            foreach ( $arr as $k => $v ) {
                if ($v['numbers'] == 0){
                  unset($arr[$k]);
                }
            }
        }
        return $arr;
    }
// 庆典订单
function array_no_cere($arr) {
        if (is_array($arr)) {
            foreach ( $arr as $k => $v ) {
                if ($v['detailsNumber'] == 0){
                  unset($arr[$k]);
                }
            }
        }
        return $arr;
    }
?>