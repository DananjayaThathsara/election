<!-- Static navbar -->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=".." target="_blank">Election Admin</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="<?php if (isset($page_id) && $page_id == 1) {
                echo 'active';
            } ?>"><a href="home.php">President result XML Upload </a></li>
            <li class="<?php if (isset($page_id) && $page_id == 2) {
                echo 'active';
            } ?>"><a href="manualResult.php">Manual Feed Results</a></li>
            <li class="<?php if (isset($page_id) && $page_id == 3) {
                echo 'active';
            } ?>"><a href="pastVotSeat.php">Add Previous Results</a></li>
        </ul>
    </div><!--/.container-fluid -->
</nav>
<style>
    body {
        background-color: #f8f8f8 !important;
    }
</style>