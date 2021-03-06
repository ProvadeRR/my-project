<?php if(USER == CLASS_GUEST): ?>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal"><a href="http://portfolio.ua">Portfolio.ua</a></h5>
        <a class="btn btn-outline-primary" style="margin-right:5px" href="http://portfolio.ua/authorization"><?php echo $translator['Авторизироваться'][$data['object']->getLanguage()];?></a>
        <a class="btn btn-outline-primary"  href="http://portfolio.ua/registration"><?echo $translator['Зарегистрироваться'][$data['object']->getLanguage()];?></a>
    </div>
<?php endif;
if(USER == CLASS_DEFAULT_USER): ?>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal"><a href="http://portfolio.ua">Portfolio.ua</a></h5>
        <a class="btn btn-outline-primary" href="http://portfolio.ua/logout""><?= $translator['Выйти'][$data['object']->getLanguage()];?></a>
    </div>
<?php endif;
if(USER == CLASS_ADMIN): ?>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal"><a href="http://portfolio.ua">Portfolio.ua</a></h5>
        <a class="btn btn-outline-primary" style="margin-right:5px" href="http://portfolio.ua/admin-panel"><?= $translator['Административная панель'][$data['object']->getLanguage()];?></a>
        <a class="btn btn-outline-primary" href="http://portfolio.ua/logout""><?= $translator['Выйти'][$data['object']->getLanguage()];?></a>
    </div>
<?php endif;
