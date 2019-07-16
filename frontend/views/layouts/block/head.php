<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
            <a class="navbar-brand" href="/">Business Casual</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?= \yii\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Home', 'url' => ['/']],
                    ['label' => 'About', 'url' => ['/about']],
                    ['label' => 'Blog', 'url' => ['/blog']],
                    ['label' => 'Contact', 'url' => ['/contact']],
                    ['label' => 'Register', 'url' => ['/register', ], 'visible' => Yii::$app->user->isGuest],
                    //['label' => 'Login', 'url' => ['/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Logout', 'url' => ['/logout'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Login', 'url' => "#", 'visible' => Yii::$app->user->isGuest,
                        'options' => ['data-toggle' => 'modal', 'data-target' => "#loginpop", "onclick" => 'javascript:void(0)']
                    ],
                ],
                'options' => [
                    'class' => 'nav navbar-nav'
                ]
            ]) ?>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

