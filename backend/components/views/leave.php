<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\components\EasyThumbnailImage;
use webvimark\modules\UserManagement\components\GhostHtml;
?>

<?= GhostHtml::a(' <i class="fa fa-rocket"></i>
<span class="label label-danger">'.($models->count() + $modelsApproved->count() + $modelsRejected->count()).'</span>', ['/candidate/index'], ['class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'])?>
<ul class="dropdown-menu">
    <li class="header">You have <?= $models->count() + $modelsApproved->count() + $modelsRejected->count() ?> notifications</li>
    <li>
        <!-- inner menu: contains the actual data -->
        <ul class="menu">
            <?php 
                $messages = $models->all();
                if($messages != NULL):
                    foreach ($messages as $msg):
            ?>
                    <li><!-- start message -->
                        <a href="<?= url::to(['/leaverequest/approve', 'id'=>$msg->id]) ?>">
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
                            <p>Need approval leave request.</p>
                        </a>
                    </li>
            <?php
                    endforeach;
                endif;
            ?>
            <!-- APPROVED -->
            <?php 
                $approveds = $modelsApproved->all();
                if($approveds != NULL):
                    foreach ($approveds as $approve):
            ?>
                    <li><!-- start message -->
                        <a href="<?= url::to(['/leaverequest/view', 'id'=>$approve->id]) ?>">
                            <div class="pull-left">
                                <?php
                                    if(isset($approve->supervisor->photo)):
                                        echo EasyThumbnailImage::thumbnailImg(
                                            '@webroot/uploads/employee/photo/'.$approve->supervisor->photo,
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
                                <?= $approve->supervisor->getFullName(); ?>
                            </h4>
                            <p>Approve your leave request.</p>
                        </a>
                    </li>
            <?php
                    endforeach;
                endif;
            ?>
            <!-- APPROVED -->
            <?php 
                $rejects = $modelsRejected->all();
                if($rejects != NULL):
                    foreach ($rejects as $reject):
            ?>
                    <li><!-- start message -->
                        <a href="<?= url::to(['/leaverequest/view', 'id'=>$reject->id]) ?>">
                            <div class="pull-left">
                                <?php
                                    if(isset($reject->supervisor->photo)):
                                        echo EasyThumbnailImage::thumbnailImg(
                                            '@webroot/uploads/employee/photo/'.$reject->supervisor->photo,
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
                                <?= $reject->supervisor->getFullName(); ?>
                            </h4>
                            <p>Reject your leave request.</p>
                        </a>
                    </li>
            <?php
                    endforeach;
                endif;
            ?>
        </ul>
    </li>
    <li class="footer"><?= GhostHtml::a('See all', ['/leaverequest/list'], []); ?></li>
</ul>