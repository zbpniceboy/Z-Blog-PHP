<?php
#注册插件
RegisterPlugin("zb_djs","ActivePlugin_zb_djs");

function ActivePlugin_zb_djs() {
	Add_Filter_Plugin('Filter_Plugin_Zbp_MakeTemplatetags','zb_djs_Zbp_MakeTemplatetags');
	Add_Filter_Plugin('Filter_Plugin_Zbp_Load', 'info_zb_djs');	
}
function InstallPlugin_zb_djs() {
	global $zbp;
	zb_djs_moudle();
	if (!$zbp->Config('zb_djs')->HasKey('default_ID')) {
    	$zbp->Config('zb_djs')->default_ID= '1';
        $zbp->Config('zb_djs')->zb_title = '距离2018还有：';
        $zbp->Config('zb_djs')->zb_cont = '2 0 1 8 新 年 快 乐';
        $zbp->SaveConfig('zb_djs');
    }
     $zbp->SetHint('good', '启用成功！感谢您的使用！');
}

function info_zb_djs() {
    global $zbp;
    if (isset($zbp->modulesbyfilename['djss'])) {
        $zbp->modulesbyfilename['djss']->Content = zb_GetDjs();
    }
}


/*倒计时模块*/
function zb_GetDjs(){
    global $zbp;
    	date_default_timezone_set('PRC');
		$endTime=strtotime($zbp->Config('zb_djs')->endTime);
		$nowTime=time();
		global $endtimes;
		$endtimes = str_replace(array("-"," ",":"),",",$zbp->Config('zb_djs')->endTime );	
		if($endTime){
		   return '
		   <script>AutoInt('.$endtimes.',"'.$zbp->Config('zb_djs')->zb_cont.'");</script>
		   <p id="tit">'.($zbp->Config("zb_djs")->zb_title).'</p>
		  <div class="timeBox" id="box">
		    <span id="day" style="display: none;"></span>
		    <span id="hour" style="display: none;"></span>
		    <span id="minute" style="display: none;"></span>
		    <span id="seconds" style="display: none;"></span>
		  </div><style>#tit{display:none;text-align:center;}.timeBox{text-align:center;}
		   .timeBox span i{padding: 5px 10px;margin:2px;background: red;color: white;font-size: 20px;display: inline-block;font-style: normal;border-radius: 5px;}.timeBox span em{display: inline-block;font-size: 13px;margin:0 4px;}</style>';
    	}
}

function zb_djs_moudle(){
	if (!isset($zbp->modulesbyfilename['djss'])) {
        $t = new Module();
        $t->Name = "简单倒计时";
        $t->FileName = "djss";
        $t->Source = "djss";
        $t->SidebarID = 0;
        $t->Content = "";
        $t->IsHideTitle = false;
        $t->HtmlID = "djsid";
        $t->Type = "ul";
        $t->MaxLi = 5;
        $t->Content = '';
        $t->Save();
    }
}

function zb_djs_Zbp_MakeTemplatetags(&$template){
	global $zbp;				
	$zbp->header .=  '<script type="text/javascript" src="'.$zbp->host.'zb_users/plugin/zb_djs/js/zb_djs.js"></script>' . "\r\n";	
}

function UninstallPlugin_zb_djs() {
	global $zbp;
	$sql = $zbp->db->sql->Delete($zbp->table['Module'], array(array('=', 'mod_Source', 'djss')));
    $zbp->db->Delete($sql);
    $zbp->SetHint('good', '模块清除成功');
    $zbp->DelConfig('zbpblog');
}