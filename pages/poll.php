<?php
    session_start();
    require_once '../includes/head.php';
    require_once '../includes/header.php';
    require_once '../includes/navigation.php';
    require_once '../logic/functions.php';
    if(isset($_SESSION['user'])) {
        if (!isset($_GET['poll_id'])) {
            echo '<div class=container">
                <div style="height: 500px; width: 100%;" class="row d-flex align-items-center">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <h3 class="text-danger">You are not allowed to access this page directly. Please click on a poll to participate.</h3>
                    </div>
                </div>
            </div>';
            header("Refresh:2; url=index.php");
        }
        else {
            $user = $_SESSION['user'];
            $pollId = $_GET['poll_id'];
            $poll = activePollSelect($pollId);
            if($poll) {
                if($user -> role_id == 1) {
                    $pollQuestion = tableSelectByColumnValue('poll_questions', 'poll_id', $poll -> poll_id);
                    $userVoted = userVoted($user -> user_id, $pollQuestion -> poll_question_id);
                    if($userVoted) {
                        echo '<div class=container">
                        <div style="height: 500px; width: 100%;" class="row d-flex align-items-center">
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <h3 class="text-danger">Oops, it looks like you have already voted in this poll. Thank you for your participation!</h3>
                            </div>
                        </div>
                    </div>';
                    }
                    else {
                        $pollAnswers = tableSelectAllByColumnValue('poll_answers', 'question_id', $pollQuestion -> poll_question_id);
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
                                            <input type="hidden" id="questionId" value="'.$pollQuestion -> poll_question_id.'">
                                            <small id="voteHelp" class="form-text">Please select</small>
                                            <button type="button" id="voteButton" class="btn my-3 button">Vote</button>
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
                }
                else {
                    $pollQuestion = tableSelectByColumnValue('poll_questions', 'poll_id', $poll -> poll_id);
                    $pollAnswers = tableSelectAllByColumnValue('poll_answers', 'question_id', $pollQuestion -> poll_question_id);
                    $userVotedForQuestion = userVotedForQuestion($pollQuestion -> poll_question_id);
                    echo '<div class="container my-3 py-3 shadow">
                    <div style="height: 500px; width: 100%;" class="row d-flex">
                        <div class="col-12 d-flex justify-content-center">
                            <h3>'.$poll -> poll_name.'</h3>
                        </div>
                        <div class="col-12">
                            <h3>Question: '.$pollQuestion -> poll_question.'</h3>
                        </div>
                        <div class="col-12">';
                        foreach ($pollAnswers as $answer) {
                            echo '<h3>'.$answer -> poll_answer.' - ';
                            $answer_id = $answer->poll_answer_id;
                            $vote_count = 0;
                            if(!empty($userVotedForQuestion)) {
                                foreach($userVotedForQuestion as $votedAnswer) {
                                    if($votedAnswer -> answer_id == $answer_id) {
                                        $vote_count = $votedAnswer -> vote_count;
                                        break;
                                    }
                                }
                            }
                            echo $vote_count.'</h3>';
                        }
                        echo '</div>
                    </div>
                </div>';
                }
            }
            else {
                echo '<div class="container">
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
        echo '<div class="container">
                <div style="height: 500px; width: 100%;" class="row d-flex align-items-center">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <h3 class="text-danger">Oops, it looks like you are not logged in!</h3>
                    </div>
                </div>
            </div>';
    }
    require_once '../includes/footer.php';
?>