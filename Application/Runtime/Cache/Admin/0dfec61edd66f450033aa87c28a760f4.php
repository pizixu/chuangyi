<?php if (!defined('THINK_PATH')) exit();?>﻿
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>深圳市城建管理工作平台</title>
<style type="text/css">
<!--
body {
  margin-left: 0px;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
  overflow:hidden;
}
.STYLE3 {font-size: 12px; color: #adc9d9; }
-->
</style></head>

<body>
<table width="100%"  height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#1075b1">&nbsp;</td>
  </tr>
  <tr>
    <td height="608" background="<?php echo ADMIN_PUB;?>images/login_03.gif"><table width="847" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="318" background="<?php echo ADMIN_PUB;?>images/login_04.gif">&nbsp;</td>
      </tr>
      <tr>
        <td height="84"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="381" height="84" background="<?php echo ADMIN_PUB;?>images/login_06.gif">&nbsp;</td>
            <td width="162" valign="middle" background="<?php echo ADMIN_PUB;?>images/login_07.gif">
            <form method="post" action="" enctype="multipart/form-data"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="44" height="24" valign="bottom"><div align="right"><span class="STYLE3">用户</span></div></td>
                <td width="10" valign="bottom">&nbsp;</td>
                <td height="24" colspan="2" valign="bottom">
                  <div align="left">
                    <input type="text" name="ad_name" id="textfield" style="width:100px; height:17px; background-color:#87adbf; border:solid 1px #153966; font-size:12px; color:#283439; ">
                  </div></td>
              </tr>
              <tr>
                <td height="24" valign="bottom"><div align="right"><span class="STYLE3">密码</span></div></td>
                <td width="10" valign="bottom">&nbsp;</td>
                <td height="24" colspan="2" valign="bottom"><input type="password" name="ad_password" id="textfield2" style="width:100px; height:17px; background-color:#87adbf; border:solid 1px #153966; font-size:12px; color:#283439; "></td>
              </tr>
              <tr>
                <td height="24" valign="bottom"><div align="right"><span class="STYLE3">验证码</span></div></td>
                <td width="10" valign="bottom">&nbsp;</td>
                <td width="52" height="24" valign="bottom"><input type="text" name="checkcode" id="textfield3" style="width:50px; height:17px; background-color:#87adbf; border:solid 1px #153966; font-size:12px; color:#283439; "></td>
                <td width="62" valign="bottom"><div align="left">
                <img onClick="this.src='/chuangyi/index.php/Admin/Login/code/'+Math.random();" style="cursor:pointer;" src="/chuangyi/index.php/Admin/Login/code" width="60" height="30">
                </div></td>
              </tr>
              <tr>
              </tr>
            </table></td>
            <td width="26"><img src="<?php echo ADMIN_PUB;?>images/login_08.gif" width="26" height="84"></td>
            <td width="67" background="<?php echo ADMIN_PUB;?>images/login_09.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="25"><div align="center">
                <input type="submit" value="登录" />
               
              </tr>
              <tr>
                <td height="25"><div align="center">
                <input type="submit" value="重置" />
                </div></td>
              </tr>
            </table>
            </form>
            </td>
            <td width="211" background="<?php echo ADMIN_PUB;?>images/login_10.gif">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="206" background="<?php echo ADMIN_PUB;?>images/login_11.gif">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#152753">&nbsp;</td>
  </tr>
</table>
</body>
</html>