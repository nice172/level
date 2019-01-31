<?php

/**
 * 钩子行为
 */
if (!function_exists('hook')) {
    function hook($behavior, $params) {
        \think\facade\Hook::exec($behavior, $params);
    }
}

/**
 * 编辑按钮
 */
if (!function_exists('editButton')) {
    function editButton( $url,  $name = '编辑') {
        return sprintf('<a href="%s"><button class="btn btn-info btn-xs edit" type="button"><i class="fa fa-paste"></i> %s</button></a>', $url, $name);
    }
}

/**
 * 增加按钮
 */
if (!function_exists('createButton')) {
    function createButton($url, $name, $isBig = true) {
        return $isBig ? sprintf('<a href="%s"> <button type="button" class="btn btn-w-m btn-primary"><i class="fa fa-check-square-o"></i> %s</button></a>', $url, $name) :
        sprintf('<a href="%s"> <button type="button" class="btn btn-xs btn-primary"><i class="fa fa-check-square-o"></i> %s</button></a>', $url, $name);
    }
}

/**
 * 删除按钮
 */
if (!function_exists('deleteButton')) {
    function deleteButton( $url, $id,  $name="删除") {
        return sprintf('<button class="btn btn-danger btn-xs delete" data-url="%s" data=%d type="button"><i class="fa fa-trash"></i> %s</button>', $url, $id, $name);
    }
}

/**
 * 搜索按钮
 */
if (!function_exists('searchButton')) {
    function searchButton( $name="搜索") {
        return sprintf('<button class="btn btn-white" type="submit"><i class="fa fa-search"></i> %s</button>', $name);
    }
}

/**
 * 生成密码
 */
if (!function_exists('generatePassword')) {
    function generatePassword(  $password, $algo = PASSWORD_DEFAULT) {
        return password_hash($password, $algo);
    }
}