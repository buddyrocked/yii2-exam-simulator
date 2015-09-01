<?php
use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
backend\themes\adminLTE\components\CustomAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style type="text/css">
        img {
            max-width: 100%;
        }
        body {
            -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em;
        }
        body {
            background-color: #f6f6f6;
        }

        table th {
            text-align: left;
            font-size: 12px !important;
            border-bottom: 1px solid #666;
            text-transform: uppercase;
        }

        .table {
            border-collapse: collapse !important;
          }
          .table td,
          .table th {
            background-color: #fff !important;
          }
          .table-bordered th,
          .table-bordered td {
            border: 1px solid #ddd !important;
          }

                .table {
          width: 100%;
          max-width: 100%;
          margin-bottom: 20px;
        }
        .table > thead > tr > th,
        .table > tbody > tr > th,
        .table > tfoot > tr > th,
        .table > thead > tr > td,
        .table > tbody > tr > td,
        .table > tfoot > tr > td {
          padding: 8px;
          line-height: 1.42857143;
          vertical-align: top;
          border-top: 1px solid #ddd;
        }
        .table > thead > tr > th {
          vertical-align: bottom;
          border-bottom: 2px solid #ddd;
        }
        .table > caption + thead > tr:first-child > th,
        .table > colgroup + thead > tr:first-child > th,
        .table > thead:first-child > tr:first-child > th,
        .table > caption + thead > tr:first-child > td,
        .table > colgroup + thead > tr:first-child > td,
        .table > thead:first-child > tr:first-child > td {
          border-top: 0;
        }
        .table > tbody + tbody {
          border-top: 2px solid #ddd;
        }
        .table .table {
          background-color: #fff;
        }
        .table-condensed > thead > tr > th,
        .table-condensed > tbody > tr > th,
        .table-condensed > tfoot > tr > th,
        .table-condensed > thead > tr > td,
        .table-condensed > tbody > tr > td,
        .table-condensed > tfoot > tr > td {
          padding: 5px;
        }
        .table-bordered {
          border: 1px solid #ddd;
        }
        .table-bordered > thead > tr > th,
        .table-bordered > tbody > tr > th,
        .table-bordered > tfoot > tr > th,
        .table-bordered > thead > tr > td,
        .table-bordered > tbody > tr > td,
        .table-bordered > tfoot > tr > td {
          border: 1px solid #ddd;
        }
        .table-bordered > thead > tr > th,
        .table-bordered > thead > tr > td {
          border-bottom-width: 2px;
        }
        .table-striped > tbody > tr:nth-of-type(odd) {
          background-color: #f9f9f9;
        }
        .table-hover > tbody > tr:hover {
          background-color: #f5f5f5;
        }

        .full-width {
            table-layout: fixed;
            width: 100% !important;
        }

        .email-font {
            font-size: 12px !important;
        }

        .text-mini {
            font-size: 10px;
            color: #666;
        }

        .text-bold {
            font-weight: bold;
        }

        @media only screen and (max-width: 640px) {
            body {
            padding: 0 !important;
            }
            h1 {
            font-weight: 800 !important; margin: 20px 0 5px !important;
            }
            h2 {
            font-weight: 800 !important; margin: 20px 0 5px !important;
            }
            h3 {
            font-weight: 800 !important; margin: 20px 0 5px !important;
            }
            h4 {
            font-weight: 800 !important; margin: 20px 0 5px !important;
            }
            h1 {
            font-size: 22px !important;
            }
            h2 {
            font-size: 18px !important;
            }
            h3 {
            font-size: 16px !important;
            }
            .container {
            padding: 0 !important; width: 100% !important;
            }
            .content {
            padding: 0 !important;
            }
            .content-wrap {
            padding: 10px !important;
            }
            .invoice {
            width: 100% !important;
            }
        }
    </style>
</head>
<body itemscope itemtype="http://schema.org/EmailMessage" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">
    <?php $this->beginBody() ?>
    <?= $content ?>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
