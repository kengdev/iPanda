<?php

$access_token = 'EABDpq01cuYMBANUycT4UYnYDVaqxLpZBlmjeR46MDdEGQb2laU8ZBXMX6aRgv7bj6NBRiyPoXP0nGzaKPotBZAw77VCCGkGim8QXhPHYnw6bDgQHZB5ZCa7SRUaGdTZAb8k36b1Aad5L3PWX2zvo5qtwBkehd6pJ4JY6NHcucvkQAN9BHJmegvf4hBmPntjJF8qi0HNUS1kwZDZD';

/* validate verify token needed for setting up web hook */ 

if (isset($_GET['hub_verify_token'])) { 
    if ($_GET['hub_verify_token'] === $access_token) {
        echo $_GET['hub_challenge'];
        return;
    } else {
        echo 'Invalid Verify Token';
        return;
    }
}
