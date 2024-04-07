<?php

$jsonString = file_get_contents(__JSON__ . '/fields_user.json');
$jsonData = json_decode($jsonString, true);

?>
<section class="fields container">
    <form method="POST">
        <div class="fields-container" id="main-group">
            <div class="form-group fields-set d-none">
                <div class="row">
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-2 field-move">:::<small>0</small></div>
                            <div class="col-md-10">
                                <label>Name</label>
                                <input type="text" class="name" name="name[]">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>KEY</label>
                        <input type="text" class="key" required name="key[]">
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-10">
                                <label>TYPE</label>
                                <select class="form-select" name="type[]">
                                    <option value="text">Text</option>
                                    <option value="radio">Radio</option>
                                    <option value="select">Select</option>
                                    <option value="checkbox">Checkbox</option>
                                    <option value="file">File</option>
                                </select>
                            </div>
                            <div class="col-md-2 field-del">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="del">
                                    <path
                                        d="M 10 2 L 9 3 L 3 3 L 3 5 L 4.109375 5 L 5.8925781 20.255859 L 5.8925781 20.263672 C 6.023602 21.250335 6.8803207 22 7.875 22 L 16.123047 22 C 17.117726 22 17.974445 21.250322 18.105469 20.263672 L 18.107422 20.255859 L 19.890625 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 6.125 5 L 17.875 5 L 16.123047 20 L 7.875 20 L 6.125 5 z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="col-md choice-field d-none">
                        <label>TYPE</label>
                        <textarea class="form-control" rows="5" name="options[]"></textarea>
                    </div>
                </div>
            </div>
            <?php foreach ($jsonData as $row): ?>
                <div class="form-group fields-set">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-2 field-move">:::<small>0</small></div>
                                <div class="col-md-10">
                                    <label>Name</label>
                                    <input type="text" class="name" name="name[]" value="<?php echo $row['name'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>KEY</label>
                            <input type="text" class="key" required name="key[]" value="<?php echo $row['key'] ?>">
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-10">
                                    <label>TYPE</label>
                                    <select class="form-select" name="type[]">
                                        <option value="text" <?php echo $row['type'] == 'text' ? 'selected' : '' ?>>Text
                                        </option>
                                        <option value="radio" <?php echo $row['type'] == 'radio' ? 'selected' : '' ?>>Radio
                                        </option>
                                        <option value="select" <?php echo $row['type'] == 'select' ? 'selected' : '' ?>>Select
                                        </option>
                                        <option value="checkbox" <?php echo $row['type'] == 'checkbox' ? 'selected' : '' ?>>
                                            Checkbox</option>
                                        <option value="file" <?php echo $row['type'] == 'file' ? 'selected' : '' ?>>File
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-2 field-del">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="del">
                                        <path
                                            d="M 10 2 L 9 3 L 3 3 L 3 5 L 4.109375 5 L 5.8925781 20.255859 L 5.8925781 20.263672 C 6.023602 21.250335 6.8803207 22 7.875 22 L 16.123047 22 C 17.117726 22 17.974445 21.250322 18.105469 20.263672 L 18.107422 20.255859 L 19.890625 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 6.125 5 L 17.875 5 L 16.123047 20 L 7.875 20 L 6.125 5 z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-md choice-field d-none">
                            <label>TYPE</label>
                            <textarea class="form-control" rows="5"
                                name="options[]"><?php echo implode("\n", $row['options']); ?></textarea>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="form-group">
            <button id="add" class="btn btn-secondary">ADD FIELD</button>
        </div>
    </form>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">SAVE</button>
    </div>
</section>