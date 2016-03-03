<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

$this->title = 'PT Rialachas | Our Training Program';
?>

<div class="login-content2 first-content parallax" id="index-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="index-intro2">
                    <h3 class="text-bold text-upper">Training Programs</h3>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="process">
    <div>&nbsp;</div>
    <div class="title-section text-center">
        <span>Latest Events</span>
    </div>
    <div class="container">
        <div class="row">
            <?php \yii\widgets\Pjax::begin(['id'=>'pjax-news', 'timeout' => false,'enablePushState' => false,'linkSelector' => 'a.download']); ?>                   
            <?php
                $dataProvider = new ActiveDataProvider([
                    'query' => $events,
                    'pagination' => [
                        'pageSize' => 5,
                    ],
                ]);
                
                echo ListView::widget([
                    'id'=>'record-gridview',
                    'dataProvider' => $dataProvider,
                    'itemView' => '_event',
                    'itemOptions'=>['tag'=>'div', 'class'=>'grid-itemx'],
                    'options'=>['class'=>'gridx', 'tag'=>'div'],
                    'layout' => '{items}<div class="grid-item" style="display:block; width:100% !important;">{pager}</div>'
                ]);
        
                
            ?>
            <?php \yii\widgets\Pjax::end(); ?>
            
            <div class="col-md-12">
                <div>&nbsp;</div>
            </div>
        </div>
    </div>
    <div class="title-section text-center">
        <span>Training Programs</span>
    </div>
    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
                <div class="process-item">
                    <div class="row">
                        <div class="col-md-4">
                            <div>&nbsp;</div>
                            <div class="process-img">
                                <?= Html::img('@web/uploads/enterpreneurial.png', []); ?>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="process-content">
                                <i class="fa fa-quote-left fa-3x fa-pull-left fa-border"></i>
                                Our training team incorporates a progressive learning methodology which aids the  comprehension of techniques and tools alike while facing newer challenges. We have developed a set of standard courses outlined in various domains of the governance of enterprise IT. In addition. we also offer  customized courses for participants from backgrounds with specific requirements. We provide after course services to ensure that the participants learning progress is on track to achieve their specific goals.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div>&nbsp;</div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            &nbsp;
            <hr />
            </div>
        </div>        
    </div>
    <div class="container">
        <div class="row">
            <?php
            if($trainings != null): 
                foreach ($trainings as $training):
            ?>
            <div class="col-md-4">
                <div class="process-item">
                    <div class="process-desc text-upper text-bold">
                        <?= Html::encode($training->title); ?>
                    </div>
                    <div class="process-content">
                        <?= Html::img('@web/uploads/cms/'.$training->image, ['class'=>'img-left']); ?>
                        <?= Html::decode($training->content); ?>
                    </div>
                </div>
            </div>
            <?php 
                endforeach;
            endif; 
            ?>
            
            
        </div>
    </div>
    
</div>