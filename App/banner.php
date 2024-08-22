<div class="col-sm-7">
    <div class="banner-container">
        <p class="fw-bold fs-1">Lorem ipsum dolor sit amet consectetur adipisicing.</p>
        <p class="fs-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae minima tempora aut</p>

        <div class="mb-5">
            <i class="fa-solid fa-star star-icon"></i>
            <i class="fa-solid fa-star star-icon"></i>
            <i class="fa-solid fa-star star-icon"></i>
            <i class="fa-solid fa-star star-icon"></i>
            <i class="fa-solid fa-star star-icon"></i>
            <span>5.0</span>
            <div><span>+200 comentários</span></div>
        </div>

        <div class="arrows">
            <?php
            $current_page = basename($_SERVER['PHP_SELF']);

            $loginPage = ($current_page === 'login.php') ? 'invisible' : '';
            $registerPage = ($current_page === 'register.php') ? 'invisible' : '';
            ?>

            <a href="login.php" class="<?php echo $loginPage ?>"><span
                    class="material-symbols-outlined rotate">trending_flat</span></a>

            <a href="register.php" class="<?php echo $registerPage ?>"><span
                    class="material-symbols-outlined">trending_flat</span></a>

        </div>
    </div>
</div>
</div>