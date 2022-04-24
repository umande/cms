<?php
function isLoggedIn($username) {
    if($username) {
        return true;
    }
    return false;
}

function isAdmin($role) {
    if ($role === 'Admin') {
        return true;
    }
    return false;
}
?>