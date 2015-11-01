<br/>
<h3 class="title">Presentation</h3>


<?php
    
    // Calling the data of the model.
    $simodel = new Si();
    $json = $simodel->getAll('space_invaders.json');

?>



<div id="space-container">
<?php foreach ($json as $key => $value): ?>
    <div class="card">
        <div class="card-head">
            <img src="<?=$urlPrefix . REL_IMG_FOLDER . 'si/' . $value['img']?>" />
            <span><?=$value['name']?></span>
        </div>
        <div class="description">
            <p><?=$value['description']?></p>
        </div>
    </div>
<?php endforeach ?>

</div>