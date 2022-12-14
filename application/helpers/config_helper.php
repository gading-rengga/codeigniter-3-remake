<?php
function nav($data)
{
    ob_start(); ?>
    <ul class="nav nav-pills nav-secondary mb-3">
        <?php $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);
        ?>
        <?php foreach ($data as $val) { ?>
            <li class="nav-item">
                <a <?= $uri_segments[2] == $val['nav_link'] ? 'class="nav-link active"' : 'class="nav-link"' ?> href="<?= base_url($val['nav_link']) ?>"><?= $val['nav_title'] ?></a>
            </li>
        <?php } ?>
    </ul>
<?php $contents = ob_get_clean();
    return $contents;
}

function layout_primary($config)
{
    $ci = get_instance();
    $data['sidebar'] = config_sidebar();
    $data['title']  = $config['title'];
    $data['content'] = layout_divider($config['data_page']);

    $ci->load->view("theme/" . $config['theme'] . "/header", $data);
    $ci->load->view("theme/" . $config['theme'] . "/sidebar");
    $ci->load->view("theme/" . $config['theme'] . "/topbar");
    $ci->load->view("theme/" . $config['theme'] . "/content");
    $ci->load->view("theme/" . $config['theme'] . "/footer");
}

function layout_divider($data)
{

    $ci = get_instance();
    ob_start(); ?>
    <div class="row">
        <?php foreach ($data as $val) { ?>
            <div id="<?= isset($val['id']) ? $val['id'] : '' ?>" class="<?= $val['size_page'] ?>">
                <div class="card <?= isset($val['class']) ?  $val['class'] : '' ?>">
                    <form action="<?= $val['form_action'] ?>">
                        <?php if (isset($val['content_header'])) { ?>
                            <div class="card-header">
                                <div class="row mt-3">
                                    <div class="col">
                                        <h4 class="card-title"><?= $val['content_title'] ?></h4>
                                    </div>
                                    <div class="col text-right">
                                        <div class="row"></div>
                                        <?php if (isset($val['content_header']) || $val['content_header'] !== '') { ?>
                                            <?php foreach ($val['content_header'] as $index) { ?>
                                                <div class="col-md"><?= $index ?></div>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <div class="col"><?= $val['content_header'] ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } else {
                        } ?>
                        <div class="card-body p-3">
                            <?php if (isset($val['content_header'])) { ?>
                            <?php } else {
                            ?>
                                <h4 class="card-title"><?= $val['content_title'] ?></h4>
                            <?php } ?>
                            <?php if (is_array($val['content'])) { ?>
                                <?php foreach ($val['content'] as $val) { ?>
                                    <?= $val ?>
                                <?php } ?>
                            <?php } else { ?>
                                <?= $val['content'] ?>
                            <?php  } ?>
                            <?= $ci->pagination->create_links(); ?>
                        </div>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
<?php $contents = ob_get_clean();
    return $contents;
}



function data_table($table)
{
    ob_start(); ?>
    <div class="card  shadow-md p-5">
        <div class="table-responsive ">
            <table class="table table-hover">
                <thead class="bg-gray-light">
                    <?php foreach ($table['t_head'] as $index) {
                    ?>
                        <tr>
                            <?php foreach ($index as $key) { ?>
                                <th><?= $key ?></th>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </thead>
                <tbody>
                    <?php
                    if (isset($table['t_body'])) {
                        foreach ($table['t_body'] as $value) {
                    ?>
                            <tr>
                                <?php foreach ($value as $key) {
                                ?>
                                    <td><?= $key ?></td>
                                <?php } ?>
                            </tr>
                    <?php }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $contents = ob_get_clean();
    return $contents;
}

function pagination($data)
{
    foreach ($data as $val) {
        $config['base_url'] =  base_url($val['func']);
        $config['total_rows'] = $val['total_rows'];
        $config['per_page'] =  $val['per_page'];
        $config['num_links'] = 3;

        $config['first_link']       = '<i class="fas fa-angle-double-left icon-sm"></i>';
        $config['last_link']        = '<i class="fas fa-angle-double-right icon-sm"></i>';
        $config['next_link']        = '<i class="fas fa-angle-right icon-sm"></i>';
        $config['prev_link']        = '<i class="fas fa-angle-left icon-sm"></i>';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-left mt-5">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="paginate_button page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="paginate_button page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="paginate_button page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="paginate_button page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="paginate_button page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="paginate_button page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
    }
    return $config;
}

function button($data)
{
    ob_start(); ?>
    <?php foreach ($data as $value) { ?>
        <a class="btn btn-primary" href="#" role="button">Tambah Data</a>
    <?php } ?>
<?php $contents = ob_get_clean();
    return $contents;
}

function form($data)
{
    ob_start();
?>
    <div class="row">
        <?php foreach ($data as $index) { ?>
            <div class="<?= $index['column'] ?>">
                <div class="form-group">
                    <?php foreach ($index['form'] as $value) { ?>
                        <?php if (isset($value) && $value['input-type'] == 'form' && isset($value['readonly'])) { ?>
                            <label class="mt-2"><?= $value['form_title'] ?></label>
                            <input type="<?= $value['type'] ?>" <?= $value['readonly'] == 'yes' ? 'readonly' : '' ?> class="form-control" id="<?= $value['id'] ?>" name="<?= $value['name'] ?>" value="<?= $value['value'] ?>" placeholder="<?= $value['place_holder'] ?>">
                            <small class="text-danger"><?= $value['validation'] == 'true' ?   form_error($value['name']) : '' ?></small>
                            <?php if ($value['type'] !== 'hidden') { ?>
                                <small class="form-text text-muted"><?= $value['note'] ?></small>
                            <?php } else {
                            } ?>
                        <?php } else if (isset($value) && $value['input-type'] == 'text-area') { ?>
                            <label class="mt-2" for="comment"><?= $value['form_title'] ?></label>
                            <textarea class="form-control" id="<?= $value['id'] ?>" name="<?= $value['name'] ?>" value="<?= $value['value'] ?>" rows="5" placeholder="<?= $value['place_holder'] ?>"><?= $value['value'] ?></textarea>
                            <small class="text-danger"><?= $value['validation'] == 'true' ?   form_error('nama') : '' ?></small>
                            <small id="emailHelp2" class="form-text text-muted"><?= $value['note'] ?></small>
                        <?php } else if (isset($value) && $value['input-type'] == 'select') { ?>
                            <label class="mt-2" for="defaultSelect"><?= $value['form_title'] ?></label>
                            <select class="form-control form-control" id="<?= $value['id'] ?>" name="<?= $value['name'] ?>">
                                <?php foreach ($value['data'] as $val) { ?>
                                    <?php if (@$val[$value['content_id']] == @$value['value']) { ?>
                                        <option value="<?= @$val[$value['content_id']] ?>" selected><?= @$val[$value['content']]  ?></option>
                                    <?php }  ?>
                                    <option value="<?= @$val[$value['content_id']] ?>"><?= @$val[$value['content']]   ?></option>
                                <?php } ?>
                            </select>
                            <small class="text-danger"><?= $value['validation'] == 'true' ?   form_error('nama') : '' ?></small>
                            <small id="emailHelp2" class="form-text text-muted"><?= $value['note'] ?></small>
                        <?php } else if (isset($value) && $value['input-type'] == 'file') { ?>
                            <label class="mt-2"><?= $value['form_title'] ?></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="<?= $value['id'] ?>" name="<?= $value['name'] ?>" value="<?= $value['value'] ?>">
                                <label class="custom-file-label" for="<?= $value['id'] ?>"><?= $value['value'] !== '' ? $value['value'] : $value['place_holder'] ?></label>
                                <small class="text-danger"><?= $value['validation'] == 'true' ?   form_error($value['nama']) : '' ?></small>
                                <small id="emailHelp2" class="form-text text-muted"><?= $value['note'] ?></small>
                            </div>
                        <?php } else if (isset($value) && $value['input-type'] == 'dropzone') {  ?>
                            <label class="mt-2"><?= $value['form_title'] ?></label>
                            <div class="dropzone">
                                <div class="dz-message">
                                    <h3> Klik atau Drop gambar disini</h3>
                                </div>
                                <?php if ($value['data'] !== null) { ?>
                                    <?php
                                    $x = 0;
                                    foreach ($value['data'] as $val) {
                                        $x = ++$x ?>
                                        <div id="<?= $x ?>" class="dz-preview dz-processing dz-image-preview dz-success dz-complete">
                                            <div class="dz-image"><img data-dz-thumbnail="" alt="<?= $val['filename'] ?>" src="<?= base_url('upload-foto/') ?><?= $val['filename'] ?>" style="width: 120px; height:120px"></div>
                                            <div class="dz-details">
                                                <div class="dz-filename"><span data-dz-name=""><?= $val['filename'] ?></span></div>
                                            </div>
                                            <a class="dz-remove" href="javascript:" onclick="remove_dz(<?= $val['token'] ?>,<?= $x ?>)">Remove File</a>
                                        </div>
                                    <?php } ?>
                                <?php } else {
                                } ?>
                            </div>
                            <small class="text-danger"><?= $value['validation'] == 'true' ?   form_error($value['nama']) : '' ?></small>
                            <small id="emailHelp2" class="form-text text-muted"><?= $value['note'] ?></small>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
<?php $contents = ob_get_clean();
    return $contents;
}

function button_edit($data)
{
    ob_start();
?>
    <?php foreach ($data as $val) { ?>
        <a class="btn btn-warning btn-sm" href="<?= site_url($val['button']['button_link']) ?>"><?= $val['button']['button_title'] ?></a>
    <?php } ?>
<?php $contents = ob_get_clean();
    return $contents;
}

function button_delete($data)
{
    ob_start();
?>
    <?php foreach ($data as $val) { ?>
        <a class="btn btn-danger btn-sm" href="<?= site_url($val['button']['button_link']) ?>"><?= $val['button']['button_title'] ?></a>
    <?php } ?>
    <?php $contents = ob_get_clean();
    return $contents;
}

function allert($data)
{
    ob_start();
    foreach ($data as $val) {
    ?>
        <!-- Bootstrap Notify -->
        <div class="alert <?= $val['alert_type'] ?> animated fadeInDown position-absolute mt-3 mr-4" style="right: 0;">
            <?= $val['title'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        $contents = ob_get_clean();
        return $contents;
    }
}

function image($data)
{

    ob_start();
    ?>
    <?php foreach ($data as $val) {
    ?>
        <div class="symbol symbol-60 symbol-2by3 flex-shrink-0">
            <div class="symbol-label" style="background-image: url('<?= base_url("upload-foto") ?>/<?= $val['filename'] ?>')"></div>
        </div>
    <?php } ?>
<?php

    $contents = ob_get_clean();
    return $contents;
}
