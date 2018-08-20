<?php
/*
 * 此功能用于临时在服务端运行代码，不了解本系统或PHP，请不要随意修改代码
 * 此类中的public方法可以在中栏中列出，点击相应的方法名可以在最右侧直接运行
 * 请不要在程序中留下危险的代码，如想留下备份，只需将该方法改为private即可
 * by Keboy
 *
 */
class Run extends Controller {
	public function __construct() {
		$this->db = Load::database();
		$this->redis = Load::redis();
	}
	//测试
	public function test() {
		
	}
}