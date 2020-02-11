# shanghai-bus-operation-diagram
### 浦东公交模拟图
#### **额外许可：本软件不得用于商业用途**

![example.png](https://i.loli.net/2020/02/11/Fcj8yvETWpd72hR.png)

**v2.95正式版** 2019-12-07 Update
1. 完善车辆逻辑，优化用户体验，json请使用专业的编辑器修改（推荐Notepad++），需要掌握必要的Json语法
2. 新增用户日志查询功能，方便站长分析车迷的模拟图使用偏好，同时可以防止滥用
3. 修复少数车辆报废车、过期 GPS 依旧显示在模拟图上的问题，增加车辆时效性判断
4. 修复浦交更新导致的幽灵车、车辆在模拟图外（出界问题）、特定情况下导致的 JS 内存泄漏问题
### User Manual：
#### DEPLOY ON YOUR VPS
It is worth noting that this is done on the premise that you have a VPS, and you can search on Google to find the right VPS service provider for yourself.
1. Log in to your VPS, using SSH and enter the following command to install aapanel.

> curl -sSO http://www.aapanel.com/script/new_install_en.sh && bash new_install_en.sh

**This panel has been greatly optimized in the CentOS system. I strongly recommend install it in CentOS.**

While you see ```Do you want to install aaPanel to the /www directory now?(y/n):``` choose ```y``` & Enter

After a period of installation, if the installation is successful, it should look like the following figure.


![pic01.png](https://i.loli.net/2020/02/11/Ywa7SdMQUJsTfpK.png)


**2. Configure the panel**

Based on the aapanel URL,username and password showed, visit the URL and login the panel.

![pic02.png](https://i.loli.net/2020/02/11/dTqZvNf7P5cb2Aj.png)

![pic03.png](https://i.loli.net/2020/02/11/Kv5LzAdV34X8s9i.png)

Right-click the number in the upper left corner to view the current installation progress of the basic environment

![pic04.png](https://i.loli.net/2020/02/11/TIhaFlj2oRbcWBM.png)

A message Box will tell you the progress of the basic environment.

![pic05.png](https://i.loli.net/2020/02/11/zqKT6gEP8XoJUjn.png)

After all done, please check whether it works.

![pic06.png](https://i.loli.net/2020/02/11/4LFXgK58woGRrxZ.png)

**3. Build your website and Clone the code to it**

Type in your domain and click "submit" buttom directly.

> If you don't have a domain, you can also use your vps's ip instead.

![pic07.png](https://i.loli.net/2020/02/11/nl1ZzqboORpPJfN.png)

Now, we download the code. Please click the ```File Tools -> "yourdomain.com" folder path -> Remote Download```

![pic08.png](https://i.loli.net/2020/02/11/1wb2WG6HP8AYOru.png)

The Download URL is ```https://github.com/sjlleo/pudong-bus-operation-diagram/archive/master.zip```

![pic09.png](https://i.loli.net/2020/02/11/bZsYCST9NuBeoOF.png)

After downloading, Now We try to uncompress the file.

If all goes well, you will see a folder named ```pudong-bus-operation-diagram```

![pic10.png](https://i.loli.net/2020/02/11/px9f2WZ7ah6dQgo.png)

Rename the folder as you favour, here we rename it as "yourpathname"

![pic11.png](https://i.loli.net/2020/02/11/j3xXMbWUsdO1S4k.png)

![pic12.png](https://i.loli.net/2020/02/11/W1i9VnOuLImkvhF.png)

**Now try to access http://yourdomain.com/yourpathname/guide.php**

#### Enjoy :)
