<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\components\EasyThumbnailImage;
use webvimark\modules\UserManagement\components\GhostHtml;
?>

<?= GhostHtml::a(' <i class="fa fa-shopping-cart"></i>
<span class="label label-warning">'.($models->count()).'</span>', ['/candidate/index'], ['class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'])?>
<ul class="dropdown-menu">
    <li class="header">You have <?= $models->count(); ?> notifications</li>
    <li>
        <!-- inner menu: contains the actual data -->
        <ul class="menu">
            <?php 
                $messages = $models->all();
                if($messages != NULL):
                    foreach ($messages as $msg):
            ?>
                    <li><!-- start message -->
                        <a href="<?= url::to(['/purchaserequest/review', 'id'=>$msg->id]) ?>">
                            <div class="pull-left">
                                <?php
                                    if(isset($msg->employee->photo)):
                                        echo EasyThumbnailImage::thumbnailImg(
                                            '@webroot/uploads/employee/photo/'.$msg->employee->photo,
                                            50,
                                            50,
                                            EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                                            ['alt' => 'user image', 'class'=>'img-circle', 'data-src'=>'holder.js/50x50/auto/?text=img']
                                        );
                                    else:
                                        echo Html::img('web/uploads/candidate/photo/default.jpg', ['class'=>'img-circle', 'data-src'=>'holder.js/50x50/auto/?text=img']);
                                    endif;
                                ?>
                            </div>
                            <h4>
                                <?= $msg->employee->getFullName(); ?>
                            </h4>
                            <p>Need approval purchase request.</p>
                        </a>
                    </li>
            <?php
                    endforeach;
                endif;
            ?>
            
        </ul>
    </li>
    <li class="footer"><?= GhostHtml::a('See all', ['/purchaserequest/list'], []); ?></li>
</ul>