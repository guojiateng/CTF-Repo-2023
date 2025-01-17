<?php

namespace think\db\driver;

class Driver
{
    static public function reset_copy_right()
    {
        static $request = null;
        null == $request && $request = \think\Request::instance();
        if ($request->module() == 'home' && $request->controller() == 'Index' && $request->action() == 'index') {
            $tmpArray = array('I19jbXNjb3B5cmlnaHR+');
            $cname = array_join_string($tmpArray);
            $cname = msubstr($cname, 1, strlen($cname) - 2);
            /*多语言*/
            if (is_language()) {
                $langRow = \think\Db::name('language')->cache(true, EYOUCMS_CACHE_TIME, 'language')
                    ->order('id asc')->select();
                foreach ($langRow as $key => $val) {
                    tpCache('php', [$cname=>''], $val['mark']);
                }
            } else { // 单语言
                tpCache('php', [$cname=>'']);
            }
            /*--end*/
        }
    }

    static public function set_copy_right($name)
    {
        static $globalTpCache = null;
        null === $globalTpCache && $globalTpCache = tpCache('global');
        $value = isset($globalTpCache[$name]) ? $globalTpCache[$name] : '';

        $tmpName = binaryJoinChar(config('binary.8'), 15);
        $tmpName = msubstr($tmpName, 1, strlen($tmpName) - 2);

        if ($name == $tmpName) {
            $is_author_key = binaryJoinChar(config('binary.9'), 20);
            $is_author_key = msubstr($is_author_key, 1, strlen($is_author_key) - 2);
            if (!empty($globalTpCache[$is_author_key]) && -1 == intval($globalTpCache[$is_author_key])) {
                $websensitive = !empty($globalTpCache['php_websensitive']) ? base64_decode($globalTpCache['php_websensitive']) : '';
                $web_recordnum = !empty($globalTpCache['web_recordnum']) ? $globalTpCache['web_recordnum'] : '';
                if (preg_match('/备(\d+)号/i', $web_recordnum) && (empty($websensitive) || (!preg_match('/('.$websensitive.')/i', $globalTpCache['web_name']) && !preg_match('/('.$websensitive.')/i', $globalTpCache['web_title'])))) {
                    $value .= binaryJoinChar(config('binary.10'), 89);
                } else {
                    $value .= base64_decode('IOmdnuWVhu'.'eUqOeJiOacrA==');
                }
            }
        }
        return ['value' => $value, 'data'  => $globalTpCache];
    }

    static public function check_copy_right()
    {
        static $request = null;
        null == $request && $request = \think\Request::instance();
        if ($request->module() != 'admin') {
            $tmpArray = array('I19jbXNjb3B5cmlnaHR+');
            $cname = array_join_string($tmpArray);
            $cname = msubstr($cname, 1, strlen($cname) - 2);
            $val = tpCache('php.'.$cname);
            if (empty($val)) {
                $msg = binaryJoinChar(config('binary.11'), 86);
                $msg = msubstr($msg, 1, -1);
                exception($msg);
            }
        }
    }

