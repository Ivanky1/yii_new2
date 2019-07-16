<div id="carousel-example-generic" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators hidden-xs">
        <?php foreach(range(0, count($model)-1) as $i) : ?>
            <?=\yii\bootstrap\Html::tag('li', '', [
                    'data-target' => "#carousel-example-generic",
                    'data-slide-to' => $i,
                    'class' => (!$i) ?' active' :''
                    ]
            ) ?>
        <?php endforeach ?>

    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php foreach($model as $key => $slide) : ?>
            <?php $active = (!$key) ?' active' :''  ?>
            <div class="item<?=$active?>">
                <?=\yii\bootstrap\Html::img('/img/slider/'.$slide['img'], ['class' => 'img-responsive img-full']) ?>
            </div>
        <?php endforeach ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="icon-next"></span>
    </a>
</div>