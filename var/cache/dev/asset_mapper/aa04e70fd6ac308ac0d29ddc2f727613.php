O:41:"Symfony\Component\AssetMapper\MappedAsset":12:{s:10:"sourcePath";s:66:"/Users/nik/Sites/dbwebb-kurser/mvc/me/report/assets/styles/app.css";s:10:"publicPath";s:30:"/assets/styles/app-lqqcB3q.css";s:23:"publicPathWithoutDigest";s:22:"/assets/styles/app.css";s:15:"publicExtension";s:3:"css";s:7:"content";s:3352:"@charset "utf-8";

:root {
  --darkgreen: rgb(7 12 13);
  --green: rgb(73 89 57);
  --aqua: rgb(41 101 115);
  --beige: rgb(166 159 128);
  --lightbrown: rgb(191 143 101);
  --orange: rgb(191 62 33);
  --brown: rgb(115 52 38);

  --dark: rgb(0 0 0);
  --light: rgb(240 240 240);
  --footer: rgb(22 22 22);
  --table: rgb(67 67 67);
}

[lang='sv'] {
  font-language-override: 'SVE';
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

@font-face {
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  src: url("../font/Poppins-Regular-3Bmpruw.woff2") format('woff2');
  font-display: swap;
}

@font-face {
  font-family: Poppins-Italic;
  font-style: italic;
  font-weight: normal;
  src: url("../font/Poppins-Italic-0yFzIB0.woff2") format('woff2');
  font-display: swap;
}

@font-face {
  font-family: Poppins-Bold;
  font-style: normal;
  font-weight: bold;
  src: url("../font/Poppins-Bold-kXZ0HmC.woff2") format('woff2');
  font-display: swap;
}

@font-face {
  font-family: Poppins-BoldItalic;
  font-style: italic;
  font-weight: bold;
  src: url("../font/Poppins-BoldItalic-AisSFkX.woff2") format('woff2');
  font-display: swap;
}

html {
  font-size: 100%;
  background-color: var(--dark);
  color: var(--light);
}

body {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  font-family: Poppins, sans-serif;
  font-size: 1.1em;
  line-height: 1.4;
  hyphens: auto;
  text-wrap: balance;
}

header {
  padding: 1rem;
  background-color: var(--green);
  min-height: 75px;
  background-image: url("../images/chihiro-nav-yurIfup.avif");
  background-repeat: no-repeat;
  background-position: right top;
  background-size: contain;
  background-blend-mode: multiply;
}

nav {
  text-align: center;
  margin: 0 auto;
  max-width: 60%;
}

nav ul {
  list-style-type: none;
}

nav ul li {
  display: inline;
}

main {
  flex-grow: 1;
  margin: 1rem;
  padding: 1rem;
}

footer {
  flex-shrink: 0;
  z-index: 100;
  background-color: var(--darkgreen);
  color: var(--beige);
  font-size: 0.9rem;
  text-align: center;
  padding: 1rem 4rem 0;
}

* a, * a:link, * a:visited, * a:hover {
  color: inherit;
  opacity: 0.8;
}

a.active {
  text-decoration: underline double currentcolor;
  color: var(--orange) !important;
}

img {
  max-width: 100% !important;
  max-height: 100%;
  object-fit: scale-down;
  border-radius: 0.1em;
  padding: 0.5em 0;
}

h1, h2, h3, h4, h5, h6 {
  font-family: Poppins-Bold, sans-serif;
  color: var(--light);
  margin-bottom: 1.4rem;
}

h1 {
  font-size: 2.0rem;
}

h2 {
  font-size: 1.4rem;
}

p {
  font-size: 1rem;
  margin-bottom: 1.4rem;
}

em, figcaption {
  font-family: Poppins-Italic, sans-serif;
}

figcaption {
  color: var(--green);
}

strong, th {
  font-family: Poppins-Bold, sans-serif;
}

code {
  font-family: "Courier New", Courier, monospace;
  color: var(--orange);
}

.center {text-align: center;}
.right {text-align: right;}
.left {text-align: left;}

.two-columns {
  columns: 2 25rem;
  column-gap: 2rem;
}

select#kmom {
  position: fixed;
  top: 0;
  left: 0;
  margin: 0.2em;
  font-size: 0.8em;
  background-color: var(--orange);
  color: var(--light);
}

.initcap:first-letter {
  color: var(--orange);
  initial-letter: 3;
  margin-right: 0.15em;
  font-family: Poppins-BoldItalic, sans-serif;
  /* Firefox */
  float: left;
  font-size: 500%;    
}
";s:6:"digest";s:32:"96aa9c077abd73a7d1a045f9e7400ee0";s:13:"isPredigested";b:0;s:11:"logicalPath";s:14:"styles/app.css";s:8:"isVendor";b:0;s:55:" Symfony\Component\AssetMapper\MappedAsset dependencies";a:5:{i:0;O:41:"Symfony\Component\AssetMapper\MappedAsset":12:{s:10:"sourcePath";s:78:"/Users/nik/Sites/dbwebb-kurser/mvc/me/report/assets/font/Poppins-Regular.woff2";s:10:"publicPath";s:42:"/assets/font/Poppins-Regular-3Bmpruw.woff2";s:23:"publicPathWithoutDigest";s:34:"/assets/font/Poppins-Regular.woff2";s:15:"publicExtension";s:5:"woff2";s:7:"content";N;s:6:"digest";s:32:"dc19a9aeec03cac3fbe9711cdbaa922b";s:13:"isPredigested";b:0;s:11:"logicalPath";s:26:"font/Poppins-Regular.woff2";s:8:"isVendor";b:0;s:55:" Symfony\Component\AssetMapper\MappedAsset dependencies";a:0:{}s:59:" Symfony\Component\AssetMapper\MappedAsset fileDependencies";a:0:{}s:60:" Symfony\Component\AssetMapper\MappedAsset javaScriptImports";a:0:{}}i:1;O:41:"Symfony\Component\AssetMapper\MappedAsset":12:{s:10:"sourcePath";s:77:"/Users/nik/Sites/dbwebb-kurser/mvc/me/report/assets/font/Poppins-Italic.woff2";s:10:"publicPath";s:41:"/assets/font/Poppins-Italic-0yFzIB0.woff2";s:23:"publicPathWithoutDigest";s:33:"/assets/font/Poppins-Italic.woff2";s:15:"publicExtension";s:5:"woff2";s:7:"content";N;s:6:"digest";s:32:"d32173201d09925f290f7b6024d022d9";s:13:"isPredigested";b:0;s:11:"logicalPath";s:25:"font/Poppins-Italic.woff2";s:8:"isVendor";b:0;s:55:" Symfony\Component\AssetMapper\MappedAsset dependencies";a:0:{}s:59:" Symfony\Component\AssetMapper\MappedAsset fileDependencies";a:0:{}s:60:" Symfony\Component\AssetMapper\MappedAsset javaScriptImports";a:0:{}}i:2;O:41:"Symfony\Component\AssetMapper\MappedAsset":12:{s:10:"sourcePath";s:75:"/Users/nik/Sites/dbwebb-kurser/mvc/me/report/assets/font/Poppins-Bold.woff2";s:10:"publicPath";s:39:"/assets/font/Poppins-Bold-kXZ0HmC.woff2";s:23:"publicPathWithoutDigest";s:31:"/assets/font/Poppins-Bold.woff2";s:15:"publicExtension";s:5:"woff2";s:7:"content";N;s:6:"digest";s:32:"9176741e60a83bafc594bd4f3ba0683e";s:13:"isPredigested";b:0;s:11:"logicalPath";s:23:"font/Poppins-Bold.woff2";s:8:"isVendor";b:0;s:55:" Symfony\Component\AssetMapper\MappedAsset dependencies";a:0:{}s:59:" Symfony\Component\AssetMapper\MappedAsset fileDependencies";a:0:{}s:60:" Symfony\Component\AssetMapper\MappedAsset javaScriptImports";a:0:{}}i:3;O:41:"Symfony\Component\AssetMapper\MappedAsset":12:{s:10:"sourcePath";s:81:"/Users/nik/Sites/dbwebb-kurser/mvc/me/report/assets/font/Poppins-BoldItalic.woff2";s:10:"publicPath";s:45:"/assets/font/Poppins-BoldItalic-AisSFkX.woff2";s:23:"publicPathWithoutDigest";s:37:"/assets/font/Poppins-BoldItalic.woff2";s:15:"publicExtension";s:5:"woff2";s:7:"content";N;s:6:"digest";s:32:"022b121645feaf5b730e86616fbe725f";s:13:"isPredigested";b:0;s:11:"logicalPath";s:29:"font/Poppins-BoldItalic.woff2";s:8:"isVendor";b:0;s:55:" Symfony\Component\AssetMapper\MappedAsset dependencies";a:0:{}s:59:" Symfony\Component\AssetMapper\MappedAsset fileDependencies";a:0:{}s:60:" Symfony\Component\AssetMapper\MappedAsset javaScriptImports";a:0:{}}i:4;O:41:"Symfony\Component\AssetMapper\MappedAsset":12:{s:10:"sourcePath";s:75:"/Users/nik/Sites/dbwebb-kurser/mvc/me/report/assets/images/chihiro-nav.avif";s:10:"publicPath";s:39:"/assets/images/chihiro-nav-yurIfup.avif";s:23:"publicPathWithoutDigest";s:31:"/assets/images/chihiro-nav.avif";s:15:"publicExtension";s:4:"avif";s:7:"content";N;s:6:"digest";s:32:"caeac87eea5a17e3f1e5621775a8e205";s:13:"isPredigested";b:0;s:11:"logicalPath";s:23:"images/chihiro-nav.avif";s:8:"isVendor";b:0;s:55:" Symfony\Component\AssetMapper\MappedAsset dependencies";a:0:{}s:59:" Symfony\Component\AssetMapper\MappedAsset fileDependencies";a:0:{}s:60:" Symfony\Component\AssetMapper\MappedAsset javaScriptImports";a:0:{}}}s:59:" Symfony\Component\AssetMapper\MappedAsset fileDependencies";a:0:{}s:60:" Symfony\Component\AssetMapper\MappedAsset javaScriptImports";a:0:{}}