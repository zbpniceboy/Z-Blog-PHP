<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('zb_djs')) {$zbp->ShowError(48);die();}

$blogtitle='简单倒计时';
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';


if(isset($_POST['zb_title'])){
 $zbp->Config('zb_djs')->zb_title = $_POST['zb_title'];
 $zbp->Config('zb_djs')->endTime = $_POST['endTime'];
 $zbp->Config('zb_djs')->zb_cont = $_POST['zb_cont'];
 $zbp->SaveConfig('zb_djs');
 $zbp->SetHint('good'); 
}
?>
<script type="text/javascript" src="../../../zb_system/script/jquery-ui-timepicker-addon.js"></script>
<div id="divMain">
  <div class="divHeader"><?php echo $blogtitle;?></div>
  <div class="SubMenu">
  </div>
  <div id="divMain2">
  	<form method="post">
	<table width="100%">
		<tr>
			<td  align="center">活动名称:</td>
			<td><div id='newdatetime' class="editmod"><input type="text" name="zb_title" value="<?php echo $zbp->Config('zb_djs')->zb_title; ?>" style="width:98%;"></div></td>
			<td>此项必填*</td>
		</tr>
		<tr>
			<td  align="center">结束时间:</td>
			<td><div id='newdatetime' class="editmod">
            <input type="text" name="endTime" id="edtDateTime"  value="<?php echo $zbp->Config('zb_djs')->endTime ;?>" style="width:98%;"/>
            </div></td>
			<td>填写结束的时间，必填*</td>
		</tr>
		<tr>
			<td  align="center">到时间点的信息:</td>
			<td><div id='newdatetime' class="editmod"><input type="text" name="zb_cont"  value="<?php echo $zbp->Config('zb_djs')->zb_cont ;?>" style="width:98%;"/></div></td>
			<td>填写结束后的话，必填*</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="Submit" name="Submit"></td>
			<td></td>
		</tr>
	</table>
</form>
  </div>
</div>
<style type="text/css">
	.editmod{
		line-height: 47px;
		height: 47px;
		margin:0px;
	}
</style>
<script type="text/javascript">
//日期时间控件
$.datepicker.regional['<?php echo $lang['lang'] ?>'] = {
  closeText: '<?php echo $lang['msg']['close'] ?>',
  prevText: '<?php echo $lang['msg']['prev_month'] ?>',
  nextText: '<?php echo $lang['msg']['next_month'] ?>',
  currentText: '<?php echo $lang['msg']['current'] ?>',
  monthNames: ['<?php echo $lang['month']['1'] ?>','<?php echo $lang['month']['2'] ?>','<?php echo $lang['month']['3'] ?>','<?php echo $lang['month']['4'] ?>','<?php echo $lang['month']['5'] ?>','<?php echo $lang['month']['6'] ?>','<?php echo $lang['month']['7'] ?>','<?php echo $lang['month']['8'] ?>','<?php echo $lang['month']['9'] ?>','<?php echo $lang['month']['10'] ?>','<?php echo $lang['month']['11'] ?>','<?php echo $lang['month']['12'] ?>'],
  monthNamesShort: ['<?php echo $lang['month_abbr']['1'] ?>','<?php echo $lang['month_abbr']['2'] ?>','<?php echo $lang['month_abbr']['3'] ?>','<?php echo $lang['month_abbr']['4'] ?>','<?php echo $lang['month_abbr']['5'] ?>','<?php echo $lang['month_abbr']['6'] ?>','<?php echo $lang['month_abbr']['7'] ?>','<?php echo $lang['month_abbr']['8'] ?>','<?php echo $lang['month_abbr']['9'] ?>','<?php echo $lang['month_abbr']['10'] ?>','<?php echo $lang['month_abbr']['11'] ?>','<?php echo $lang['month_abbr']['12'] ?>'],
  dayNames: ['<?php echo $lang['week']['7'] ?>','<?php echo $lang['week']['1'] ?>','<?php echo $lang['week']['2'] ?>','<?php echo $lang['week']['3'] ?>','<?php echo $lang['week']['4'] ?>','<?php echo $lang['week']['5'] ?>','<?php echo $lang['week']['6'] ?>'],
  dayNamesShort: ['<?php echo $lang['week_short']['7'] ?>','<?php echo $lang['week_short']['1'] ?>','<?php echo $lang['week_short']['2'] ?>','<?php echo $lang['week_short']['3'] ?>','<?php echo $lang['week_short']['4'] ?>','<?php echo $lang['week_short']['5'] ?>','<?php echo $lang['week_short']['6'] ?>'],
  dayNamesMin: ['<?php echo $lang['week_abbr']['7'] ?>','<?php echo $lang['week_abbr']['1'] ?>','<?php echo $lang['week_abbr']['2'] ?>','<?php echo $lang['week_abbr']['3'] ?>','<?php echo $lang['week_abbr']['4'] ?>','<?php echo $lang['week_abbr']['5'] ?>','<?php echo $lang['week_abbr']['6'] ?>'],
  weekHeader: '<?php echo $lang['msg']['week_suffix'] ?>',
  dateFormat: 'yy-mm-dd',
  firstDay: 1,
  isRTL: false,
  showMonthAfterYear: true,
  yearSuffix: ' <?php echo $lang['msg']['year_suffix'] ?>  '
};
$.datepicker.setDefaults($.datepicker.regional['<?php echo $lang['lang'] ?>']);
$.timepicker.regional['<?php echo $lang['lang'] ?>'] = {
  timeOnlyTitle: '<?php echo $lang['msg']['time'] ?>',
  timeText: '<?php echo $lang['msg']['time'] ?>',
  hourText: '<?php echo $lang['msg']['hour'] ?>',
  minuteText: '<?php echo $lang['msg']['minute'] ?>',
  secondText: '<?php echo $lang['msg']['second'] ?>',
  millisecText: '<?php echo $lang['msg']['millisec'] ?>',
  currentText: '<?php echo $lang['msg']['current'] ?>',
  closeText: '<?php echo $lang['msg']['close'] ?>',
  timeFormat: 'HH:mm:ss',
  ampm: false
};
$.timepicker.setDefaults($.timepicker.regional['<?php echo $lang['lang'] ?>']);
$('#edtDateTime').datetimepicker({
  showSecond: true
  //changeMonth: true,
  //changeYear: true
});
</script>
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>