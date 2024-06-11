<h2 align="center">
  GitHub Portfolio Website<br/>
  <a href="https://denismarginas.github.io/portfolio/" target="_blank">denismarginas.github.io</a>
</h2>
<div align="center">
  <img alt="Denis Marginas - GitHub Portoflio" src="./content/img/design-elements/portfolio-github.webp" />
</div>

## TL;DR
You can fork this repo to modify and make changes of your own. Please give me proper credit by linking back to [denismarginas](https://github.com/denismarginas/portfolio/). Thanks!

## Built With

This project was built using these technologies:

- PHP
- SCSS
- Prepros
- Java Script
- HTML
- CSS3
- VsCode
- PhpStrom
- GitHub
<br/>

## Features

**📖 Multi-Content, such as Pages & Projects are render in bulk**

**🎨 Styled with SCSS and is easy to customize colors**

**📱 Fully Responsive**

## Getting Started

- Prepros: https://prepros.io/downloads
- Visual Studio Code: https://code.visualstudio.com/download
- PhpStorm: https://www.jetbrains.com/phpstorm/
- XAMPP: https://www.apachefriends.org/download_success.html

## 🛠 Usage Instructions

1. Installation: `xampp` or `lampp` wich have the PHP version 8.0+
2. Installation: `prepros` and import the theme directory (dm-theme-01) in it
3. Clone down this repository, in httdocs, in a new directory named `portfolio`.
4. To render all yout HTML pages and to apply any PHP changes you have to run in a browser this url `http://localhost/portfolio/content/render/render.php`.
5. To apply any changes from SCSS files in CSS file, after saving the changes in file the compilation will be done automatic, 
6. To change the global CSS, such as colors you have to acces the `portfolio/themes/dm-theme-01/scss/interface-design/variables.scss`. 
7. The add new font(s) can be done in `portfolio/themes/dm-theme-01/fonts` manualy. After that in the `portfolio/themes/dm-theme-01/scss/interface-design/`, add the font(s) in `fonts.scss` and use then in the `variables.scss` file, respectively in the variables`--dm-font-family-primary` and `--dm-font-family-secondary`.
8. To change the text content and the image content from pages can be done in `portfolio\content\json\data`. There you have a several json files which influences the rendering content.
9. The rendering structure from pages can be edited in the `data-pages.json`.
10. The rendering data and content from project can be edited in the `data-posts-projects.json`.

## Usage In GitHub Pages 

1. Create a repository in your GitGub account, named `portfolio`, where you add your portfolio project in it.
2. You have to set your repository to be public.
3. In the repository page in GitHub account, acces the Settings, then the Pages section(ex: `https://github.com/[your-name]/portfolio/settings/pages`).
4. In "Build and deployment" section at "Source" select: `Deploy from a branch`, at "Branch" in first select: `main` (or your custom named branch), and at second select: `/ (root)`. Then Save.
5. The publish and the changes from repository will take 2-5 minutes to apply in GitHub Pages.
6. [Optional] You can create a public repository with your name and github pages domain, in this form `[your-name].github.io`, where you can add an index.html page wich will redirect the users to your portoflio. For example this can be done easly with a Java Script code `<script>window.location.href = "/portfolio/";</script>`
