<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
$zip = new ZipArchive;
                    if ($zip->open('zip/zip_5f221b9391a9e.ZIP') === TRUE) {
                        $zip->extractTo('zip/');
                        $zip->close();
                        //echo 'ok';
                    } else {
                        //echo 'failed';
                    }
                    ?>