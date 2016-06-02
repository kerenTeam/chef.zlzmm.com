/**
 * @Author: Harris-Aaron
 * @Date:   2016-04-12 10:31:05
 * @Last Modified by:   Harris-Aaron
 * @Last Modified time: 2016-04-20 23:03:55
 */

///
/// 打开页面立即注册分享API    @ titlekf[Math.floor(Math.random()*titlekf.length)];   实现随机标题内容
///
wx.ready(function () {
    ///
    ///  API 开始
    ///
    wx.onMenuShareAppMessage({
      title: title, desc: desc, link: link, imgUrl: imgUrl,
      success: function (res) { alert('微信好友分享成功,获得300积分！'); $('#sharetosql').submit();},
      cancel: function (res) { alert('已取消咯，积分没有获取到'); }   
    });

    wx.onMenuShareTimeline({
      title: title, desc: desc, link: link, imgUrl: imgUrl,
      success: function (res) { alert('微信朋友圈分享成功,获得300积分！'); $('#sharetosql').submit();},
      cancel: function (res) { alert('已取消咯，积分没有获取到'); }
    });

    wx.onMenuShareQQ({
      title: title, desc: desc, link: link, imgUrl: imgUrl,
      success: function (res) { alert('QQ好友分享成功,获得300积分！'); $('#sharetosql').submit();},
      cancel: function (res) { alert('已取消咯，积分没有获取到'); }
    });

    wx.onMenuShareQZone({
      title: title, desc: desc, link: link, imgUrl: imgUrl,
      success: function (res) { alert('QQ空间分享成功,获得300积分！'); $('#sharetosql').submit();},
      cancel: function (res) { alert('已取消咯，积分没有获取到'); }
    });

    wx.onMenuShareWeibo({
      title: title, desc: desc, link: link, imgUrl: imgUrl,
      success: function (res) { alert('微博分享成功,获得300积分！'); $('#sharetosql').submit();},
      cancel: function (res) { alert('已取消咯，积分没有获取到'); }
    });

    ///
    /// 对分享状态不做处理的 API
    ///
    // var shareData = { title: title, desc: desc, link: link, imgUrl: imgUrl };
    // wx.onMenuShareAppMessage(shareData);
    // wx.onMenuShareTimeline(shareData);
    // wx.onMenuShareQQ(shareData);
    // wx.onMenuShareQZone(shareData);
    // wx.onMenuShareWeibo(shareData);

});



