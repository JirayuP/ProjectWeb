<?php
$eventId = $_GET['event_id'] ?? 0;

if ($eventId > 0) {
    $participants = getParticipants($eventId);
    renderView('participants', [
        'participants' => $participants
    ]); //
} else {
    header('Location: /');
    exit;
}