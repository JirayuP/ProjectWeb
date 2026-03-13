<?php

$userId = $_SESSION['user_id'] ?? 0; 

if ($userId > 0) {
    $myEvents = getMyRegistrations($userId);
    renderView('my_events', [
        'myEvents' => $myEvents
    ]); 
} else {
    
    header('Location: /');
    exit;
}