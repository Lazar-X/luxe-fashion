<?php
    session_start();
    require_once '../includes/head.php';
    require_once '../includes/header.php';
    require_once '../includes/navigation.php';
?>
    <!-- Poll -->
    <section id="poll" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12 border shadow">
                    <h3 class="my-3 border-bottom text-center">Want to Help Improve Our Site?</h3>
                    <form>
                        <!-- Question Radio -->
                        <p>What is your favorite type of clothing?</p>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pollCategory" id="pollCategory1">
                                <label class="form-check-label font-weight-bold" for="pollCategory1">
                                  Category1
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pollCategory" id="pollCategory2">
                                <label class="form-check-label font-weight-bold" for="pollCategory2">
                                  Category2
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pollCategory" id="pollCategory3">
                                <label class="form-check-label font-weight-bold" for="pollCategory3">
                                  Category3
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pollCategory" id="pollCategory4">
                                <label class="form-check-label font-weight-bold" for="pollCategory4">
                                  Category4
                                </label>
                            </div>
                        </div>
                        <p id="already-voted" class="text-danger">User already voted</p>
                    </form>
                </div>
                <!-- Poll Description -->
                <div class="col-md-6 col-12 mt-md-0 mt-3">
                    <h3>Help Us Improve Your Shopping Experience</h3>
                    <p>Your feedback is important to us! By answering this poll, you can help us understand what you like and what you don't like about our fashion site. We want to make sure that we are providing the best possible experience for our users, and your input can help us achieve that. Thank you for taking the time to share your thoughts with us!</p>
                </div>
            </div>
        </div>
    </section>
    
<?php
    require_once '../includes/services.php';
    require_once '../includes/footer.php';
?>