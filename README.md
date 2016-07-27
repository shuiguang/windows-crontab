# workerman-crontab-for-win
workerman-crontab-for-win
## 运行
(php>=5.3.3)
双击start.bat运行(需要设置系统php环境变量)

PHP必须支持exec函数

## 创建新的定时任务组
如果需要添加一组定时任务，组名为job1，那么可以在./Applications/Crontab/cron_dir/下创建job1.crontab，内容如下：
```sh
#案例1：每天22:00执行一次shell脚本
00 22 * * * www /www/cut-logs
#案例2：每分钟执行一次php脚本
* * * * * www /usr/local/php/bin/php /www/test.php
```

## 启动新添加的定时任务组
使用浏览器访问
http://您的IP地址:5566/
启动刚才添加的job1.crontab任务。

## 与Linux多进程版本的区别
1、单进程,也就是说count属性无效  
2、由于php在win下无法fork进程,Applications/YourApp/start.php被拆成多个子启动项,如start_web.php   start_worker.php等,每个文件自动启动一个进程运行  
3、由于php在win下不支持信号,所以无法使用reload、status命令  

## Home page
[https://github.com/shuiguang/windows-crontab](https://github.com/shuiguang/windows-crontab)

## 说明
此版本可用于windows下测试开发，Linux生产环境可以使用[https://github.com/shuiguang/workerman-crontab](https://github.com/shuiguang/workerman-crontab)

## 移植
### windows到Linux（需要Linux的Workerman版本3.1.0及以上）
拷贝Crontab到官方Applications/目录下即可

## Cron语法参考
```sh
# Example of job definition:
# .---------------- minute (0 - 59)
# |  .------------- hour (0 - 23)
# |  |  .---------- day of month (1 - 31)
# |  |  |  .------- month (1 - 12) OR jan,feb,mar,apr ...
# |  |  |  |  .---- day of week (0 - 6) (Sunday=0 or 7) OR sun,mon,tue,wed,thu,fri,sat
# |  |  |  |  |
# *  *  *  *  * user-name  command to be executed
```

## 秒级Cron开启条件
需手动修改./Applications/Crontab/Bootstrap/CrontabWorker.php的代码:
```php
private static $cron_standard = 'Y-m-d H:i';
```
为
```php
private static $cron_standard = 'Y-m-d H:i:s';
```

## 秒级Cron语法参考
```sh
# Example of job definition:
# .---------------- second (0 - 59)
# |  .---------------- minute (0 - 59)
# |  |  .------------- hour (0 - 23)
# |  |  |  .---------- day of month (1 - 31)
# |  |  |  |  .------- month (1 - 12) OR jan,feb,mar,apr ...
# |  |  |  |  |  .---- day of week (0 - 6) (Sunday=0 or 7) OR sun,mon,tue,wed,thu,fri,sat
# |  |  |  |  |  |
# *  *  *  *  *  * user-name  command to be executed
```




