/**
 * 管理所有的接口请求
 */
import axios from 'axios';
import Qs from 'qs'

/*******************************拦截器 start*******************************/
// 添加请求拦截器
axios.interceptors.request.use(function (config) {
    // 在发送请求之前做些什么
    console.log('请求之前');
    return config;
}, function (error) {
    // 对请求错误做些什么
    console.log('请求之前出错');
    // return Promise.reject(error);
});

// 添加响应拦截器
axios.interceptors.response.use(function (response) {
    // 对响应数据做点什么
    console.log('请求成功');
    return response.data;
}, function (error) {
    // 对响应错误做点什么
    console.log('请求出错');
    console.log(error);
    console.log(Promise.reject(error));
    // return Promise.reject(error);
});
/*******************************拦截器 end*******************************/

// 后台首页
export function  AdminIndex(json) {
    console.log('api')
    return axios.get('/api/admin/index', Qs.stringify(json), {headers: {'Content-Type': 'application/x-www-form-urlencoded'}});
    // return axios.get('/api/admin/index');
}
