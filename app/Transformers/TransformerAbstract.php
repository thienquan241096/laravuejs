<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract as TransformerAbstractFractal;

abstract class TransformerAbstract extends TransformerAbstractFractal
{
    /**
     * set defaultIncludes
     */
    public function setDefaultIncludes($includes = null){
        if(!$includes) return;

        if(!$this->defaultIncludes) $this->defaultIncludes = [];

        if(is_string($includes)){
            $includes = explode(',', $includes);
        }
        foreach($includes as $key => $value){
            $include = trim($value);

            if($include && !in_array($include, $this->defaultIncludes)){
                $this->defaultIncludes[] = $include;
            }
        }
    }

    /**
     * set add field
     */
    public function setAddField($addFields = null){
        if(!$addFields) return;

        if(!$this->addFields) $this->addFields = [];

        if(is_string($addFields)){
            $addFields = explode(',', $addFields);
        }
        foreach($addFields as $key => $value){
            $addField = trim($value);

            if($addField && !in_array($addField, $this->addFields)){
                $this->addFields[] = $addField;
            }
        }
    }
}

