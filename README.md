# workerman-crontab-for-win
workerman-crontab-for-win
## 运行
(php>=5.3.3)
双击start.bat运行(需要设置系统php环境变量)

PHP必须支持exec函数

## 与Linux多进程版本的区别
1、单进程,也就是说count属性无效  
2、由于php在win下无法fork进程,Applications/YourApp/start.php被拆成多个子启动项,如start_web.php   start_worker.php等,每个文件自动启动一个进程运行  
3、由于php在win下不支持信号,所以无法使用reload、status命令  

Home page:[https://github.com/shuiguang/windows-crontab](https://github.com/shuiguang/windows-crontab)

## 说明
此版本可用于windows下生产使用

## 移植
### windows到Linux（需要Linux的Workerman版本3.1.0及以上）
拷贝Crontab到官方Applications/目录下即可

