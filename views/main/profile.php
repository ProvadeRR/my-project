<div class="align-content-center">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $translator['Имя'][$user->getLanguage()] . ' ' .  $user->getName();?></h6>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $translator['Фамилия'][$user->getLanguage()] . ' ' .  $user->getSurname();?></h6>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $translator['Роль'][$user->getLanguage()] . ' ' .  $translator[$user->getRole()][$user->getLanguage()];?></h6>
            <a href="#" class="card-link"><?php echo $translator['Редактировать'][$user->getLanguage()];?></a>
        </div>
    </div>
</div>
