<header class="header">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="/cricket" class="logo">
            <img src="<?php echo __ASSETS__ ?>/img/logo.svg" alt="">
        </a>
        <?php if (@$_SESSION['USER']): ?>
            <div class="d-md-flex align-items-center d-none">
                <nav>
                    <ul class="d-flex">
                        <li>
                            <a href="/cricket/matches">Matches</a>
                        </li>
                        <?php if (@$_SESSION['USER']['type'] == 1): ?>
                            <li>
                                <a href="/cricket/users">Users</a>
                            </li>
                            <li>
                                <a href="/cricket/fields-users">Fields</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <?php if (@$_SESSION['USER']['type'] == 1): ?>
                    <a href="/cricket/adduser" class="btn btn-secondary">Add User</a>
                <?php endif; ?>
                <a href="/cricket/signout" class="btn btn-primary">Sign Out</a>
            </div>
            <div class="menu-button d-md-none">
                <input class="checkbox" type="checkbox" name="" id="" />
                <div class="hamburger-lines">
                    <span class="line line1"></span>
                    <span class="line line2"></span>
                    <span class="line line3"></span>
                </div>
            </div>
            <div class="mobile d-flex flex-column justify-content-between d-md-none">
                <nav class="container">
                    <ul>
                        <li>
                            <a href="/cricket/matches">All Matches</a>
                        </li>
                        <?php if (@$_SESSION['USER']['type'] == 1): ?>
                            <li>
                                <a href="/cricket/users">Users</a>
                            </li>
                            <li>
                                <a href="/cricket/fields-users">Fields</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <div class="buttons d-flex flex-column">
                    <?php if (@$_SESSION['USER']['type'] == 1): ?>
                        <a href="/cricket/adduser" class="btn btn-secondary">Add User</a>
                    <?php endif; ?>
                    <a href="/cricket/signout" class="btn btn-primary">Sign Out</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</header>