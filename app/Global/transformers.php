<?php

function transformer_collection(&$items, \League\Fractal\TransformerAbstract $transformer, $includes = [], $meta = [])
{
	$manager = new \League\Fractal\Manager();
	$manager->setSerializer(new \App\Transformers\DataArraySerializer());
	$resource = new \League\Fractal\Resource\Collection($items, $transformer);

	if(is_array($includes)){
		foreach($includes as $key => $value){
			if(trim($value) == ''){
                unset($includes[$key]);
            }
		}
	}

	if($includes){
		$manager->parseIncludes($includes);
    }

	if($meta){
		$resource->setMeta($meta);
	}

	$vars = $manager->createData($resource)->toArray();

	return $vars;
}

function transformer_item(&$item, \League\Fractal\TransformerAbstract $transformer, $includes = [])
{
	$manager = new \League\Fractal\Manager();
	$manager->setSerializer(new \App\Transformers\DataArraySerializer());
	$resource = new \League\Fractal\Resource\Item($item, $transformer);

	if(is_array($includes)){
		foreach($includes as $key => $value){
			if(trim($value) == ''){
                unset($includes[$key]);
            }
		}
	}
	if($includes){
		$manager->parseIncludes($includes);
    }

	$var = $manager->createData($resource)->toArray();

	if(isset($var['data'])) return $var['data'];

	return $var;
}

function transformer_paginator(&$items, \League\Fractal\TransformerAbstract $transformer, $includes = [], $meta = [])
{
	$manager = new \League\Fractal\Manager();
	$manager->setSerializer(new \App\Transformers\DataArraySerializer());
	$paginator = new \League\Fractal\Pagination\IlluminatePaginatorAdapter($items);
	$resource = new \League\Fractal\Resource\Collection($items, $transformer);
	$paginator = new \League\Fractal\Pagination\IlluminatePaginatorAdapter($items);

	if(is_array($includes)){
		foreach($includes as $key => $value){
			if(trim($value) == '')
				unset($includes[$key]);
		}
	}

	if($includes){
		$manager->parseIncludes($includes);
	}

	if($meta){
		$resource->setMeta($meta);
	}

	$resource->setPaginator($paginator);
	$vars = $manager->createData($resource)->toArray();
	return $vars;
}