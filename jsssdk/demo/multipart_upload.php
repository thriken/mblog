<?php
/**
 * $ID: MultipartUploadDemo $
+------------------------------------------------------------------
 * @project JSS-PHP-SDK
 * @create Created on 2013-12-05
+------------------------------------------------------------------

 * 使用Multipart Upload上传一个大文件
×
 * 如果获取成功则返回$jss_response，否则抛出异常
×
 * 可以通过异常对象的getCode()方法和getMessage()方法获取对应的错误码和错误信息
 *
 * 注意：确保本地文件具有可读权限。
 *
 */
require_once dirname(__FILE__).'/global.php';

function test_multipart_upload_test($bucket,$object_key,$filePath) {
    global $storage;
	try {
        $jss_response = $storage->put_mpu_object($bucket,$object_key,$filePath);
        echo "response code:".$jss_response->get_code()."\n";
        echo "response body:".$jss_response->get_body()."\n";
	} catch (JSSError $e) {
	    jss_exception("put_mpu_object({$bucket},{$object_key}) failed!",$e);
	} catch (Exception $e) {
	    exception("put_mpu_object({$bucket},{$object_key}) failed!",$e);
	}
	return false;
}


test_multipart_upload_test($bucket,$mu_object_key,$filePath);
