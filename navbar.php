<nav id = "admin_nav" class = "navbar navbar-inverse navbar-fixed-top" data-spy="affix">
    <div class = "container-fluid">
        <div class = "navbar-header">
            <a class = "navbar-brand" id = "header" href = "index.php">Form Q</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class = "nav navbar-nav navbar-right">
                <li><a><span class = "glyphicon glyphicon-user"></span>Welcome, <?php echo $user_name;?> </a></li>
                <?php
                    $uri = $_SERVER["PHP_SELF"] ;
                    $page_user_or_admin = substr($uri,strrpos($uri, '/')+1,-14);
                    if ($page_user_or_admin == "admin") {
                        if ($user_role == 1) {
                            echo '<li><a href = "user_dashboard.php"><span>User Dashboard</span></a></li>';
                        } else {
                            header("Location: user_dashboard.php");
                        }
                    }
                    if ($page_user_or_admin == "user") {
                        if ($user_role == 1) {
                            echo '<li><a href = "admin_dashboard.php"><span>Admin Dashboard<!--  ONLY ADMINS --></span></a></li>';
                        } elseif ($user_role == 2) {
                            echo '<li><a href = "search.php"><span class = "glyphicon glyphicon-search">Search</span></a></li>';
                        }
//                        echo '<li><a href = "search.php"><span class = "glyphicon glyphicon-search">Search</span></a></li>';
                    }
                ?>
                <li><a href = "api/logout.php"><span class = "glyphicon glyphicon-log-out"></span>Logout</a></li>
            </ul>
        </div>
    </div>
</nav>