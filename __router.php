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
    include __DIR__.'/views/not-found.php';
}
else if($path_length == 0) {
    include __DIR__.'/views/index.php';
}
else {
    $endpoint = $filtered_path[0];
    switch($endpoint){

        //views
        case 'users':
            include __DIR__.'/views/user/table.php';
            break;
        case 'user-create':
            include __DIR__.'/views/user/create.php';
            break;
        case 'user-update':
            include __DIR__.'/views/user/update.php';
            break;
        case 'file':
            include __DIR__.'/views/file/view.php';
            break;
        case 'files':
            include __DIR__.'/views/file/table.php';
            break;
        case 'answer':
            include __DIR__.'/views/answer.php';
            break;
        

        //actions
        case 'user-create-action':
            include __DIR__.'/api/user/create.php';
            break;
        case 'user-update-action':
            include __DIR__.'/api/user/update.php';
            break;
        case 'user-delete-action':
            include __DIR__.'/api/user/delete.php';
            break;
        case 'file-upload-action':
            include __DIR__.'/api/file/upload.php';
            break;
        case 'file-delete-action':
            include __DIR__.'/api/file/delete.php';
            break;
        case 'file-send-action':
            include __DIR__.'/api/file/send.php';
            break;
        
        
        default:
            include __DIR__.'/not-found.php';
            break;
    }
}


?>