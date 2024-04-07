<?php global $users ?>
<section class="table-section container">
    <div class="table-holder">
        <table class="table" id="MatchTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>FULLNAME</th>
                    <th>USERNAME</th>
                    <th>GENDER</th>
                    <th>TYPE</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($users); $i++):
                    $fullname = $users[$i]['name'];
                    $username = $users[$i]['username'];
                    $gender = $users[$i]['gender'] == 1 ? 'MALE' : 'FEMALE';
                    $type = $users[$i]['type'] == 1 ? 'MASTER' : ($users[$i]['type'] == 0 ? 'ADMIN' : 'STUDENT');
                    ?>
                    <tr>
                        <th>
                            <?php echo $i + 1 ?>
                        </th>
                        <td>
                            <?php echo $fullname ?>
                        </td>
                        <td>
                            <a href="users/<?php echo $username ?>">
                                <?php echo $username ?>
                            </a>
                        </td>
                        <td>
                            <?php echo $gender ?>
                        </td>
                        <td>
                            <?php echo $type ?>
                        </td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>
</section>