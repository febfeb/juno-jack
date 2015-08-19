<?php
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');

Yii::setAlias('thumbnail_upload_path', dirname(dirname(__DIR__)) . '/frontend/web/uploads/thumbnails');
Yii::setAlias('merk_upload_path', dirname(dirname(__DIR__)) . '/frontend/web/uploads/merk');
Yii::setAlias('kategori_upload_path', dirname(dirname(__DIR__)) . '/frontend/web/uploads/kategori');
Yii::setAlias('gambar_upload_path', dirname(dirname(__DIR__)) . '/frontend/web/uploads/gambar');

$frontURL = "http://localhost/juno-jack/frontend/web/";

Yii::setAlias('frontend_url', $frontURL);
Yii::setAlias('thumbnail_url', $frontURL."uploads/thumbnails");
Yii::setAlias('merk_url', $frontURL."uploads/merk");
Yii::setAlias('kategori_url', $frontURL."uploads/kategori");
Yii::setAlias('gambar_url', $frontURL."uploads/gambar");

Yii::setAlias('backend_url', '../../backend/web/uploads');
