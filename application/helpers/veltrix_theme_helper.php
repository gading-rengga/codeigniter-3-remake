<?php
function form_theme($data)
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

                    <?php if ($val['input_type'] == 'dropzone') {  ?>
                        <label class="mt-2"><?= $val['title'] ?></label>
                        <div class="dropzone">
                            <div class="dz-message">
                                <h3> Klik atau Drop gambar disini</h3>
                            </div>
                            <?php if ($val['data'] !== '') { ?>
                                <?php
                                $i = 0;
                                foreach ($val['data'] as $value) {
                                    $i = ++$i ?>
                                    <div id="<?= $i ?>" class="dz-preview dz-processing dz-image-preview dz-success dz-complete">
                                        <div class="dz-image"><img data-dz-thumbnail="" alt="<?= $value['filename'] ?>" src="<?= base_url('upload-foto/') ?><?= $value['filename'] ?>" style="width: 120px; height:120px"></div>
                                        <div class="dz-details">
                                            <div class="dz-filename"><span data-dz-name=""><?= $value['filename'] ?></span></div>
                                        </div>
                                        <a class="dz-remove" href="javascript:" onclick="remove_dz(<?= $value['token'] ?>,<?= $i ?>)">Remove File</a>
                                    </div>
                                <?php } ?>
                            <?php } else {
                            } ?>
                        </div>
                        <small class="text-danger"><?= $val['validation'] == 'true' ?   form_error($val['nama']) : '' ?></small>
                        <small id="emailHelp2" class="form-text text-muted"><?= $val['note'] ?></small>
                    <?php } ?>

                <?php } ?>
            </div>
        <?php } ?>

    </div>
<?php $contents = ob_get_clean();
    return $contents;
}

function form_editor()
{
}


function card($data, $content)
{
    ob_start(); ?>
    <?php foreach ($data as $key) {
    ?>
        <?php if (isset($key)) { ?>
            <form method="post" action="<?= base_url(@$key['action'])  ?>">
                <div class="card">
                    <div class="card-header">
                        <div class="row mt-3">
                            <div class="col">
                                <h4 class="card-title"><?= @$key['title'] ?></h4>
                            </div>
                            <div class="col text-right">
                                <?php if (isset($key['button'])) { ?>
                                    <a class="btn btn-<?= $key['button']['button_color'] ?>" href="<?= base_url($key['button']['button_link']) ?>" role="button"><?= $key['button']['button_title'] ?></a>
                                <?php } else {
                                } ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if (is_array($content)) { ?>
                            <?php foreach ($content as $val) { ?>
                                <?= $val ?>
                            <?php } ?>
                        <?php } else { ?>
                            <?= $content ?>
                        <?php  } ?>
                    </div>
                    <div class="card-footer">
                        <?php if (isset($key['button_cancel'])) { ?>
                            <a class="btn btn-<?= $key['button_cancel']['button_color'] ?>" href="<?= base_url($key['button_cancel']['button_action']) ?>" role="button"><?= $key['button_cancel']['button_title'] ?></a>
                        <?php } else {
                        } ?>
                        <?php if (isset($key['button_save'])) { ?>
                            <button type="submit" class="btn btn-<?= $key['button_save']['button_color'] ?> ml-2"><?= $key['button_save']['button_title'] ?></button>
                        <?php } else {
                        } ?>
                    </div>
                </div>
            </form>
        <?php } ?>
    <?php } ?>
<?php $contents = ob_get_clean();
    return $contents;
}
function search($data)
{
    ob_start(); ?>
    <?php foreach ($data as $val) { ?>
        <div class="col-md-3 my-1 my-md-0">
            <div class="app-search">
                <div class="position-relative">
                    <input type="text" name="<?= $val['name'] ?>" id="<? $val['id'] ?>" class="form-control" placeholder="Search...">
                    <span class="fa fa-search"></span>
                </div>
            </div>
        </div>
    <?php } ?>
<?php $contents = ob_get_clean();
    return $contents;
}
