# 'Idoly Pride' Goods shop

<!--배지-->
![MIT License][license-shield] ![Repository Size][repository-size-shield] ![Issue Closed][issue-closed-shield]

<!--프로젝트 대문 이미지-->
![Project Title](readme_img/readme_main.png)

<!--프로젝트 버튼-->
 [![Readme in Korean][readme-ko-shield]][readme-ko-url]

 <!--목차-->
# 목차
- [[1] About the Project](#1-about-the-project)
  - [Features](#features)
  - [Technologies](#technologies)
- [[2] Getting Started](#2-getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
  - [Caution](#caution)
- [[3] Usage](#3-usage)
- [[4] Contact](#4-contact)
- [[5] Update Note](#5-update-note)

# [1] About the Project
- This project is a merchandise sales site for the ***'Idoly Pride'*** game, including features such as login/sign-up, shop, and community.
- It is a project focused on practicing the implementation of the structure of a shopping mall site and animation effects.
- This project will continue to receive updates until the final version is released and is scheduled to be deployed for **90 days**.
- For update details, please refer to the **Update Note** section at the bottom of this document.


## Features
- Various **animations** have been implemented.
- Includes a **filter search** feature that allows multi-condition searching.
- The use of **signature colors** in design helps to reduce color clutter.


## Technologies
- [PHP]
- [Maria DB - PHPMyAdmin]
- [HTML5], [CSS3], [JAVASCRIPT]
- [Adobe Photoshop 2023], [Adobe XD]
- [Visual Studio Code]

# [2] Getting Started
- This project is developed using **PHP**. Therefore, it is recommended to download and use the **XAMPP** program.
- For proper functionality, please create a `geet` database in **PHP MyAdmin** and import the **geet.sql** file located in the project folder.

## Prerequisites
*Instructions for downloading XAMPP are as follows:*

- **Download XAMPP**: https://www.apachefriends.org/
- **Note for XAMPP download**: You only need to download Apache, MariaDB (PHP MyAdmin), and PHP.


## Installation
*You can use the project's source code by either cloning the repository or downloading it as a zip file.*
1. Clone the repository
```bash
git clone https://github.com/your-username/project-repository (https://github.com/jejuKIM99/Goods_Shop.git)

```
2. Download as a zip file
```bash
https://github.com/jejuKIM99/Goods_Shop
```

## Caution

![Caution](readme_img/caution.png)

- *This project is currently under development. Please keep this in mind.*
- **Unauthorized use and distribution of this project beyond the permitted scope are prohibited. If you wish to use it, please contact the email provided at the bottom of this document.**
- **Permitted Scope**: *Personal learning and reference*
- **Prohibited**: ***Use in personal portfolios, commercial purposes, educational materials, reprocessing, and distribution***, or any use beyond the permitted scope.


# [3] Usage

<h2>Index Page</h2>

![usage](readme_img/Animation1.gif)

- This is the **Index Page**. This page appears when the site initially loads and includes simple animations.
- The background and images were downloaded from the official **Idoly Pride** website.


```javascript
document.addEventListener('DOMContentLoaded', function() {
    const blueBackground = document.querySelector('.blue-background');
    const mainVisual = document.querySelector('.main-visual');
    const textContent = document.querySelector('.text-content');

    // 애니메이션 시작
    setTimeout(() => {
        blueBackground.style.width = '100%'; // 배경 넓이 애니메이션
        mainVisual.style.width = '50%'; // 메인 비주얼 넓이 애니메이션
        textContent.style.left = '50%'; // 텍스트 위치 이동 애니메이션
    }, 100); // 0.1초 뒤 애니메이션 시작

    // 텍스트 애니메이션 시작
    setTimeout(() => {
        textContent.style.opacity = 1; // 텍스트 서서히 보이기
    }, 500); // 0.5초 뒤 애니메이션 시작
});

```
- The animation code is as shown above.
- You can find this code in the **script.js** file.


<h2>Main Page</h2>

![usage](readme_img/Animation2.gif)

- This is the **Main Page**. It is the page you will see after pressing the button on the **Index Page**.
- This page includes the top menu bar **nav.php** and is structured into separate sections.
- There is a minor issue with the top slider section in the content area of the page.
- The content of the page is expected to be dynamically updated in future updates.


<h2>Mypage</h2>

![usage](readme_img/Animation3.gif)

- This is the **MyPage**. It is accessible after successfully logging in via the login button in **nav**.
- On this page, you can change your profile picture and password. *(Password change functionality is not yet implemented)*
- You can view the purchase history for the account and includes a simple filter and sorting feature.
- **Access Method**: You can log in with an account that has purchase history using **ID: admin@naver.com** and **PW: 111111.**


<h2>Shop Page & Community Page</h2>

![usage](readme_img/Animation4.gif)

- This is the **Shop Page** and **Community Page**. These pages are accessible without logging in.
- On the **Shop Page**, you can search and sort items through the **SideBar**.
- Search and sorting allow multiple conditions, and handling is provided for cases where no matching search results are found.
- The **Community Page** includes a search function, and features for posting and filtering will be added in the future.


# [4] Contact
- 📧 s2005i@naver.com
- 📋 [https://github.com/jejuKIM99/Goods_Shop]

# [5] Update-Note

- 2024-09-02 github upload and create README.md

<!--Url for Badges-->
[license-shield]: https://img.shields.io/github/license/dev-ujin/readme-template?labelColor=D8D8D8&color=04B4AE
[repository-size-shield]: https://img.shields.io/github/repo-size/dev-ujin/readme-template?labelColor=D8D8D8&color=BE81F7
[issue-closed-shield]: https://img.shields.io/github/issues-closed/dev-ujin/readme-template?labelColor=D8D8D8&color=FE9A2E

<!--Url for Buttons-->
[readme-ko-shield]: https://img.shields.io/badge/-readme%20in%20korean-2E2E2E?style=for-the-badge

<!--URLS-->
[readme-ko-url]: README.md