### Web framework performance test ###

这个测试的目的是为了比较php几个流行框架和mongodb配合的性能状况。

framework|version|QPS
--------------|---------|------
Laravel lumen	|5.3      |170	
Phalcon       |3.0.2    |1200	
Phalcon Micro	|3.0.2	  |1500	
CodeIgniter	  |3.1.2    |260
Nodejs	      |5.4.0    |1300

如果我们不使用框架，单独跑php页面，QPS能达到1700，这个数字用来参考。

从测试结果我们很容易看出来，采用PHP扩展方式开发的框架有非常明显的性能优势。
而框架排名第一的 Laravel 可能真的是编程艺术家的选择，而不是性能控的首选。

CI 作为一个老牌框架，一直没有引入命名空间，沿用这很旧的PHP开发方式，在性能
方面因为代码量较少，自然获得了不错的性能分数。而 Laravel 虽然也说注重性能，
但是其本身框架想要的特性太多，所以依赖过多的底层库，导致其代码加载和编译过程
需要花费不少时间。

而 Phalcon 这样的框架直接是php扩展的方式存在，框架代码在 php-fpm 启动的时候就已经
加载到进程内存，所以完全不需要从磁盘读取代码文件，也不需要编译，在工作机制上和传统的 PHP 框架完全不一样，放在一起比较只作为参考。

不过如果项目有强烈的性能需求，那么建议采用 Phalcon 这样的框架。这样原生扩展的
php框架还有 Yaf，也很值得推荐，但是因为其本身特性较少，框架设计的初衷并不打算作为一个全功能框架，只能相对简单的场合使用，需要架构师自己判断。

### 测试环境 ###

硬件

> CPU       2.6 GHz Intel Core i5
> MEMORY    8 GB 1600 MHz DDR3
> SSD DISK  250G

### 服务器配置 ###

web server

> Nginx + PHP-FPM 7.0
> Mongodb 3.2

### ab command ###

```
ab -n 1000 -c 100 http://127.0.0.1:3000/
```


node 的结果居然和Micro持平，这让我有点意外，因为我预计nodejs应该比PHP稍好一些才对。

### dependencies ###

* mongodb
* php-mongodb
* php-phalcon




