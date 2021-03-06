
<form class="form-signin text-center" method="post" action="signin">
    <h1 class="h3 mb-3 font-weight-normal"><?=$translator['Авторизация'][$data['object']->getLanguage()];?></h1>
    <label for="inputLogin" class="sr-only" ><?=$translator['Авторизация'][$data['object']->getLanguage()];?></label>
    <input type="text" id="inputLogin" name='login' class="form-control" placeholder="<?=$translator['Логин'][$data['object']->getLanguage()];?>" required="">
    <label for="inputPassword" class="sr-only" name="password"><?=$translator['Пароль'][$data['object']->getLanguage()];?></label>
    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="<?=$translator['Пароль'][$data['object']->getLanguage()];?>" required="">
    <?php if(isset($_SESSION['error'])) : ?>
    <div class="btn btn-lg btn-danger btn-block" ><?=$_SESSION['error'];?></div>
        <?php endif; unset($_SESSION['error'])?>
    <button class="btn btn-lg btn-primary btn-block" type="submit"><?=$translator['Войти'][$data['object']->getLanguage()];?></button>
    <p class="mt-5 mb-3 text-muted">©2020</p>
</form>

<style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
    }

    .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }
    .form-signin .checkbox {
        font-weight: 400;
    }
    .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
    }
    .form-signin .form-control:focus {
        z-index: 2;
    }
    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }
    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>