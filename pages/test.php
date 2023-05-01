<?php
    session_start();
    require_once '../includes/head.php';
    require_once '../includes/header.php';
    require_once '../includes/navigation.php';
?>
<form id="testForm">
                        <!-- First name -->
                        <div class="form-group">
                          <label for="testName" class="font-weight-bold">First Name:</label>
                          <input type="text" class="form-control" id="testName" placeholder="Enter testName name">
                          <small id="firstNameHelp" class="form-text">Example: Lazar</small>
                        </div>
                        <button type="button" id="testButton" class="btn mt-3 button">Register</button>
                        <div id="response">
                            <!-- <small id="contactInformation" class="form-text text-success font-weight-bold"></small> -->
                        </div>
</form>
<?php
    require_once '../includes/services.php';
    require_once '../includes/footer.php';
?>