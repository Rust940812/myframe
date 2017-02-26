<?php
/**
 * [p 变量输出]
 * @李伟健
 * @DateTime  2017-02-15T17:07:17+0800
 * @param     [type]                   $var [description]
 * @return    [type]                        [description]
 */
function p($var)
{ 
	if (is_bool($var)) {
		echo '这是bool值:'.$var;
	}else if(is_null($var)){ 
		echo '这是null:'.$var;
	}else{ 
		print_r($var);
		
		echo '<br/>';
		// echo '这既不是null也不是bool值';
	}
}