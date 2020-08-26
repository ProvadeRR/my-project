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
        <h2 class="text-center" style="margin-bottom: 50px">Список пользователей</h2>
        <?php if(isset($_SESSION['error']) && $_SESSION['error'] == 'Вы не можете удалить администратора или не существующего пользователя'): ?>
            <div class="alert alert-danger" role="alert">
                  <?php echo $_SESSION['error']; unset($_SESSION['error']);?>
            </div>
        <?php elseif(isset($_SESSION['error'])):?>
          <div class="alert alert-success" role="alert">
              <?php echo $_SESSION['error']; unset($_SESSION['error']);?>
            </div>
        <?php endif; ?>
        <table>
        <thead>
    <tr>
      <td>Имя</td>
      <td>Фамилия</td>
        <td>Дата рождения</td>
        <td>Дата регистрации</td>
        <td>Роль</td>
         <td>Действие</td>

    </tr>
  </thead>
              <tbody>
        <?php foreach ($data['users'] as $user ): ?>
    <tr>
      <td><?=$user['name'];?></td>
      <td><?=$user['surname'];?></td>
        <td><?=$user['date_birthday'];?></td>
      <td><?=$user['date_registation'];?></td>
        <td><?php if($user['role_id'] == '1'){echo "Пользователь";}else if($user['role_id'] == 2){echo "Администратор";}?></td>
         <td><div class="div">
              <?php if($user['role_id'] != 2): ?>
                  <a  href="edit/<?php echo $user['id']?>"><img src="../../public/uploads/edit.png" style="height: 30px;width: 30px" alt=""></a>
                 <a onclick="question(<?=$user['id']?>)"><img src="../../public/uploads/delete.png" style="height: 30px;width: 30px" alt=""></a>
                 <?php endif;?>
             </div>
         </td>
    </tr>


        <?php endforeach;?>
  </tbody>
        </table>
    </span>
</div>

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

<script>
    function question(a){
        confirm('Вы подтверждаете удаление пользователя с ID ' + a)?location.href="http://portfolio.ua/admin-panel/delete/"+a + "?access=true":false;
    }
</script>