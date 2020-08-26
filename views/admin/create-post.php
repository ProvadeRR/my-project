<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet"/>
<nav id="navigation">
    <ul>
        <li><a href="http://portfolio.ua/admin-panel"><i class="ion-ios-speedometer-outline"></i><span>Административная панель</span></a></li>
        <li><a href="http://portfolio.ua/admin-panel/posts" ><i class="ion-ios-speedometer-outline"></i><span>Посты</span></a></li>
        <li><a href="http://portfolio.ua/admin-panel/users" ><i class="ion-chatbubbles"></i><span>Пользователи</span></a></li>
        <li><a href="http://portfolio.ua"><i class="ion-log-out"></i><span>Выйти из панели</span></a></li>
    </ul>
</nav>
<div id="wrapper"><span>

        <div class="block-of-text" id="posts" style="display: none;">Отображаемый блок 1</div>
        <div class="block-of-text" id="users" style="display: none;">Отображаемый блок 2</div>

    </span></div>

<style>
    @import url("https://fonts.googleapis.com/css?family=Open+Sans");
    * {
        margin: 0;
        padding: 0;
        font-family: "Open sans", sans-serif;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    body {
        background: #333;
    }

    nav#navigation {
        position: fixed;
        width: 300px;
        height: 100%;
        background: #262626;
        border-right: 1px solid #293649;
    }
    nav#navigation ul {
        list-style: none;
    }
    nav#navigation ul li {
        position: relative;
        display: block;
        width: 100%;
        height: 60px;
        border-bottom: 1px solid #293649;
    }
    nav#navigation ul li.active {
        background: #2e2e2e;
    }
    nav#navigation ul li.dropdown:hover ul[class*="dropdown-"] {
        visibility: visible;
        opacity: 1;
    }
    nav#navigation ul li.dropdown:before {
        font-family: ionicons;
        content: "\f125";
        position: absolute;
        margin: 20px 0 0 0;
        left: 85%;
        color: #aaa;
    }
    nav#navigation ul li:hover:after {
        width: 225px;
    }
    nav#navigation ul li:after {
        content: " ";
        position: absolute;
        z-index: 1;
        width: 0px;
        height: 2px;
        margin: -2px 0 0 0;
        background: #126CA1;
        -webkit-transition: 150ms ease all;
        -moz-transition: 150ms ease all;
        transition: 150ms ease all;
    }
    nav#navigation ul li a {
        display: block;
        width: 100%;
        line-height: 60px;
        padding: 0 15px;
        text-decoration: none;
        color: #aaa;
        -webkit-transition: 150ms ease all;
        -moz-transition: 150ms ease all;
        transition: 150ms ease all;
    }
    nav#navigation ul li a:hover {
        background: #2e2e2e;
        color: #eee;
    }
    nav#navigation ul li a i,
    nav#navigation ul li a span {
        display: inline-block;
    }
    nav#navigation ul li a i {
        position: absolute;
        font-size: 1.3em;
    }
    nav#navigation ul li a span {
        margin: 0 0 0 35px;
        font-size: 0.85em;
    }
    nav#navigation ul li ul[class*="dropdown-"] {
        position: absolute;
        display: block;
        margin: -61px 0 0 225px;
        visibility: hidden;
        opacity: 0;
        -webkit-transition: 150ms ease all;
        -moz-transition: 150ms ease all;
        transition: 150ms ease all;
    }
    nav#navigation ul li ul[class*="dropdown-"] li {
        width: 225px;
        background: #171717;
    }
    nav#navigation ul li ul[class*="dropdown-"] li a:hover {
        background: #1f1f1f;
    }

    #wrapper {
        margin: 0 0 0 500px;
        padding: 15px;
        color: #aaa;
    }

</style>

