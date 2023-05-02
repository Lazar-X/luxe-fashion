<header>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="d-flex justify-content-md-end justify-content-center pt-3">
                    <?php
                        if(isset($_SESSION['user'])) {
                            require_once '../config/connection.php';
                            require_once '../logic/functions.php';
                            $user = $_SESSION['user'];
                            $polls = activePollsSelect();
                            $activePolls = array_filter($polls, function($poll) {
                                return $poll -> poll_active == 1;
                            });
                            if($activePolls) {
                                $currentDayOfYear = date('z');
                                $randomIndex = $currentDayOfYear % count($activePolls);
                                $randomPoll = $activePolls[$randomIndex];
                                echo '<li class="ml-3"><a href="poll.php?poll_id='.$randomPoll-> poll_id.'"><i class="fa-solid fa-circle-question"></i> '.$randomPoll -> poll_name.'</a></li>';
                            }
                            else {
                                echo '<li class="mr-3 text-white">No active polls</li>';
                            }
                            if($user -> role_name == 'admin') {
                                echo '<li class="ml-3"><a href="admin.php"><i class="fa-solid fa-sliders"></i> Dashboard</a></li>';
                            }
                            if($user -> role_name == 'user') {
                                echo '<li class="ml-3"><a href="user.php"><i class="fa-solid fa-user"></i> Profile</a></li>';
                            }
                            echo '<li class="ml-3"><a href="../logic/logout.php"><i class="fa-solid fa-right-to-bracket"></i> Logout</a></li>';
                        }
                        else {
                            echo '<li class="ml-3"><a href="login.php"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>
                            <li class="ml-3"><a href="register.php"><i class="fa-solid fa-right-to-bracket"></i> Register</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</header>