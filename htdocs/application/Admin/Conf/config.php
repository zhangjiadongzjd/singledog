<?php
return array(
	 'APP_USE_NAMESPACE'     =>  true,    // 应用类库是否使用命名空间
    'APP_SUB_DOMAIN_DEPLOY' =>  false,   // 是否开启子域名部署
    'APP_SUB_DOMAIN_RULES'  =>  array(), // 子域名部署规则
    'APP_DOMAIN_SUFFIX'     =>  '', // 域名后缀 如果是com.cn net.cn 之类的后缀必须设置    
    'ACTION_SUFFIX'         =>  '', // 操作方法后缀
    'MULTI_MODULE'          =>  true, // 是否允许多模块 如果为false 则必须设置 DEFAULT_MODULE
    'MODULE_DENY_LIST'      =>  array('Common','Runtime'),
    'CONTROLLER_LEVEL'      =>  1,
    'APP_AUTOLOAD_LAYER'    =>  'Controller,Model', // 自动加载的应用类库层 关闭APP_USE_NAMESPACE后有效
    'APP_AUTOLOAD_PATH'     =>  '', // 自动加载的路径 关闭APP_USE_NAMESPACE后有效

    /* Cookie设置 */
    'COOKIE_EXPIRE'         =>  0,    // Cookie有效期
    'COOKIE_DOMAIN'         =>  '',      // Cookie有效域名
    'COOKIE_PATH'           =>  '/',     // Cookie路径
    'COOKIE_PREFIX'         =>  '',      // Cookie前缀 避免冲突
    'COOKIE_HTTPONLY'       =>  '',      // Cookie httponly设置

    /* 默认设定 */
    'DEFAULT_M_LAYER'       =>  'Model', // 默认的模型层名称
    'DEFAULT_C_LAYER'       =>  'Controller', // 默认的控制器层名称
    'DEFAULT_V_LAYER'       =>  'View', // 默认的视图层名称
    'DEFAULT_LANG'          =>  'zh-cn', // 默认语言
    'DEFAULT_THEME'         =>  '',	// 默认模板主题名称
    'DEFAULT_MODULE'        =>  'Home',  // 默认模块
    'DEFAULT_CONTROLLER'    =>  'Login', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'index', // 默认操作名称
    'DEFAULT_CHARSET'       =>  'utf-8', // 默认输出编码
    'DEFAULT_TIMEZONE'      =>  'PRC',	// 默认时区
    'DEFAULT_AJAX_RETURN'   =>  'JSON',  // 默认AJAX 数据返回格式,可选JSON XML ...
    'DEFAULT_JSONP_HANDLER' =>  'jsonpReturn', // 默认JSONP格式返回的处理方法
    'DEFAULT_FILTER'        =>  'htmlspecialchars', // 默认参数过滤方法 用于I函数...

    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'bdm25736617.my3w.com', // 服务器地址
    'DB_NAME'               =>  'bdm25736617_db',          // 数据库名
    'DB_USER'               =>  'bdm25736617',      // 用户名
    'DB_PWD'                =>  'zjd199349',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  '',    // 数据库表前缀
    'DB_FIELDTYPE_CHECK'    =>  false,       // 是否进行字段类型检查
    'DB_FIELDS_CACHE'       =>  false,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8

    /* SESSION设置 */
    'SESSION_AUTO_START'    =>  true,    // 是否自动开启Session

    // Think模板引擎标签库相关设定
    'TAGLIB_BEGIN'          =>  '<',  // 标签库标签开始标记
    'TAGLIB_END'            =>  '>',  // 标签库标签结束标记
    
    /* URL设置 */
    'URL_CASE_INSENSITIVE'  =>  true,   // 默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'             =>  1,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式
    'URL_PATHINFO_DEPR'     =>  '/',	// PATHINFO模式下，各参数之间的分割符号
		
	'TMPL_CACHE_ON' => false,//禁止模板编译缓存
	'HTML_CACHE_ON' => false,//禁止静态缓存

	
);