<?php

class FileUpload extends AppModel {

    public function initialize(array $config){
        $this->addBehavior('Timestamp');
    }


}