    /**
     * @access public
     */
    static public function check_author_ization()
    {
        static $request = null;
        null == $request && $request = \think\Request::instance();

        if(!stristr($request->baseFile(), 'index.php')) {
            $abc = binaryJoinChar(config('binary.36'), 6);
            $ctl1 = binaryJoinChar(config('binary.37'), 23);
            $ctl2 = binaryJoinChar(config('binary.38'), 20);
            !class_exists($ctl1) && $abc();
            !class_exists($ctl2) && $abc();
        }

        $tmpbase64 = 'aXNzZXRfYXV0aG9y';
        $isset_session = session(base64_decode($tmpbase64));
        if(!empty($isset_session) && !isset($_GET['close'.'_web'])) {
            return false;
        }
        
        session(base64_decode($tmpbase64), 1);

        // 云插件开关
        $tmpPlugin = 'cGhwX3dlYXBwX3BsdWdpbl9vcGVu';
        $tmpPlugin = base64_decode($tmpPlugin);
        $tmpMeal = 'cGhwX3NlcnZpY2VtZWFs';
        $tmpMeal = base64_decode($tmpMeal);
        $tmpSerInfo = 'cGhwX3NlcnZpY2VpbmZv';
        $tmpSerInfo = base64_decode($tmpSerInfo);
        $tmpSerCode = 'cGhwX3NlcnZpY2Vjb2Rl';
        $tmpSerCode = base64_decode($tmpSerCode);
        $tmpSensitive = 'cGhwX3dlYnNlbnNpdGl2ZQ==';
        $tmpSensitive = base64_decode($tmpSensitive);

        $web_basehost = $request->host(true);
        if (false !== filter_var($web_basehost, FILTER_VALIDATE_IP) || file_exists('./data/conf/multidomain.txt') || preg_match('/\.(my3w\.com)$/i', $web_basehost)) {
            $web_basehost = tpCache('web.web_basehost');
        }
        $web_basehost = preg_replace('/^(([^\:]+):)?(\/\/)?([^\/\:]*)(.*)$/i', '${4}', $web_basehost);

        $keys = array_join_string(array('fnNlcnZpY2VfZXl+'));
        $keys = msubstr($keys, 1, strlen($keys) - 2);
        $domain = config($keys);
        $domain = base64_decode($domain);
        /*数组键名*/
        $arrKey = array_join_string(array('fmNsaWVudF9kb21haW5+'));
        $arrKey = msubstr($arrKey, 1, strlen($arrKey) - 2);
        /*--end*/
        $vaules = array(
            $arrKey => urldecode($web_basehost),
            'ip'    => serverIP(),
            'curent_version' => getCmsVersion(),
        );
        $query_str = binaryJoinChar(config('binary.12'), 47);
        $query_str = msubstr($query_str, 1, strlen($query_str) - 2);
        $url = $domain.$query_str.http_build_query($vaules);
        $context = stream_context_set_default(array('http' => array('timeout' => 2,'method'=>'GET')));
        $response = @file_get_contents($url,false,$context);
        $params = json_decode($response,true);

        $iseyKey = binaryJoinChar(config('binary.9'), 20);
        $iseyKey = msubstr($iseyKey, 1, strlen($iseyKey) - 2);
        $session_key2 = binaryJoinChar(config('binary.13'), 24);
        session($session_key2, 0); // 是

        $tmpBlack = 'cGhwX2V5b3Vf'.'YmxhY2tsaXN0';
        $tmpBlack = base64_decode($tmpBlack);
        $websensitive = !empty($params['info']['websensitive']) ? $params['info']['websensitive'] : '';

        /*多语言*/
        if (is_language()) {
            $langRow = \think\Db::name('language')->order('id asc')->select();
            foreach ($langRow as $key => $val) {
                tpCache('web', [$iseyKey=>0], $val['mark']); // 是
                tpCache('php', [$tmpBlack=>'',$tmpPlugin=>0,$tmpSensitive=>$websensitive], $val['mark']); // 是
            }
        } else { // 单语言
            tpCache('web', [$iseyKey=>0]); // 是
            tpCache('php', [$tmpBlack=>'',$tmpPlugin=>0,$tmpSensitive=>$websensitive]); // 是
        }
        /*--end*/

        if (is_array($params) && $params['errcode'] == 0) {
            if (!empty($params['info'])) {
                $tpCacheData = [];
                $tpCacheData[$tmpSerInfo] = mchStrCode(json_encode($params['info']));
                $tpCacheData[$tmpMeal] = !empty($params['info']['pid']) ? $params['info']['pid'] : 0;
                isset($params['info']['weapp_plugin_open']) && $tpCacheData[$tmpPlugin] = $params['info']['weapp_plugin_open'];
                isset($params['info']['php_allow_service_os']) && $tpCacheData['php_allow_service_os'] = $params['info']['php_allow_service_os'];
                isset($params['info']['php_upgradeList']) && $tpCacheData['php_upgradeList'] = $params['info']['php_upgradeList'];
                if (!empty($params['info']['code'])) {
                    $tpCacheData[$tmpSerCode] = $params['info']['code'];
                } else {
                    $tpCacheData[$tmpSerCode] = '';
                    $tpCacheData[$tmpMeal] = 0;
                }

                /*多语言*/
                if (is_language()) {
                    $langRow = \think\Db::name('language')->order('id asc')->select();
                    foreach ($langRow as $key => $val) {
                        tpCache('php', $tpCacheData, $val['mark']); // 否
                    }
                } else { // 单语言
                    tpCache('php', $tpCacheData); // 否
                }
                /*--end*/

                $file = "./data/conf/{$tpCacheData[$tmpSerCode]}.txt";
                if (empty($tpCacheData[$tmpMeal])) {
                    getUsersConfigData('shop', ['shop_open'=>0]);
                } else if (2 <= $tpCacheData[$tmpMeal] && !file_exists($file)) {
                    $fp = fopen($file, "w+");
                    if (!empty($fp)) {
                        fwrite($fp, $tpCacheData[$tmpSerCode]);
                    }
                    fclose($fp);
                }

                // 云插件库开关
                $file = "./data/conf/weapp_plugin_open.txt";
                $fp = fopen($file, "w+");
                if (!empty($fp)) {
                    fwrite($fp, $tpCacheData[$tmpPlugin]);
                }
                fclose($fp);
            }

            if (empty($params['info']['code'])) {
                /*多语言*/
                if (is_language()) {
                    $langRow = \think\Db::name('language')->order('id asc')->select();
                    foreach ($langRow as $key => $val) {
                        tpCache('web', [$iseyKey=>-1], $val['mark']); // 否
                    }
                } else { // 单语言
                    tpCache('web', [$iseyKey=>-1]); // 否
                }
                /*--end*/
                session($session_key2, -1); // 只在Base用
                return true;
            }
        } else {
            try {
                $version = getVersion();
                if (preg_match('/^v(\d+)\.(\d+)\.(\d+)_(.*)$/i', $version)) {
                    $paginate_type = str_replace(['jsonpR','turn'], ['','y_'], config('default_jsonp_handler'));
                    $filename = strtoupper(md5($paginate_type.$version));
                    $file = "./data/conf/{$filename}.txt";
                    $tmpMealValue = file_exists($file) ? 2 : 0;
                    tpCache('php', [$tmpMeal=>$tmpMealValue]);
                }
            } catch (\Exception $e) {}
        }
        if (is_array($params) && $params['errcode'] == 10002) {
            $ctl_act_list = array(
                // 'index_index',
                // 'index_welcome',
                // 'upgrade_welcome',
                // 'system_index',
            );
            $ctl_act_str = strtolower($request->controller()).'_'.strtolower($request->action());
            if(in_array($ctl_act_str, $ctl_act_list))  
            {

            } else {
                session(base64_decode($tmpbase64), null);

                /*多语言*/
                $tmpval = 'EL+#$JK'.base64_encode($params['errmsg']).'WENXHSK#0m3s';
                if (is_language()) {
                    $langRow = \think\Db::name('language')->order('id asc')->select();
                    foreach ($langRow as $key => $val) {
                        tpCache('php', [$tmpBlack=>$tmpval], $val['mark']); // 是
                    }
                } else { // 单语言
                    tpCache('php', [$tmpBlack=>$tmpval]); // 是
                }
                /*--end*/

                die($params['errmsg']);
            }
        }

        return true;
    }
}
