<?php
// +----------------------------------------------------------------------
// | ApiResult
// +----------------------------------------------------------------------
// | 日期 2020-06-14
// +----------------------------------------------------------------------
// | 开发者 Even <even@1000duo.cn>
// +----------------------------------------------------------------------
// | 版权所有 2020~2021 苏州千朵网络科技有限公司 [ https://www.1000duo.cn ]
// +----------------------------------------------------------------------

namespace think\api;


use think\response\Json;

/**
 * Class ApiResult
 * @package think\api
 */
class ApiResult
{
    /**
     * Header 参数
     */
    const header = ['Content-type' => 'application/json'];

    /**
     * 成功返回数据
     * @param array $data
     * @param string $msg
     * @param int $code
     * @return Json
     * @author Even <even@1000duo.cn>
     * @date 2020/06/14 20:42:51
     */
    public static function success($data = [], string $msg = "ok", int $code = 200): Json
    {
        $showDebug = env('app.dedug', false);
        $debug = request()->debug ?: null;
        $update = request()->update ?: false;
        return response(array_merge([
            'code' => $code,
            'msg' => $msg,
        ], $data ? ['data' => $data] : [],
            $showDebug ? ['debug' => $debug] : [],
            $update ? ['update' => true] : [],
        ), 200, self::header, 'json');
    }

    /**
     * 失败返回数据
     * @param string $msg
     * @param int $code
     * @return Json
     * @author Even <even@1000duo.cn>
     * @date 2020/06/14 20:42:37
     */
    public static function error(string $msg = 'fail', int $code = -1): Json
    {
        $showDebug = env('app.dedug', false);
        $debug = request()->debug ?: null;
        $update = request()->update ?: false;
        return response(array_merge([
            'code' => $code ?: -1,
            'msg' => $msg,
        ], $showDebug ? ['debug' => $debug] : [],
            $update ? ['update' => true] : [],
        ), 200, self::header, 'json');
    }
}