<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand">
            <h3 class="px-5">
                <i class="fas fa-laptop-house pr-3"></i>Eastore
            </h3>
        </a>
        <button class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup"
            aria-expanded="false"
            aria-label="Toggle Navigation"
        >
            <span class="navbar-toggler-icon"></span>       
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i> Cart
                        <?php
                            if(isset($_SESSION['cart'])) {
                                $count = count($_SESSION['cart']);
                                echo "<span class=\"ml-4 px-3 pb-1 text-center text-warning bg-light rounded-circle\">$count</span>";
                            } else {
                                echo "<span class=\"ml-4 px-3 pb-1 text-center text-warning bg-light rounded-circle\">0</span>";
                            }
                        ?>
                    </h5>
                </a>
            </div>
        </div>
    </nav>
</header>