<?php
function form_bootstrap($data)
{
    // var_dump($data[0]['form']);
    // die();
    ob_start();
?>
    <div class="row">
        <?php foreach ($data as $value) { ?>
            <div class="<?= isset($value['size_page']) ? $value['size_page'] : '' ?>">
                <?php foreach ($value['form'] as $val) { ?>

                    <!-- Config Text Default Bootsrtrap 4 -->
                    <?php if ($val['input_type'] == 'text' && $val['type_form'] == 'default') { ?>
                        <div class="form-group">
                            <?php if ($val['input_type'] !== 'hidden') { ?>
                                <label><?= $val['title'] ?></label>
                            <?php } ?>
                            <input type="<?= $val['input_type'] ?>" <?= $val['readonly'] == 'true' ? 'readonly' : '' ?> class="form-control" id="<?= $val['id'] ?>" name="<?= $val['name'] ?>" value="<?= $val['value'] ?>" placeholder="<?= $val['placeholder'] ?>">
                            <?php if ($val['input_type'] !== 'hidden') { ?>
                                <small class="form-text text-muted"><?= $val['note'] ?></small>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <!-- Config Text Area Default Bootsrtrap 4 -->
                    <?php if ($val['input_type'] == 'textarea' && $val['type_form'] == 'default') { ?>
                        <div class="form-group">
                            <label><?= $val['title'] ?></label>
                            <textarea class="form-control" id="<?= $val['id'] ?>" name="<?= $val['name'] ?>" value="<?= $val['value'] ?>" placeholder="<?= $val['placeholder'] ?>" rows="3"></textarea>
                            <small class="form-text text-muted"><?= $val['note'] ?></small>
                        </div>
                    <?php } ?>

                    <!-- Config Select Default Bootsrtrap 4 -->
                    <?php if ($val['input_type'] == 'select' && $val['type_form'] == 'default') { ?>
                        <div class="form-group">
                            <label><?= $val['title'] ?></label>
                            <select class="form-control form-control" id="<?= $value['id'] ?>" name="<?= $value['name'] ?>">
                                <?php foreach ($value['data'] as $val) { ?>
                                    <?php if (@$val[$value['content_id']] == @$value['value']) { ?>
                                        <option value="<?= @$val[$value['content_id']] ?>" selected><?= @$val[$value['content']]  ?></option>
                                    <?php }  ?>
                                    <option value="<?= @$val[$value['content_id']] ?>"><?= @$val[$value['content']] ?></option>
                                <?php } ?>
                            </select>
                            <small class="form-text text-muted"><?= $val['note'] ?></small>
                        </div>
                    <?php } ?>

                    <!-- Config Checkbox Default Bootsrtrap 4 -->
                    <?php if ($val['input_type'] == 'checkbox' && $val['type_form'] == 'default') { ?>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" <?= $val['readonly'] == 'true' ? 'disabled' : '' ?> type="<?= $val['input_type'] ?>" value="<?= $val['value'] ?>" id="<?= $val['id'] ?>" name="<?= $val['name'] ?>">
                                <label class="form-check-label">
                                    <?= $val['title'] ?>
                                </label>
                                <small class="form-text text-muted"><?= $val['note'] ?></small>
                            </div>
                        </div>
                    <?php } ?>

                    <!-- Config Input-Group Default Bootsrtrap 4 -->
                    <?php if ($val['input_type'] == 'input-group' && $val['type_form'] == 'default') { ?>
                        <div class="form-group">
                            <label><?= $val['title'] ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><?= $val['content'] ?></span>
                                </div>
                                <input type="text" class="form-control" placeholder="<?= $val['placeholder'] ?>" value="<?= $val['value'] ?>" id="<?= $val['id'] ?>" name="<?= $val['name'] ?>">
                            </div>
                            <small class="form-text text-muted"><?= $val['note'] ?></small>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
<?php $contents = ob_get_clean();
    return $contents;
}

function table_bootstrap($data)
{
    ob_start();
?>
    <div class="table-responsive">
        <table class="table <?= $data['table']['table_type'] ?>">
            <thead>
                <tr>
                    <?php if (isset($data['t_head'])) { ?>
                        <?php foreach ($data['t_head'] as $value) { ?>
                            <th class="<?= $value['class'] ?>" scope="<?= isset($value['scope']) ? $value['scope'] : '' ?>" colspan="<?= isset($value['colspan']) ? $value['colspan'] : '' ?>" rowspan="<?= isset($value['rowspan']) ? $value['rowspan'] : '' ?>"><?= $value['data'] ?></th>
                        <?php } ?>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($data['t_body'])) { ?>
                    <?php foreach ($data['t_body'] as $value) { ?>
                        <tr>
                            <?php foreach ($value as $val) { ?>
                                <th class="<?= isset($val['class']) ? $val['class'] : '' ?>" scope="<?= isset($val['scope']) ? $val['scope'] : '' ?>" colspan="<?= isset($val['colspan']) ? $val['colspan'] : '' ?>" rowspan="<?= isset($val['rowspan']) ? $val['rowspan'] : '' ?>"><?= $val['data'] ?></th>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php $contents = ob_get_clean();
    return $contents;
}

function button_bootstrap($data)
{
    ob_start();
?>
    <?php if ($data['type'] == 'link') { ?>
        <a hreff="<?= $data['link'] ?>" type="button" class="btn btn-<?= $data['color'] ?> btn-<?= $data['size'] ?>"><?= $data['title'] ?></a>
    <?php } else if ($data['type'] == 'submit') { ?>
        <button type="submit" class="btn btn-<?= $data['color'] ?> btn-<?= $data['size'] ?>"><?= $data['title'] ?></button>
    <?php } ?>
<?php $contents = ob_get_clean();
    return $contents;
}
