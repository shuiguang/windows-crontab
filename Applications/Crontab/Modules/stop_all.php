<?php
/**
 * 停止所有定时任务
 * @return  null
 */
function stop_all()
{
	$run_dir = WEB_ROOT.'/'.basename(Crontab\Config::$run_dir);
	foreach(glob($run_dir.'/*') as $cur_file)
	{
		@unlink($cur_file);
		if(!file_exists($cur_file))
		{
			if(strpos($cur_file, Crontab\Config::$cron_suffix) !== false)
			{
				log_mess('<font color="green">'.basename($cur_file).'定时任务已停止</font>', __FILE__, __LINE__);
			}
		}else{
			echo('error');
		}
	}
	echo('success');
}