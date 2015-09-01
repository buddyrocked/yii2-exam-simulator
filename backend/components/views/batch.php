<?php

use yii\helpers\Html;
use yii\helpers\Url;
use himiklab\thumbnail\EasyThumbnailImage;
use webvimark\modules\UserManagement\components\GhostHtml;
$total_notif = $models->count() + $modelPipelines->count();
?>

<?= GhostHtml::a('<i class="fa fa-briefcase"></i>
<span class="label label-danger">'.$total_notif.'</span>', ['/project/index'], ['class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'])?>
<ul class="dropdown-menu">
    <li class="header"> <?= $models->count() + $modelPipelines->count() ?> Out of Date Projects & Pipelines</li>
    <li>
        <!-- inner menu: contains the actual data -->
        <ul class="menu">
            <?php 
                $messages = $models->all();
                if($messages != NULL):
                    foreach ($messages as $msg):
            ?>
                    <li><!-- start message -->
                        <a href="<?= url::to(['/project/view', 'id'=>$msg->id]) ?>">
                           <div class="pull-left">
                                <i class="fa fa-trophy"></i>
                           </div>
                            <h4>
                                <?= $msg->name; ?>
                            </h4>
                            <p>@ <?php echo (isset($msg->client->organizaton_name)?$msg->client->organizaton_name:''); ?>.</p>
                            <p>Last update <?= $msg->updated; ?>.</p>
                        </a>
                    </li>
            <?php
                    endforeach;
                endif;
            ?>

            <?php 
                $messagesPipeline = $modelPipelines->all();
                if($messagesPipeline != NULL):
                    foreach ($messagesPipeline as $msgp):
            ?>
                    <li><!-- start message -->
                        <a href="<?= url::to(['/pipeline/view', 'id'=>$msgp->id]) ?>">  
                            <div class="pull-left">
                                <i class="fa fa-briefcase"></i>
                           </div>                         
                            <h4>
                                <?= $msgp->name; ?>
                            </h4>
                            <p>@ <?= isset($msgp->client->organizaton_name)?$msgp->client->organizaton_name:''; ?>.</p>
                            <p>Last update <?= $msgp->updated; ?>.</p>
                        </a>
                    </li>
            <?php
                    endforeach;
                endif;
            ?>
        </ul>
    </li>
    <li class="footer"><?= GhostHtml::a('See all', ['/project/index'], []); ?></li>
</ul>