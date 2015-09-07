<?php
/* @var $this yii\web\View */
use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Exam Simulator';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-content first-content" id="index-content">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-8">
                <div class="index-intro">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </div>
                <div>
                <a class="btn btn-danger btn-lg">Take a Test <i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="process">
    <div class="title-section text-center">
        <span>Our Simple Process</span>
    </div>
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
</div>

<div class="services" id="features">
    <div class="container">
        <div class="row">
            <div class="col-md-8">   
                <div class="title-section">
                    <span></span>
                </div>
                <div class="service-img">             
               <div class="mockup-browser">
                    <?= Html::img('@web/uploads/img/browser.jpg', ['style'=>'width:100%;']); ?>
               </div> 
               </div>
            </div>
            <div class="col-md-4">                
                <div class="title-section">
                    <span>Our Features</span>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="services-item">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="text-center">
                                        <i class="fa fa-bank fa-3x fa-pull-left"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="services-item-title">
                                        Biggest Questions Bank
                                    </div>
                                    <div class="services-item-desc">
                                        Over 100 Million Thousand Questions in our library.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="services-item">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="text-center">
                                        <i class="fa fa-money fa-3x fa-pull-left"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="services-item-title">
                                        Our Tests is Totally Free 
                                    </div>
                                    <div class="services-item-desc">
                                        Over 100 Million Thousand Questions in our library.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="services-item">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="text-center">
                                        <i class="fa fa-line-chart fa-3x fa-pull-left"></i>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="services-item-title">
                                        25 Million People Tested 
                                    </div>
                                    <div class="services-item-desc">
                                        Over 100 Million Thousand Questions in our library.
                                    </div>
                                </div>
                            </div>
                        </div>
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
                <span>Our Exam</span>
            </div>
            <div class="col-md-4">
                <div class="services-item">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="text-center">
                                <i class="fa fa-bank fa-3x fa-pull-left"></i>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="services-item-desc">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="services-item">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="text-center">
                                <i class="fa fa-money fa-3x fa-pull-left"></i>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="services-item-desc">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="services-item">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="text-center">
                                <i class="fa fa-line-chart fa-3x fa-pull-left"></i>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="services-item-desc">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="services-item">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="text-center">
                                <i class="fa fa-bank fa-3x fa-pull-left"></i>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="services-item-desc">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="services-item">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="text-center">
                                <i class="fa fa-money fa-3x fa-pull-left"></i>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="services-item-desc">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="services-item">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="text-center">
                                <i class="fa fa-line-chart fa-3x fa-pull-left"></i>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="services-item-desc">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pricing">
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
</div>

