<header>
            <a href="index.php" class="logo-link">
                <div class="logo">
                    <img src="img/logo.svg" alt="Логотип">
                </div>
            </a>

            <div class="header-buttons">

            <?php
                if (isset($_SESSION['fio'])) {
                    if ($_SESSION['role'] ==0) {echo "<a href='user.php' class='middle-button cabinet-button'>Личный кабинет</a>";}
                    elseif ($_SESSION['role'] == 1) {echo "<a href='admin.php' class='middle-button cabinet-button'>Личный кабинет</a>";}

                    echo "<a href='exit.php' class='middle-button exit-button'>Выйти</a>";
                } else {
//                    echo "<div id='loginButton' class='middle-button auth-button'>Войти</div>";
//                    echo "<div id='registrationButton' class='middle-button register-button'>Регистрация</div>";
                    echo "<a href='auth.php' class='middle-button auth-button'>Войти</a>";
                    echo "<a href='reg.php' class='middle-button register-button'>Регистрация</a>";
                }
            ?>
            </div>
</header>

