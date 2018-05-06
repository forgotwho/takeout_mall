//index.js
//获取应用实例
import {
  getSellers,
  getCatalogs,
  getGoodsByCategory,
} from '../../utils/apis'

var initData = {
  page: 0,
  hasMore: true,
  loading: false,
  list: null
}

Page({
  data: {
    category: [],
    page: 0,
    hasMore: true,
    loading: false
  },
  onLoad: function () {
    this.initAddress()
  },

  initData(cb) {
    this.setData(initData)
    this.loadData(cb)
  },

  initAddress() {
    var that = this
    this.invalidateData()
    getApp().getCurrentAddress(function (address) {
      if (address.addr_id) {
        address['title'] = `${address.addr} ${address.detail}`
      }
      that.setData({
        currentAddress: address
      })
      that.loadData()
    })
  },

  loadData(cb) {
    if (this.data.loading) {
      return;
    }
    var that = this
    var {
      page,
    } = this.data

    this.setData({
      loading: true
    })
    getCatalogs({
      page,
      success(data) {
        var {
          catalogList
        } = that.data

        that.setData({
          category: catalogList ? catalogList: data.list,
          loading: false
        })
      }
    })
    getSellers({
      page,
      success(data) {
        var {
          shopList
        } = that.data

        var list = data.list.map(item => {
          item['distanceFormat'] = (item.distance / 1000).toFixed(2)
          return item
        })
        that.setData({
          shopList: shopList ? shopList.concat(list) : list,
          loading: false
        })
      }
    })

    getGoodsByCategory({
      category_id:0,
      page,
      success(data) {
        var { list } = that.data
        var {
          list: list2, count, page, title
        } = data
        list2 = list2.map(item => {
          return item
        })
        that.setData({
          loading: false,
          goodsList: list ? list.concat(list2) : list2,
          page: page + 1,
          hasMore: data.count == 10,
        })
        cb && cb()
      }
    })
  },
  invalidateData() {
    this.setData({
      page: 0,
      hasMore: true,
      loading: false,
      shopList: null
    })
  },
  onReachBottom(e) {
    if (this.data.hasMore && !this.data.loading) {
      this.loadData()
    }
  },
  onPullDownRefresh() {
    wx.showNavigationBarLoading()
    this.initData(() => {
      wx.hideNavigationBarLoading()
      wx.stopPullDownRefresh()
    })
  },
  callback(address) {
    getApp().setCurrentAddress(address)
    this.initAddress()
  },
  onShareAppMessage() {
    return {
      title: '首页',
      path: '/pages/index/index'
    }
  }
})
