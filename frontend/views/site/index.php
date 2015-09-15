<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
$this->title = '| Consulting | Implementation | Audit | Training | - Rialachas ...means governance';
?>

<div class="login-content first-content parallax" id="index-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="index-intro">
                    <h2 class="text-bold">Rialachas ...means governance</h2>
                    <div>
                    The word Rialachas, adopted from Irish language, means governance. We provide services in consultancy and training related to information systems security in Indonesia. Our solid team members have many years of experience in the exciting field of governance of enterprise IT, especially in information systems security. In Rialachas, we do believe that knowledge grows whenever it is shared.
                    </div>
                    <div>&nbsp;</div>
                    <div>
                    <a href="<?= Url::to(['site/services']); ?>" class="btn btn-green btn-lg"> Our Services <i class="fa fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="process">
    <div class="title-section text-center">
        <span>Corporate Latest Issue</span>
    </div>
    <div class="container">
        <div class="row">
            <?php
            if($latest_issues != null): 
                foreach ($latest_issues as $issue):
            ?>

            <div class="col-md-3 colapse">
                <div class="process-item">
                    <div class="process-desc text-center text-upper">
                        <?= Html::encode($issue->title); ?>
                    </div>
                    <div class="process-img">
                        <?= Html::img('@web/uploads/cms/'.$issue->image, []); ?>
                        <div class="process-img-hover"></div>
                    </div>
                    <div class="process-content">
                        <?= Html::decode($issue->content); ?>    
                    </div>
                </div>
            </div>
            <?php 
                endforeach;
            endif; 
            ?>
            
        </div>
    </div>
    <!--
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="process-item process-item-1 active">
                    <div class="process-icon">
                        <i class="fa fa-tablet"></i>
                    </div>
                    <div class="process-desc">
                        Register your account
                    </div>
                    <div>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="process-item process-item-2 active">
                    <div class="process-icon">
                        <i class="fa fa-map"></i>
                    </div>
                    <div class="process-desc">
                        Take a Test
                    </div>
                    <div>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="process-item process-item-3 active">
                    <div class="process-icon">
                        <i class="fa fa-trophy"></i>
                    </div>
                    <div class="process-desc">
                        Get a Score
                    </div>
                    <div>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    </div>
                </div>
            </div>   
        </div>
    </div>
    -->
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
                                    <div class="text-center">
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
                    <div>&nbsp;</div>
                    <a href="<?= Url::to(['site/services']); ?>" class="btn btn-green btn-lg btn-block"> Our Services <i class="fa fa-chevron-right"></i></a>
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
<div class="exam">
    <div class="container"  id="about">
        <div class="row">
            <div class="title-section text-center">
                <span>Our Partners & Clients</span>
            </div>
            <div class="col-md-3">

            </div>
            <div class="col-md-3">

            </div>
            <div class="col-md-3">

            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>
</div>
<!--<div class="pricing">
    <div class="container">
        <div class="row">            
            <div class="title-section text-center">
                <span>Pricing</span>
            </div>
            <figure class="mockup-grid__item col-md-4">
                <div class="mockup-pricing paint-area">
                    <h3 class="mockup-heading mockup-heading--box paint-area"><span>Free</span></h3>
                    <div class="mockup-bigtext"><span class="paint-area paint-area--text">$0</span></div>
                    <div class="mockup-list-wrap paint-area">
                        <ul class="mockup-list paint-area paint-area--text">
                            <li>1 exam</li>
                            <li>200 questions</li>
                            <li>Basic toolset</li>
                        </ul>
                    </div>
                    <button class="mockup-button paint-area"><span>Sign up</span> <i class="fa fa-chevron-right"></i></button>
                </div>
            </figure>
            <figure class="mockup-grid__item col-md-4">
                <div class="mockup-pricing paint-area">
                    <h3 class="mockup-heading mockup-heading--box paint-area"><span>Professional</span></h3>
                    <div class="mockup-bigtext"><span class="paint-area paint-area--text">$99</span></div>
                    <div class="mockup-list-wrap paint-area">
                        <ul class="mockup-list paint-area paint-area--text">
                            <li>10 Exams</li>
                            <li>2000 questions</li>
                            <li>Advanced toolset</li>
                        </ul>
                    </div>
                    <button class="mockup-button paint-area"><span>Sign up</span> <i class="fa fa-chevron-right"></i></button>
                </div>
            </figure>
            <figure class="mockup-grid__item col-md-4">
                <div class="mockup-pricing paint-area">
                    <h3 class="mockup-heading mockup-heading--box paint-area"><span>Premium</span></h3>
                    <div class="mockup-bigtext"><span class="paint-area paint-area--text">$199</span></div>
                    <div class="mockup-list-wrap paint-area">
                        <ul class="mockup-list paint-area paint-area--text">
                            <li>Unlimited Exams</li>
                            <li>Unlimited questions</li>
                            <li>Full toolset</li>
                        </ul>
                    </div>
                    <button class="mockup-button paint-area"><span>Sign up</span> <i class="fa fa-chevron-right"></i></button>
                </div>
            </figure>
        </div>    
    </div>
</div>-->