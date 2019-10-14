<?php

namespace App\Common;

// 定义返回的状态码

trait ResponseCode
{
    //----------------------------------------------------------------------------------正常类
    /** 通用正常 */
    private $codeOk = "00000";
    /** 找不到数据 */
    private $codeNoData = "00011";
    /** 数据验证不通过，但是不算错误 */
    private $codeNotMatch = "00020";
    /** 后端返回确认提示 */
    private $codeConfirm = "00090";
    /** 重定向 */
    private $codeRedirect = "00300";

    //----------------------------------------------------------------------------------权限类
    /** 未登录 */
    private $codeNotLogin = "01001";
    /** 缺乏访问接口的权限 */
    private $codePermissionDeny = "01002";
    /** 缺乏访问资源的权限，比如普通用户修改别人的个人资料 */
    private $codeResourceDeny = "01003";

    /** 缺乏文件系统（读写）权限 */
    private $codeFilePermissionDeny = "01011";
    //----------------------------------------------------------------------------------验证类
    /** 通用验证失败 */
    private $codeVerifyError = "02001";
    /** 数据重复（已经存在） */
    private $codeVerifyRepeatError = "02002";
    /** 数据不符合正则表达式 */
    private $codeVerifyRegularError = "02003";
    //----------------------------------------------------------------------------------数据获取类
    /** 通用数据错误 */
    private $codeDataError = "03001";
    /** 未找到数据 */
    private $codeDataNotFound = "03002";
    /** 数据不合法 */
    private $codeDataIllegal = "03003";
    /** 数据重复 */
    private $codeDataRepeat = "03004";
    /** 数据保存失败 */
    private $codeDataSave = "03005";
    //-----------------------------------------------------------------------------------文件操作类
    /** 通用文件操作错误 */
    private $codeFileError = "04001";
    /** 文件已存在 **/
    private $codeFileExist = "04002";
    /** 文件上传失败 */
    private $codeFileUploadFailed = "04011";
    /** 目录创建失败 */
    private $codeFileMakeDirectoryFailed = "04012";
    /** 文件移动失败 */
    private $codeFileMoveFailed = "04013";
    //-----------------------------------------------------------------------------------支付类
    /** 通用支付错误 */
    private $codePayError = "05001";
    /** 下单支付错误 */
    private $codePayOrder = "05002";
    /** 查询错误 */
    private $codePayQuery = "05003";
    /** 申请退款错误 */
    private $codePayRefund = "05004";
    /** 查询申请退款错误 */
    private $codePayQueryRefund = "05005";
    //-----------------------------------------------------------------------------------数据库操作类
    /** 通用数据库错误 */
    private $codeDatabaseError = "10001";
    //-----------------------------------------------------------------------------------非法操作类
    /** 通用非法操作错误 */
    private $codeHandleIllegal = "99001";

    public function hasCode($code)
    {
        try {
            $reflect = new \ReflectionClass(ResponseCode::class);
        } catch (\Exception $e) {
//            Log::error(__FILE__);
            return true;
        }
        $codes = $reflect->getProperties();

        foreach ($codes as $v) {
            if ($this->{$v->name} === $code) {
                return true;
            }
        }
        return false;
    }
}