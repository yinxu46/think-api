<?php
declare(strict_types=1);

if (!function_exists('api_success')) {
    /**
     * api_success
     * @param array $data 返回数据
     * @param string $message 返回提示
     * @param int $code 返回代码
     * @return \think\response\Json
     * @author Even <even@1000duo.cn>
     * @date 2020/06/14 20:45:40
     */
    function api_success($data = [], $message = 'ok', int $code = 200)
    {
        return \think\api\ApiResult::success($data, $message, $code);
    }
}

if (!function_exists('api_error')) {
    /**
     * api_error
     * @param string $message 错误地址
     * @param int $code 错误代码
     * @return \think\response\Json
     * @author Even <even@1000duo.cn>
     * @date 2020/06/14 20:47:27
     */
    function api_error($message = 'fail', int $code = -1)
    {
        return \think\api\ApiResult::error($message, $code);
    }
}
