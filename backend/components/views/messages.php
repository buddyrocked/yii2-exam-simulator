<?php

use yii\helpers\Html;
use yii\helpers\Url;
use himiklab\thumbnail\EasyThumbnailImage;
use webvimark\modules\UserManagement\components\GhostHtml;
?>

<?= GhostHtml::a(' <i class="fa fa-user-plus"></i>
    <span class="label label-danger">'. $candidates->count().'</span>', ['/candidate/index'], ['class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'])?>
<ul class="dropdown-menu">
    <li class="header">You have <?= $candidates->count() ?> notifications</li>
    <li>
        <!-- inner menu: contains the actual data -->
        <ul class="menu">
            <?php 
                $messages = $candidates->all();
                if($messages != NULL):
                    foreach ($messages as $msg):
            ?>
                    <li><!-- start message -->
                        <a href="<?= url::to(['/interviewcandidate/add', 'id'=>$msg->id]) ?>">
                            <div class="pull-left">
                                <?php
                                    if(isset($msg->photo)):
                                        echo EasyThumbnailImage::thumbnailImg(
                                            '@webroot/uploads/candidate/photo/'.$msg->photo,
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
                                <?= $msg->getFullName(); ?>
                            </h4>
                            <p><?= $msg->status->name ?></p>
                        </a>
                    </li>
            <?php
                    endforeach;
                endif;
            ?>
        </ul>
    </li>
    <li class="footer"><?= GhostHtml::a('See all', ['/candidate/index'], []); ?></li>
</ul>