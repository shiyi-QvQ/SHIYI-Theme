# SHIYI-Theme

<p align="center">
  <img src="https://img.shields.io/badge/Typecho-Theme-blue?style=flat-square" alt="Typecho">
  <img src="https://img.shields.io/badge/Version-1.0.0-green?style=flat-square" alt="Version">
  <img src="https://img.shields.io/badge/License-Apache%202.0-orange?style=flat-square" alt="License">
</p>

<p align="center">
  基于 <a href="https://github.com/matsuzaka-yuki/Mizuki">Mizuki</a> 开发的 Typecho 主题 | 简洁优雅 | 响应式设计
</p>

<p align="center">
  <img src="https://img.shields.io/github/stars/shiyi-QvQ/SHIYI-Theme?style=flat-square" alt="Stars">
  <img src="https://img.shields.io/github/forks/SHIYI-QVQ/SHIYI-Theme?style=flat-square" alt="Forks">
  <img src="https://img.shields.io/github/issues/SHIYI-QVQ/SHIYI-Theme?style=flat-square" alt="Issues">
</p>

---

## 📷 主题预览

> 截图待补充


---

## ✨ 主题特点

- **🎨 简洁美观** — 继承 Mizuki 的简约风格，界面清爽，阅读体验佳
- **📱 响应式设计** — 完美适配桌面端、平板端、手机端等各种设备
- **⚡ 轻量高效** — 无冗余依赖，加载速度快，SEO 友好
- **🌙 深色模式** — 支持明暗主题切换（根据系统自动切换 / 手动切换）
- **💬 评论系统** — 兼容 Typecho 原生评论，支持表情
- **📦 主题后台** — 简洁的后台配置面板，轻松自定义
- **🎯 功能丰富** — 归档、标签云、友链、404 页面等开箱即用
- **🔧 易于定制** — 代码结构清晰，方便二次开发

---

## 📦 安装方式

### 方式一：直接下载

1. 下载最新版本 [Release](https://github.com/YOUR_GITHUB_USERNAME/SHIYI-Theme/releases)
2. 解压后将 `SHIYI-Theme` 文件夹上传至 `/usr/themes/` 目录
3. 登录 Typecho 后台 → 控制台 → 外观 → 启用主题
4. 进入主题设置进行配置

### 方式二：Git 克隆

```bash
cd /usr/themes/
git clone https://github.com/shiyi-QvQ/SHIYI-Theme.git
```

### 方式三：Composer（待支持）

```bash

```

---

## 🛠 配置指南

主题启用后，在 **控制台 → 外观 → 设置外观** 中可配置以下选项：

| 配置项 | 说明 |
|--------|------|
| 站点标题 | 网站标题 |
| 站点描述 | SEO 描述信息 |
| 站点图标 | 网站 favicon / 图标 |
| 首页标语 | 首页大标题文字 |
| 社交链接 | 微博、B站、GitHub 等 |
| ICP备案号 | 页面底部显示 |
| 主题色 | 自定义主题强调色 |
| 深色模式 | 跟随系统 / 强制开启 / 强制关闭 |

---

## 📁 主题结构

```
SHIYI-Theme/
├── assets/              # 静态资源
│   ├── css/             # 样式文件
│   ├── js/              # 脚本文件
│   └── images/          # 图片资源
├── 404.php               # 404 页面
├── archives.php          # 归档页面
├── category.php          # 分类页面
├── footer.php            # 页脚
├── functions.php         # 主题函数
├── header.php            # 页头
├── index.php             # 首页
├── page.php             # 独立页面
├── post.php              # 文章页面
├── screenshot.png        # 主题截图
├── sidebar.php           # 侧边栏
├── style.css            # 主样式文件
└── README.md            # 说明文件
```

---

## ❓ 常见问题

### Q1: 主题无法启用？
> 请确保你的 Typecho 版本 >= 1.2.0

### Q2: 如何显示深色模式开关？
> 在后台设置中，选择「手动切换」即可在页面显示主题切换按钮

### Q3: 如何添加自定义 CSS/JS？
> 可在后台「高级设置」中添加自定义代码

### Q4: 兼容哪些插件？
> 已知兼容：CommentToMail、Sitemap、Links 等主流插件

---

## 🔗 相关链接

- 🔥 **官方群聊**：[点击链接加入群聊【SHIYI主题交流群】](https://qun.qq.com/universal-share/share?ac=1&authKey=%2BBfT4OP93EpmClXPikIKcjWxsEJ9IvC2tJOF8zIx8thJFtiqhe76C2Wu4H2Xt9jU&busi_data=eyJncm91cENvZGUiOiI3OTU2NTUzMjYiLCJ0b2tlbiI6InVRdmhrTFVZeHQxU2tXVSs4OXdSOE9mSUx2VjJSaW1NRGI5TktNYUx3aVpyczh5MjdyMkxuRHlTdGxqU0hjYUkiLCJ1aW4iOiIyMjgzMjY0ODUifQ%3D%3D&data=7O8KD2zG8pSJ0493MXQv1aUiTysj7SohriwcHP3ZYVF1zGVcDpSwiwcKy-WYieM0qvF1xAGu0KgodHTsmepFQQ&svctype=4&tempid=h5_group_info)

- 🐛 问题反馈：[GitHub Issues](https://github.com/shiyi-QvQ/SHIYI-Theme/issues)

- 📌 更新日志：[CHANGELOG](https://github.com/YOUR_GITHUB_USERNAME/SHIYI-Theme/blob/master/CHANGELOG.md)

---

## 🙏 致谢

本主题基于 **Mizuki** 开发，感谢前辈 [matsuzaka-yuki](https://github.com/matsuzaka-yuki/Mizuki) 的开源贡献！

> 如果觉得本项目还可以的话，记得点点 ⭐ Star，也请多多支持 Mizuki！感谢！

---

## 📄 开源协议

本项目基于 [Apache License 2.0](https://www.apache.org/licenses/LICENSE-2.0.html) 开源，欢迎自由使用、修改和分发。

---

<p align="center">
  Made with ❤️ by <a href="https://github.com/shiyi-QVQ">YOUR_NAME</a>
  <br>
  <sub>SHIYI-Theme v1.0.0 · 基于 Mizuki</sub>
</p>
