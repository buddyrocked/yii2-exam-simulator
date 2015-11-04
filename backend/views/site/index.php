<?php
/* @var $this yii\web\View */
use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Exam Simulator';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="login-content first-content parallax" id="index-content">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-8">
                <div class="index-intro">
                    <?php
                    if(isset($intro->content))
                    {
                        echo ($intro->is_html == true)?Html::decode($intro->content):strip_tags($intro->content);
                    }
                    ?>
                </div>
                <div class="row registration-block">
                        <div class="col-sm-10">
                            <?php echo "If you do not have any account, please kindly "; ?>
                            <?= GhostHtml::a(
                                UserManagementModule::t('front', " Sign Up"),
                                ['/user-management/auth/registration']
                            ) ?>
                        </div>
                </div>
                <div>&nbsp;</div>
                <div>
                <?php echo Html::a('Take A Test', ['/simulation/take'], ['class'=>'btn btn-danger btn-lg']); ?>
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
                        <?php
                        if(isset($process1->title))
                        {
                            echo ($process1->is_html == true)?Html::decode($process1->title):strip_tags($process1->title);
                        }
                        ?>
                    </div>
                    <div>
                        <?php
                        if(isset($process1->content))
                        {
                            echo ($process1->is_html == true)?Html::decode($process1->content):strip_tags($process1->content);
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="process-item process-item-2 active">
                    <div class="process-icon">
                        <i class="fa fa-map"></i>
                    </div>
                    <div class="process-desc">
                        <?php
                        if(isset($process2->title))
                        {
                            echo ($process2->is_html == true)?Html::decode($process2->title):strip_tags($process2->title);
                        }
                        ?>
                    </div>
                    <div>
                        <?php
                        if(isset($process2->content))
                        {
                            echo ($process2->is_html == true)?Html::decode($process2->content):strip_tags($process2->content);
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="process-item process-item-3 active">
                    <div class="process-icon">
                        <i class="fa fa-trophy"></i>
                    </div>
                    <div class="process-desc">
                        <?php
                        if(isset($process3->title))
                        {
                            echo ($process3->is_html == true)?Html::decode($process3->title):strip_tags($process3->title);
                        }
                        ?>
                    </div>
                    <div>
                        <?php
                        if(isset($process3->content))
                        {
                            echo ($process3->is_html == true)?Html::decode($process3->content):strip_tags($process3->content);
                        }
                        ?>
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
                                        <?php
                                        if(isset($features1->title))
                                        {
                                            echo ($features1->is_html == true)?Html::decode($features1->title):strip_tags($features1->title);
                                        }
                                        ?>
                                    </div>
                                    <div class="services-item-desc">
                                        <?php
                                        if(isset($features1->content))
                                        {
                                            echo ($features1->is_html == true)?Html::decode($features1->content):strip_tags($features1->content);
                                        }
                                        ?>
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
                                        <?php
                                        if(isset($features2->title))
                                        {
                                            echo ($features2->is_html == true)?Html::decode($features2->title):strip_tags($features2->title);
                                        }
                                        ?>
                                    </div>
                                    <div class="services-item-desc">
                                        <?php
                                        if(isset($features2->content))
                                        {
                                            echo ($features2->is_html == true)?Html::decode($features2->content):strip_tags($features2->content);
                                        }
                                        ?>
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
                                        <?php
                                        if(isset($features3->title))
                                        {
                                            echo ($features3->is_html == true)?Html::decode($features3->title):strip_tags($features3->title);
                                        }
                                        ?>
                                    </div>
                                    <div class="services-item-desc">
                                        <?php
                                        if(isset($features3->content))
                                        {
                                            echo ($features3->is_html == true)?Html::decode($features3->content):strip_tags($features3->content);
                                        }
                                        ?>
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
                <span>Scrudu Online Exam Simulation Benefits</span>
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
                                <?php
                                if(isset($Advantages1->content))
                                {
                                echo ($Advantages1->is_html == true)?Html::decode($Advantages1->content):strip_tags($Advantages1->content);
                                }
                                ?>
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
                                <?php
                                if(isset($Advantages2->content))
                                {
                                echo ($Advantages2->is_html == true)?Html::decode($Advantages2->content):strip_tags($Advantages2->content);
                                }
                                ?>
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
                                <?php
                                if(isset($Advantages3->content))
                                {
                                echo ($Advantages3->is_html == true)?Html::decode($Advantages3->content):strip_tags($Advantages3->content);
                                }
                                ?>
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
                                <i class="fa fa-3x fa-pull-left"></i>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="services-item-desc">
                                <?php
                                if(isset($Advantages4->content))
                                {
                                echo ($Advantages4->is_html == true)?Html::decode($Advantages4->content):strip_tags($Advantages4->content);
                                }
                                ?>
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
                                <i class="fa fa-3x fa-pull-left"></i>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="services-item-desc">
                                <?php
                                if(isset($Advantages5->content))
                                {
                                echo ($Advantages5->is_html == true)?Html::decode($Advantages5->content):strip_tags($Advantages5->content);
                                }
                                ?>
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
                                <i class="fa fa-3x fa-pull-left"></i>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="services-item-desc">
                                <?php
                                if(isset($Advantages6->content))
                                {
                                echo ($Advantages6->is_html == true)?Html::decode($Advantages6->content):strip_tags($Advantages6->content);
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--
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
-->
