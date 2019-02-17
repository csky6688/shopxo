<?php
// +----------------------------------------------------------------------
// | ShopXO 国内领先企业级B2C免费开源电商系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011~2018 http://shopxo.net All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: Devil
// +----------------------------------------------------------------------
namespace app\plugins\commononlineservice;

use app\service\PluginsService;

/**
 * 在线客服 - 管理
 * @author   Devil
 * @blog     http://gong.gg/
 * @version  0.0.1
 * @datetime 2016-12-01T21:51:08+0800
 */
class Admin
{
    /**
     * 首页
     * @author   Devil
     * @blog     http://gong.gg/
     * @version  1.0.0
     * @datetime 2019-02-07T08:21:54+0800
     * @param    [array]          $params [输入参数]
     */
    public function index($params = [])
    {
        $ret = PluginsService::PluginsData('commononlineservice');
        if($ret['code'] == 0)
        {
            // 数据处理
            $ret['data']['online_service'] = str_replace("\n", '<br />', $ret['data']['online_service']);

            // 数组组装
            $data = [
                'data'              => $ret['data'],
            ];
            return DataReturn('处理成功', 0, $data);
        } else {
            return $ret;
        }
    }

    /**
     * 编辑页面
     * @author   Devil
     * @blog     http://gong.gg/
     * @version  1.0.0
     * @datetime 2019-02-07T08:21:54+0800
     * @param    [array]          $params [输入参数]
     */
    public function saveinfo($params = [])
    {
        $ret = PluginsService::PluginsData('commononlineservice');
        if($ret['code'] == 0)
        {
            // 是否
            $is_whether_list =  [
                0 => array('id' => 0, 'name' => '否'),
                1 => array('id' => 1, 'name' => '是', 'checked' => true),
            ];

            // 数组组装
            $data = [
                'is_whether_list'   => $is_whether_list,
                'data'              => $ret['data'],
            ];
            return DataReturn('处理成功', 0, $data);
        } else {
            return $ret;
        }
    }

    /**
     * 数据保存
     * @author   Devil
     * @blog     http://gong.gg/
     * @version  1.0.0
     * @datetime 2019-02-07T08:21:54+0800
     * @param    [array]          $params [输入参数]
     */
    public function save($params = [])
    {
        return PluginsService::PluginsDataSave(['plugins'=>'commononlineservice', 'data'=>$params]);
    }
}
?>