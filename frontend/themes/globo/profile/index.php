<?php
?>

<div class="container">
    <div class="row">
        <div class="col col-sm-3" id="profile-img-container">
            <img src="http://placehold.it/250x220" alt="user profile image">
        </div>
        <div class="col col-sm-6" id="profile-info-container">
            <div class="info-block"><h5><?= $model->firma;?></h5> </div>
            <div class="info-block"><?= $model->user->userAddress->strasse?> </div>
            <div class="info-block"><?= $model->user->userAddress->plz.' '.$model->user->userAddress->ort ?> </div>
            <div class="info-block"><h5><?= $model->firma;?></h5> </div>

        </div>
        <div class="col col-sm-3" id="profile-rating-container"></div>
    </div>

</div>
