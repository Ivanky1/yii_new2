<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\mongo\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Blogs';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="blog-index">

        <h1><?= Html::encode($this->title) ?></h1>

    </div>
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">Company
                <strong>blog</strong>
            </h2>
            <hr>
        </div>
        <?php foreach($model as $blogPost) :?>
            <div class="col-lg-12 text-center">
                <?php if (isset($blogPost['img'])) : ?>
                    <?=Html::img('/img/blog/'.$blogPost['img'], ['class' => 'img-responsive img-border img-full']) ?>
                <?php endif ?>
                <h2><?= $blogPost['title'] ?>
                    <br>
                    <small><?= $blogPost['created'] ?></small>
                </h2>
                <p><?= $blogPost['summary_text'] ?>.</p>
                <?= \yii\bootstrap\Html::a('Посмотреть', "/blog/{$blogPost['_id']}", ['class' => 'btn btn-default btn-lg']) ?>
                <?php if (isset($blogPost['users'])) : ?>
                    <?= \yii\bootstrap\Html::tag('div','Автор: '.$blogPost['users']['username'], ['class' => 'author']) ?>
                <?php endif ?>
                <hr>
            </div>
        <?php endforeach ?>

        <div class="col-lg-12 text-center">
            <?php
            echo LinkPager::widget([
                'pagination' => $pages,
            ]); ?>
            <ul class="pager">
                <li class="previous"><a href="#">&larr; Older</a>
                </li>
                <li class="next"><a href="#">Newer &rarr;</a>
                </li>
            </ul>
        </div>
    </div>
</div>