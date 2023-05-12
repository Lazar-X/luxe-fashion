<?php
    require_once '../config/connection.php';
    require_once '../logic/functions.php';
?>
<footer class="pt-5">
    <div class="container">
        <div class="row d-flex justify-content-around">
            <div class="col-md-4 col-12 mb-md-0 mb-3">
                <h3 class="mb-4">Luxe Fashion</h3>
                <p class="text-md-left text-center">Shop with confidence - easy returns and fast shipping.</p>
                <ul class="mt-4 d-flex justify-content-md-start justify-content-center text-center list-social">
                    <?php
                        $navigation = navigationSelect();
                        if($navigation) {
                            foreach ($navigation as $navItem) {
                                if($navItem -> navigation_group_name == 'social') {
                                    if($navItem -> navigation_title == 'instagram') {
                                        echo '<li class="mr-2"><a href="'.$navItem -> navigation_href.'" target="_blank"><i class="fa-brands fa-square-'.$navItem -> navigation_title.'"></i></a></li>';
                                    }
                                    else {
                                        echo '<li class="mr-2"><a href="'.$navItem -> navigation_href.'" target="_blank"><i class="fa-brands fa-'.$navItem -> navigation_title.'"></i></a></li>';
                                    }
                                }
                            }
                        }
                        else {
                            echo 'Sorry, there are currently no navigation links available.';
                        }
                    ?>
                </ul>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <h3 class="mb-4">Information</h3>
                <ul>
                    <?php
                        $navigation = navigationSelect();
                        if($navigation) {
                            foreach ($navigation as $navItem) {
                                if($navItem -> navigation_group_name == 'navbar') {
                                    echo '<li class="mb-2"><a href="'.$navItem -> navigation_href.'">'.$navItem -> navigation_title.'</a></li>';
                                }
                            }
                        }
                        else {
                            echo 'Sorry, there are currently no navigation links available.';
                        }
                    ?>
                </ul>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <h3 class="mb-4">Additional Links</h3>
                <ul>
                    <?php
                        $navigation = navigationSelect();
                        if($navigation) {
                            foreach ($navigation as $navItem) {
                                if($navItem -> navigation_group_name == 'additional') {
                                    if($navItem -> navigation_title == 'Author') {
                                        echo '<li class="mb-2"><a href="'.$navItem -> navigation_href.'" target="_blank">'.$navItem -> navigation_title.'</a></li>';
                                    }
                                    else {
                                        echo '<li class="mb-2"><a href="../'.$navItem -> navigation_href.'" target="_blank">'.$navItem -> navigation_title.'</a></li>';
                                    }
                                }
                            }
                        }
                        else {
                            echo 'Sorry, there are currently no navigation links available.';
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div class="row mt-3 pt-3 border-top">
            <div class="col-12">
                <p class="text-center copyright">
                    <?php
                        $currentYear = date("Y");
                        echo '© Copyright '.$currentYear.'. Web design and development made by 
                        <a href="https://github.com/Lazar-X" target="_blank" class="shop-now-link">Lazar Jankovic</a>.';
                    ?>
                </p>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>