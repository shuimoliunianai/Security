# security 
## 简介
&emsp;该模块主要用于根据新闻的不同类型不同状态，不同管理角色不同操作角色下显示不同内容的统一解析模块避免了在前端页面大量的逻辑判断,维护和更新都很方便,设计思想是,封装显示控件,基于配置文件动态生成页<br>面内容。

###核心类
1. ***SecurityAccess*** 模块入口类,向外提供公共接口
2. ***RoleProvider*** 操作角色创建类，通过此类可以创建当前请求下的**Role**对象
3. ***NewsProvider*** 新闻类型创建类，通过此类可以创建不同类型的新闻对象
4. ***SecurityFactory*** 管理角色创建类,通过此类可以创建不同的当前登录角色下的角色对象
5. ***Config*** 核心配置类，大量定义了业务相关的配置，模块的所有逻辑基于此配置

###接口

***init() 用于创建Security对象***

> 参数<Br>
> * roleId: 操作角色ID，**1** 表示作者，**2** 表示初审，**3** 表示签发<BR>
> * status: 新闻状态<BR>
> * channel: 频道id，这个频道参数主要用于新闻模块的逻辑区分，地方和政务模块用的不同，默认传 **-1** 就行<br>
> * typeId: 新闻类型Id
> * 示例: 
```php
$security = SecurityAccess::init($role,$securityStatus,-1,self::AREA);
```



***getNewsThList() 用于获取表头***
> 参数<Br>
> * 无参数
> * 示例 
```php
$thList = $security->getNewsThList()
```

***getSearchOptionList() 用于获取搜索选项***
> 参数<Br>
> * 无参数
> * 示例: 
```php
$searchList = $security->getSearchOptionList();
```

***getCreateButton();用于获取创建文章按钮***
>参数<br>
> * 无参数
> * 示例: 
```php
$createButton = $security->getCreateButton();
```

***getNewsDetail() 处理新闻条目***
>参数<BR>
> * 无参数
> * 示例: 
```php
$newList[] = $security->getNewsDetail($new);
```

###后记
&emsp;该模块的实例对象均采用单例对象,减少了大量循环中重复创建对象的开销,由于逻辑比较复杂，内部实现稍微有点麻烦,有时间的话本人会不断的优化更新。

---------------------

>作者:Jesse<Br>
>Email: Jesse@jesse@bravogotech.com
