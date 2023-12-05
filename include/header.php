<header>
            <a href="index.php" class="logo-link">
                <div class="logo">
                    <img src="img/logo.svg" alt="Логотип">
                </div>
            </a>

            <div class="auth-buttons">
            <?php
                if (isset($_SESSION['fio'])) {
                    if ($_SESSION['role'] ==0) {echo "<a href='user.php'>Личный кабинет</a>";}
                    elseif ($_SESSION['role'] == 1) {echo "<a href='admin.php'>Личный кабинет</a>";}

                    echo "<button id='logoutButton'>Выйти</button>";
                } else {
                    echo "<button id='loginButton'>Авторизация</button>";
                    echo "<button id='registrationButton' class='register-button'>Регистрация</button>";
                }


            ?>
            </div>
    </header>

