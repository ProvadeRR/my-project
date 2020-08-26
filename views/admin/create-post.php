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

        <h2 class="text-center" style="margin-bottom: 50px">Создание поста</h2>
        <form action="create-new-post" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1">Введите заголовок</label>
    <input type="text" class="form-control" name="title" id="inputTitle" placeholder="Например: Новость спорта" required="">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Введите текст для главной страницы</label>
    <textarea class="form-control" name="small_text" id="exampleFormControlTextarea1" rows="3" ></textarea>
  </div>
            <div class="form-group">
    <label for="exampleFormControlTextarea1">Выберите картинку</label>
    <input type="file" name="title_image">
  </div>
            <div class="form-group">
    <label for="exampleFormControlTextarea1">Введите полный текст</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="text" rows="3" style="resize: vertical;height: 200px" required=""></textarea>
           <div class="d-flex text-center justify-content-between align-items-center">
                    <a href="http://portfolio.ua/admin-panel/posts" class="btn btn-outline-light">Вернуться назад</a>
                    <input type="submit"  class="btn btn-outline-light" style="margin-top:10px;" id="inputSubtitle" value="Создать пост" >
            </div>
  </div>
</form>
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
        margin: 0 0 0 290px;
        padding: 50px;
        color: #aaa;
    }
    table {width: 100%; border-collapse: collapse;}
    table td {padding: 12px 16px;}
    table thead tr {font-weight: bold; border-top: 1px solid #e8e9eb;}
    table tr {border-bottom: 1px solid #e8e9eb;}
    table tbody tr:hover {background: #e8f6ff;}

</style>
