<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
$this->title = 'PT Rialachas | Our Services';
?>

<div class="login-content2 first-content parallax" id="index-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="index-intro2">
                    <h3 class="text-bold text-upper">Our Consultancy Services</h3>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="process">
    <div class="title-section text-center">
        <span>Our Consultancy Services</span>
    </div>
    <div class="container">
        <div class="row">
            <?php
            if($services != null): 
                foreach ($services as $service):
            ?>
            <div class="col-md-4">
                <div class="process-item">
                    <h4 class="text-upper text-bold text-center process-title">
                        <?= Html::encode($service->title); ?>
                    </h4>
                    <div class="process-img">
                        <?= Html::img('@web/uploads/cms/'.$service->image, []); ?>
                    </div>
                    <div class="process-content">
                        <i class="fa fa-quote-left fa-3x fa-pull-left fa-border"></i>
                         <?= Html::decode($service->content); ?>  
                    </div>
                </div>
            </div>
            <?php 
                endforeach;
            endif; 
            ?>
            
            <div class="col-md-12">
                <div>&nbsp;</div>
            </div>
        </div>
    </div>
</div>

<div class="services" id="features">
    <div class="container">
        <div class="row">
            <div class="col-md-4">                
                <div class="title-section">
                    <span>Our Services</span>
                </div>
                <div class="row">
                    <?php
                    if($services != null): 
                        foreach ($services as $service):
                    ?>
                    <div class="col-md-12">
                        <div class="services-item">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="text-center text-green">
                                        <i class="fa fa-laptop fa-4x fa-pull-left text-green"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="services-item-title">
                                        <?= Html::encode($service->title); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <?php 
                        endforeach;
                    endif; 
                    ?>
                </div>
            </div>
            <div class="col-md-8">   
                <div class="title-section">
                    <span></span>
                </div>
                <div class="service-img">             
                   <div class="mockup-browser">
                        <?= Html::img('@web/uploads/it-infrastructure.jpg', ['style'=>'width:100%;']); ?>
                   </div> 
               </div>
            </div>
            
        </div>
    </div>
</div>