<?php
$username = "";
$gdate = date("m-d-Y") . ",  " . date("l");
?>

<!----------- header ------------>
<header id="la-header">
    <div class="la-logo">
        <a href=""><img class="la-logoimg" src="/img/logo.png" alt="logo"></a>
    </div>
    <div class="la-greeting">
        Hi, Ella Qi ! <?= $username; ?> <span>Today is <?= $gdate; ?>.</span>
    </div>
    <div class="la-log">
        <button class="la-logout">
            <a href="">Log out</a>
        </button>

        <button class="la-faq">
            <a href="">FAQ</a>
        </button>
    </div>
</header>



