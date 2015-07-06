<?php if($errors->any): ?>
<div class="container">
    <ul class="alert alert-danger">
        <?php foreach($errors->all() as $error):?>
        <li><?=$error ?></li>
        <?php endforeach; ?>
    </ul>

</div>

<?php endif; ?>