<?php
    session_start();
    require_once '../includes/head.php';
    require_once '../includes/header.php';
    require_once '../includes/navigation.php';
    if(isset($_SESSION['user'])) {
        if (!isset($_GET['poll_id'])) {
            echo '<div class=container">
                <div style="height: 500px; width: 100%;" class="row d-flex align-items-center">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <h3 class="text-danger">You are not allowed to access this page directly. Please click on a poll to participate.</h3>
                    </div>
                </div>
            </div>';
            header("Refresh:1; url=index.php");
        }
        else {
            $user = $_SESSION['user'];
            $pollId = $_GET['poll_id'];
            $poll = pollSelect($pollId);
            if($poll) {
                $pollQuestion = pollQuestionSelect($poll -> poll_id);
                $pollQuestionId = $pollQuestion -> poll_question_id;
                $pollAnswers = pollAnswersSelect($pollQuestionId);
                echo '<!-- Poll -->
                <section id="poll" class="py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-12 border shadow">
                                <h3 class="my-3 pb-1 border-bottom text-center">'.$poll -> poll_name.'</h3>
                                <form id="voteForm">
                                    <!-- Question Radio -->
                                    <p>'.$pollQuestion -> poll_question.'</p>
                                    <div class="form-group">';
                                    foreach ($pollAnswers as $pollAnswer) {
                                        echo '<div class="form-check">
                                        <input class="form-check-input" type="radio" name="poll" id="'.$pollAnswer -> poll_answer_id.'" value="'.$pollAnswer -> poll_answer_id.'">
                                        <label class="form-check-label font-weight-bold" for="pollCategory1">
                                          '.$pollAnswer -> poll_answer.'
                                        </label>
                                    </div>';
                                    }
                                    echo '</div>
                                    <input type="hidden" id="userId" value="'.$user -> user_id.'">
                                    <input type="hidden" id="questionId" value="'.$pollQuestionId.'">
                                    <small id="voteHelp" class="form-text">Please select</small>
                                    <button type="button" id="voteButton" class="btn mt-3 button">Vote</button>
                                </form>
                                <div id="response">
                                    
                                </div>
                            </div>
                            <!-- Poll Description -->
                            <div class="col-md-6 col-12 mt-md-0 mt-3">
                                <h3>Help Us Improve Your Shopping Experience</h3>
                                <p>Your feedback is important to us! By answering this poll, you can help us understand what you like and what you do not like about our fashion site. We want to make sure that we are providing the best possible experience for our users, and your input can help us achieve that. Thank you for taking the time to share your thoughts with us!</p>
                            </div>
                        </div>
                    </div>
                </section>';
            }
            else {
                echo '<div class=container">
                <div style="height: 500px; width: 100%;" class="row d-flex align-items-center">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <h3 class="text-danger">Sorry, the poll you are trying to access does not exist or is no longer available. Please try again later.</h3>
                    </div>
                </div>
            </div>';
            }
        }
    }
    else {
        echo '<div class=container">
                <div style="height: 500px; width: 100%;" class="row d-flex align-items-center">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <h3 class="text-danger">Oops, it looks like you are not logged in!</h3>
                    </div>
                </div>
            </div>';
    }
    require_once '../includes/footer.php';
?>