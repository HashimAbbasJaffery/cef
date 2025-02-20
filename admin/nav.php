<style>

#sidemenu {
	position: fixed;
	height: auto;
	top: 59px;
     left:0px;
	bottom: 0;
	background: rgb(43, 43, 43);
	overflow: hidden;
	-webkit-transition: all .1s ease-in;
	-moz-transition: all .1s ease-in;
	-ms-transition: all .1s ease-in;
	-o-transition: all .1s ease-in;
	transition: all .1s ease-in;
	z-index: 5;
}

#sidemenu.open {
	width: 230px;
	-webkit-transition: all .3s ease-out;
	-moz-transition: all .3s ease-out;
	-ms-transition: all .3s ease-out;
	-o-transition: all .3s ease-out;
	transition: all .3s ease-out;
}

#nav-icon3 {
	width: 32px;
	height: 32px;
	position: relative;
	-webkit-transform: rotate(0deg);
	-moz-transform: rotate(0deg);
	-o-transform: rotate(0deg);
	transform: rotate(0deg);
	-webkit-transition: .5s ease-in-out;
	-moz-transition: .5s ease-in-out;
	-o-transition: .5s ease-in-out;
	transition: .5s ease-in-out;
	cursor: pointer;
	display: block;
}

#nav-icon3 span {
	display: block;
	position: absolute;
	height: 2px;
	width: 100%;
	background: #ffffff;
	border-radius: 9px;
	opacity: 1;
	left: 0;
	-webkit-transform: rotate(0deg);
	-moz-transform: rotate(0deg);
	-o-transform: rotate(0deg);
	transform: rotate(0deg);
	-webkit-transition: .25s ease-in-out;
	-moz-transition: .25s ease-in-out;
	-o-transition: .25s ease-in-out;
	transition: .25s ease-in-out;
}
#nav-icon3 span:nth-child(1) {
	top: 6px;
}

#nav-icon3 span:nth-child(2), #nav-icon3 span:nth-child(3) {
	top: 16px;
}

#nav-icon3 span:nth-child(4) {
	top: 26px;
}

#nav-icon3.open span:nth-child(1) {
	top: 18px;
	width: 0%;
	left: 50%;
}

#nav-icon3.open span:nth-child(2) {
	-webkit-transform: rotate(45deg);
	-moz-transform: rotate(45deg);
	-o-transform: rotate(45deg);
	transform: rotate(45deg);
}

#nav-icon3.open span:nth-child(3) {
	-webkit-transform: rotate(-45deg);
	-moz-transform: rotate(-45deg);
	-o-transform: rotate(-45deg);
	transform: rotate(-45deg);
}

#nav-icon3.open span:nth-child(4) {
	top: 18px;
	width: 0%;
	left: 50%;
}

#header .menu-button {
	position: fixed;
	top: 0;
	left: 0;
	width: 60px;
	height: 60px;
	background: rgb(5, 98, 167);
	-webkit-touch-callout: none;
	-webkit-user-select: none;
	-khtml-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
	padding: 14px;
}

#header .menu-button img {
	max-width: 100%;
	height: auto;
}

#header .menu-button:hover {
	background: rgb(25, 114, 185);
	cursor: pointer;
}

#top-bar {
	position: fixed;
	display: block;
	top: 0;
	left: 60px;
	right: 0;
	height: 60px;
	width: auto;
	background: rgb(3, 78, 141);
	padding-left: 15px;
	padding-right: 15px;
	color: #ffffff;
	z-index: 5;
}

#content-wrapper {
	padding-top: 60px;
	padding-left: 60px;
}
/* Copyright Footer */
.copyright {
	display: none;
	position: absolute;
	width: 100%;
	bottom: 0;
	text-align: center;
	color: #888888;
}

.copyright.show {
	display: block;
	-webkit-animation: fadeInFromNone 0.5s ease-out;
	-moz-animation: fadeInFromNone 0.5s ease-out;
	-o-animation: fadeInFromNone 0.5s ease-out;
	animation: fadeInFromNone 0.5s ease-out;
}

@-webkit-keyframes fadeInFromNone {
	0% {
		display: none;
		bottom: -6px;
		opacity: 0;
	}

	1% {
		display: block;
		bottom: -5px;
		opacity: 0;
	}

	100% {
		display: block;
		bottom: 0;
		opacity: 1;
	}
}

@-moz-keyframes fadeInFromNone {
	0% {
		display: none;
		bottom: -6px;
		opacity: 0;
	}

	1% {
		display: block;
		bottom: -5px;
		opacity: 0;
	}

	100% {
		display: block;
		bottom: 0;
		opacity: 1;
	}
}

@-o-keyframes fadeInFromNone {
	0% {
		display: none;
		bottom: -6px;
		opacity: 0;
	}

	1% {
		display: block;
		bottom: -5px;
		opacity: 0;
	}

	100% {
		display: block;
		bottom: 0;
		opacity: 1;
	}
}

@keyframes fadeInFromNone {
	0% {
		display: none;
		bottom: -6px;
		opacity: 0;
	}

	1% {
		display: block;
		bottom: -5px;
		opacity: 0;
	}

	100% {
		display: block;
		bottom: 0;
		opacity: 1;
	}
}

/* NAV MENU  */

li .glyphicon {
	margin-right: 10px;
}
li.link-active a, li.link-active a:hover, li.link-active a:focus {
	background-color: #4189C7;
	color: white;
}
.main-nav {
	position: fixed;
	top: 0;
	left: 0;
	right: 0;
	z-index: 1;
}

.main-menu {
	width: 230px;
}
.main-menu ul {
	padding: 0;
	margin: 0;
	list-style: none;
}
.main-menu li a {
	display: block;
	height: 48px;
	line-height: 32px;
	font-size: 16px;
	text-decoration: none;
	color: #ffffff;
}
.main-menu li.link-active a {
	background-color: rgb(21, 71, 110);
}
.main-menu li.link-active:hover a {
	background-color: rgb(32, 82, 121);
}
.main-menu li:hover a {
	background-color: rgb(64, 64, 64);
}
.main-menu li a span {
	font-size: 18px;
	width: 60px;
	text-align: center;
	line-height: 48px;
	color: transparent;
	-webkit-text-stroke-width: 1px;
	-webkit-text-stroke-color: #ffffff;
}
.main-menu.bottom {
	position: absolute;
	bottom: 45px;
	border-top: 1px solid rgb(64, 64, 64);
}
</style>

<header id="header">
 <div class="menu-button">
  <div id="nav-icon3">
   <span></span>
   <span></span>
   <span></span>
   <span></span>
  </div>
 </div>
 <div id="top-bar">
  <h3><?php echo $_SESSION['name']; ?></h3>
 </div>
</header>
<nav id="sidemenu">
 <div class="main-menu">
  <ul class='main-menu'>
   <li class="link-active">
    <a href="home.php">
     <span class='glyphicon glyphicon-home'></span> Customers
    </a>
   </li>
   <!--<li>-->
   <!-- <a href="forms.php">-->
   <!--  <span class='glyphicon glyphicon-pushpin'></span> Forms-->
   <!-- </a>-->
   <!--</li>-->

   <li>
    <a href="logout.php">
     <span class='glyphicon glyphicon-cog'></span> Logout
    </a>
   </li>
  </ul>
 </div>
</nav>