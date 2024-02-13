<?php

//парсим url
$path = parse_url($_SERVER['REQUEST_URI'])["path"];
$splited_path = array_filter(explode('/', $path));
$filtered_path = [];
foreach($splited_path as $key => $value){
    array_push($filtered_path, $value);
}
$path_length = count($filtered_path);


if($path_length > 1) {
    include __DIR__.'/not-found.php';
}
else if($path_length == 0) {
    include __DIR__.'/index.php';
}
else {
    $endpoint = $filtered_path[0];
    switch($endpoint){

        //views
        case 'users':
            include __DIR__.'/components/User/table.php';
            break;
        case 'user-create':
            include __DIR__.'/components/User/create.php';
            break;
        case 'user-update':
            include __DIR__.'/components/User/update.php';
            break;
        case 'file':
            include __DIR__.'/components/File/view.php';
            break;
        case 'files':
            include __DIR__.'/components/File/table.php';
            break;
        

        //actions
        case 'user-create-action':
            include __DIR__.'/actions/user/create.php';
            break;
        case 'user-update-action':
            include __DIR__.'/actions/user/update.php';
            break;
        case 'user-delete-action':
            include __DIR__.'/actions/user/delete.php';
            break;
        case 'file-upload-action':
            include __DIR__.'/actions/file/upload.php';
            break;
        case 'file-delete-action':
            include __DIR__.'/actions/file/delete.php';
            break;
        case 'file-send-action':
            include __DIR__.'/actions/file/send.php';
            break;
        
        
        default:
            include __DIR__.'/not-found.php';
            break;
    }
}


?>