<?php 

function isActive($route){
    return request()->is($route)? 'active':'';
}

function validacion($errors,$field){
    return   $errors->has($field)? '<div class="form-control-feedback text-danger">'
    .$errors->first($field).'</div>':''; 

}