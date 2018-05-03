/**
 * 小程序配置文件
 */

// var host = "apitest.ipaotui.com"
var host = "api.nanhuaren.cn/ajax/wxapp";
var uniacid = 8;
const debug = wx.getStorageSync('debug')
if (debug) {
  host = "api.nanhuaren.cn/ajax/wxapp"
}


module.exports = {
    host, 
    uniacid, 
    qqmapKey: 'FPOBZ-UT2K2-ZFYUC-CX67E-IOOYS-7XFQ6'
}
