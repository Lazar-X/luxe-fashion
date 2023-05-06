<style>
    <?php
        require_once '../config/connection.php';
        require_once '../logic/functions.php';
        if(isset($_SESSION['user'])) {
            $numItems = countProductsFromCart();
            echo '.cart-link::before {
                content: "'.$numItems.'";
            }';
        }
        else {
            echo '.cart-link::before {
                content: "";
                display: none;
            }.cart-link::after {
                content: "";
                display: none;
            }';
        }
    ?>
</style>
<nav class="py-4">
    <div class="container">
        <div class="row align-items-md-center">
            <div class="col-md-3 col-10">
                <a href="index.php"><h1 class="font-weight-bold">Luxe Fashion</h1></a>
            </div>
            <div id="menu" class="col-md-9 col-12">
                <div class="row">
                    <div class="col-md-11 col-12">
                        <ul class="d-flex justify-content-center pt-md-2 flex-md-row flex-column align-items-center">
                            <?php
                                require_once '../config/connection.php';
                                require_once '../logic/functions.php';
                                $navigation = navigationSelect();
                                if($navigation) {
                                    foreach ($navigation as $navItem) {
                                        if($navItem -> navigation_group_name == 'navbar') {
                                            echo '<li class="ml-3"><a href="'.$navItem -> navigation_href.'">'.$navItem -> navigation_title.'</a></li>';
                                        }
                                    }
                                }
                                else {
                                    echo 'Sorry, there are currently no navigation links available.';
                                }
                            ?>
                        </ul>
                    </div>
                    <div class="col-md-1 col-12 d-flex justify-content-center align-items-center">
                        <a href="cart.php" class="cart-link"><i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                </div>
            </div>
            <a href="#" id="toggle-button">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>
        </div>
    </div>
</nav>