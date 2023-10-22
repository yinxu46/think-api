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


/**
 * Class ApiResult
 * @package think\api
 */
class ApiResult
{
    /**
     * 成功返回数据
     * @param array|mixed $data
     * @param string $msg
     * @param int $code
     * @return \think\response\Json
     * @author Even <even@1000duo.cn>
     * @date 2020/06/14 20:42:51
     */
    public static function success($data = [], string $msg = "ok", int $code = 200)
    {
        $showDebug = env('app.dedug', false);
        $debug = request()->debug ?: null;
        $update = request()->update ?: false;
        $response = [
            'code' => $code,
            'msg' => $msg,
        ];
        if ($data) $response['data'] = $data;
        if ($showDebug) $response['debug'] = $debug;
        if ($update) $response['update'] = true;
        return json($response);
    }

    /**
     * 失败返回数据
     * @param string|\Exception $msg
     * @param int $code
     * @return \think\response\Json
     * @author Even <even@1000duo.cn>
     * @date 2020/06/14 20:42:37
     */
    public static function error($msg = 'fail', int $code = -1)
    {
        $showDebug = env('app.dedug', false);
        $debug = request()->debug ?: null;
        $update = request()->update ?: false;
        $response = [
            'code' => $code,
            'msg' => $msg,
        ];
        if ($msg instanceof \Throwable) {
            $response['code'] = $msg->getCode();
            $response['msg'] = $msg->getMessage();
        }
        if ($showDebug) $response['debug'] = $debug;
        if ($update) $response['update'] = true;
        return json($response);
    }
}
