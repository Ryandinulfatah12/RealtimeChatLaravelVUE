<?php

Broadcast::channel('channel-chat', function ($user) {
    return [
    	'id'=>$user->id, 'name'=>$user->name
    ];
});
