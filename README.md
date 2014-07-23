git-hook
=========

> 与git有关的webhook

update.php
----------
用来同步gitlab和测试机上的代码，由于update.php中用到了`shell_exec`执行shell命令，所以需要对server端做一些配置：

* 保证php.ini能执行`shell_exec`函数，简单粗暴的做法就是修改`/etc/php.ini`中的配置，注释掉`disable_function`，`safe_mode`为`Off`。
* 保证有权限执行`sudo`命令，修改`/etc/sudoers`加入`%apache ALL=(ALL) NOPASSWD: ALL`
