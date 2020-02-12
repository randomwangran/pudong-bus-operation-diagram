# shanghai-bus-operation-diagram
### 浦东公交模拟图
#### **额外许可：本项目不能用于商业用途**
#### **Additional license: this software may not be used for commercial purposes**

### 免责声明
如果您是由其他使用本站模拟图项目而跳转过来的，请您注意——所有第三方搭建的网站仅仅引用了本项目的代码，并按照开源协议注明了作者的Github原项目地址，但是第三方网站的所有行为都不在本项目的控制之下，故对由于第三方引起的各类纠纷和损失，我们不会承担任何责任。

### Contributors
本代码的完善离不开很多热心的contributors的帮助和指点，特别感谢[hebingchang](https://github.com/hebingchang/pudong-bus-operation-diagram)、[BobLiu0518](https://github.com/BobLiu0518/Pudong-Bus-Operation-Diagram)二位开发者，以及画出新版模拟图样式的手绘大佬Zhao。

The improvement of this code is inseparable from a lot of enthusiastic contributors's help and guidance, especially thanks to the two developers of [hebingchang](https://github.com/hebingchang/pudong-bus-operation-diagram), [BobLiu0518](https://github.com/BobLiu0518/Pudong-Bus-Operation-Diagram) and draw a new version of the simulation style of the hand-painted master Zhao.

![example.png](https://i.loli.net/2020/02/11/Fcj8yvETWpd72hR.png)

Example Web: https://example.obus.me/Index/

**v2.95 Stable Version** 2019-12-07 Update
1. Improve vehicle logic and optimize user experience. Please modify the json with a professional editor (Notepad ++ is recommended). You need to have the necessary Json syntax.
2. Added user log query function, which is convenient for webmasters to analyze the preferences of simulation map fans and prevent abuse
3. Fixed the problem that a few vehicles were scrapped and expired GPS still displayed on the simulation map, increasing the timeliness of the vehicle
4. Fix the ghost car caused by the Pujiao update, the vehicle outside the simulation map (out of bounds issue), and the JS memory leak caused by the specific situation
### User Manual：
#### DEPLOY ON YOUR VPS

It is worth noting that this is done on the premise that you have a VPS, and you can search on Google to find the right VPS service provider for yourself.

#### We Provide 2 Methods to deploy this project, docker is the best choice.

#### First Way: Normal Deploy

1. Log in to your VPS, using SSH and enter the following command to install aapanel.

> curl -sSO http://www.aapanel.com/script/new_install_en.sh && bash new_install_en.sh

**This panel has been greatly optimized in the Linux CentOS system. I strongly recommend install it in CentOS.**

While you see ```Do you want to install aaPanel to the /www directory now?(y/n):``` choose ```y``` & Enter

After a period of installation, if the installation is successful, it should look like the following figure.


![pic01.png](https://i.loli.net/2020/02/11/Ywa7SdMQUJsTfpK.png)


**2. Configure the panel**

Based on the aapanel URL, username and password showed, visit the URL and login the panel.

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

#### Or Deploy with Docker

> If you are new, please read this page:

> https://github.com/sjlleo/pudong-bus-operation-diagram/wiki/How-to-install-the-program%3F

```bash
git clone https://github.com/sjlleo/pudong-bus-operation-diagram
cd pudong-bus-operation-diagram
cp .env.example .env
```

Configure your web port in `.env` file, then

```bash
docker-compose up -d
```

#### Enjoy :)
