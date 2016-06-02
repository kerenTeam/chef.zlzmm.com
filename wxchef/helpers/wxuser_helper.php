<?php 

//页面跳转后根据获得到的code来获取用户的info
function getUserInfo($code = NULL)
{
  if ($code && $_SESSION['update_code']) {
    $access_token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID."&secret=".APPSECRET."&code=".$code."&grant_type=authorization_code";
    $access_token_json = $this->indexwxapi->wxHttpsRequest($access_token_url);
    $access_token_array = json_decode($access_token_json, true);
    $_SESSION['openid'] = $access_token_array['openid'];

    $userinfo_url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$_SESSION['update_code']."&openid=".$_SESSION['openid'];
    $userinfo_json = $this->indexwxapi->wxHttpsRequest($userinfo_url);
    $userinfo_array = json_decode($userinfo_json, true);
  }
  if ($userinfo_array['errcode'] == 40001) {
  $this->indexwxapi->wxAccessToken(APPID,APPSECRET);
  $userinfo = getUserInfo($code);
  }else{
  $userinfo = getUserInfo($code);
  }
  return $userinfo;
} 