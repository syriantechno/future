<?php include('../../ultra.php'); ?>
<?php include_content_page('list', '', 'account'); ?>
<?php get_header(); ?>
<?php

function get_all_form_items()
{
    $return = new StdClass;
    // query string
    //$query_str = "SELECT  * FROM " . dbname('form_items') . " WHERE status='"  ;
    $query_str = "SELECT * FROM " . dbname('form_items') . " WHERE status='1'"  ;


    if ($query = db()->query($query_str)) {
        $return->num_rows = $query->num_rows;

        if ($return->num_rows > 0) {
            while ($item = $query->fetch_object()) {
                $return->list[] = $item ;
            }

            return $return;
        } else {
            add_alert('لم يتم العثور على حركة المنتج لهذا النموذج.', 'warning', __FUNCTION__);
            return false;
        }
    } else {
        add_mysqli_error_log(__FUNCTION__);
    }
}

$accounts = get_accounts(array('_GET' => true));
$forms = get_all_form_items();
$searchType = (isset($_GET['s'])) ? $_GET['s'] : 'الكل';


add_page_info('title', 'قائمة المستفيدين');
add_page_info('nav', array('name' => 'المستفيد', 'url' => get_site_url('admin/account/')));

if ($accounts) {
    add_page_info('nav', array('name' => "قائمة المستفيدين ({$searchType} : {$accounts->num_rows})"));
}


if (!isset($_GET['orderby_code'])) {
    $_GET['orderby_code'] = 'code';
    $_GET['orderby_type'] = 'ASC';
}

?>

<?php
    $_company = get_option('company');
    if (empty($_company)) {
    $_company = (object)array('name' => '', 'address' => '', 'district' => '', 'city' => '', 'country' => '', 'email' => '', 'phone' => '', 'gsm' => '', 'currency' => '', 'price1' => '', 'price2' => '', 'price4' => '', 'price5' => '', 'price6' => '', 'highlight' => '');
    }
    ?>
    <div class="row">

    </div>
    <style>
        .highlight{
            background-color: <?php echo $_company->highlight; ?>;
        }
        .table-hover > tbody > tr:hover{
            background-color: <?php echo $_company->highlight2; ?>;
        }
    </style>

<?php

if (til_is_mobile()) :

    $arr_s = array();
    $arr_s['s_name'] = 'accounts';
    $arr_s['db-s-where'][] = array('name' => 'اسم المستفيد', 'val' => 'name');
    $arr_s['db-s-where'][] = array('name' => 'كود المستفيد', 'val' => 'code');
    $arr_s['db-s-where'][] = array('name' => ' نوع الاعاقة', 'val' => 'Retardationtype');
    $arr_s['db-s-where'][] = array('name' => 'رقم الاعاقة', 'val' => 'Retardationnum');
    $arr_s['db-s-where'][] = array('name' => 'المعيل', 'val' => 'mo3el');
    $arr_s['db-s-where'][] = array('name' => 'تاريخ الميلاد', 'val' => 'DateofBirth');
    $arr_s['db-s-where'][] = array('name' => 'العنوان', 'val' => 'address');
    $arr_s['db-s-where'][] = array('name' => 'ملاحظات', 'val' => 'note');
    search_form_for_panel($arr_s);

endif;

?>

    <div class="panel panel-default panel-table">

        <div class="panel-heading hidden-xs">

            <div class="row">

                <div class="col-xs-6 col-md-6" style="display: flex">

                    <h3 class="panel-title" style="padding-left: 20px;">المستفيدين</h3>
                    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="get" class="form-inline">
                        <div class="form-group">
                            <?php
                                $from_date = isset($_GET['from_date']) ? $_GET['from_date'] : null;
                                $to_date = isset($_GET['to_date']) ? $_GET['to_date'] : null;

                            ?>
                            <input type="text" name="from_date" class="form-control input-sm date" placeholder="من"
                                   value="<?= $from_date; ?>" style="width: 20%;">
                            <input type="text" name="to_date" class="form-control input-sm date" placeholder="إلى"
                                   value="<?= $to_date; ?>" style="width: 20%;">

                            <button class="btn" type="submit"
                                    style="    height: 29px;    text-align: center;    padding: 4px;border-radius: 2px; margin-right: 10px;">
                                <i class="fa fa-search text-black"></i><span
                                        style="color: #4c4c4c">بحث بتاريخ الميلاد</span>
                            </button>
                            <button class="btn" type="submit"
                                    style="    height: 29px;    text-align: center;    padding: 4px; border-radius: 2px;">
                                <a href="<?php site_url('admin/account/list.php'); ?>"> <i
                                            class="fa fa-arrow-circle-left text-black"></i> عودة </a>
                            </button>
                        </div>

                    </form>
                </div>
                <div class="col-xs-6 col-md-6">
                    <?php
                    if (!til_is_mobile()) :

                        $arr_s = array();
                        $arr_s['s_name'] = 'accounts';
                        $arr_s['db-s-where'][] = array('name' => 'اسم المستفيد', 'val' => 'name');
                        $arr_s['db-s-where'][] = array('name' => 'كود المستفيد', 'val' => 'code');
                        $arr_s['db-s-where'][] = array('name' => ' نوع الاعاقة', 'val' => 'Retardationtype');
                        $arr_s['db-s-where'][] = array('name' => 'رقم الاعاقة', 'val' => 'Retardationnum');
                        $arr_s['db-s-where'][] = array('name' => 'المعيل', 'val' => 'mo3el');
                        $arr_s['db-s-where'][] = array('name' => 'تاريخ الميلاد', 'val' => 'DateofBirth');
                        $arr_s['db-s-where'][] = array('name' => 'العنوان', 'val' => 'address');
                        $arr_s['db-s-where'][] = array('name' => 'الملاحظات', 'val' => 'note');
                        search_form_for_panel($arr_s);
                    endif;
                    ?>

                    <div class="panel-default panel-table">
                        <div class="pull-right">
                            <div class="btn-group btn-icon hidden-xs" data-toggle="tooltip" data-placement="top"
                                 title="Pdf">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-file-pdf-o"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-header"><i class="fa fa-download"></i> تصدير PDF</li>
                                    <li>
                                        <a href="<?php echo str_replace('all.php', 'export-all.php', get_set_url_parameters(array('add' => array('export' => 'pdf')))); ?>">تصدير
                                            قائمة نشطة</a></li>
                                    <li>
                                        <a href="<?php echo str_replace('all.php', 'export-all.php', get_set_url_parameters(array('add' => array('export' => 'pdf', 'limit' => 'false')))); ?>">تصدير
                                            الكل <sup class="text-muted">(<?php echo $accounts->num_rows; ?>)</sup></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="btn-group btn-icon hidden-xs" data-toggle="tooltip" data-placement="top"
                                 title="Excel">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-file-excel-o"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-header"><i class="fa fa-download"></i> EXCEL تصدير</li>
                                    <li>
                                        <a href="<?php echo str_replace('all.php', 'export-all.php', get_set_url_parameters(array('add' => array('export' => 'excel')))); ?>">تصدير
                                            قائمة نشطة</a></li>
                                    <li>
                                        <a href="<?php echo str_replace('all.php', 'export-all.php', get_set_url_parameters(array('add' => array('export' => 'excel', 'limit' => 'false')))); ?>">تصدير
                                            الكل <sup class="text-muted">(<?php echo $forms->num_rows; ?>)</sup></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="btn-group btn-icon hidden-xs" data-toggle="tooltip" data-placement="top"
                                 title="طباعة">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-print"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-header"><i class="fa fa-file-o"></i> طباعة</li>
                                    <li>
                                        <a href="<?php echo str_replace('all.php', 'export-all.php', get_set_url_parameters(array('add' => array('export' => 'print')))); ?>"
                                           target="_blank">طباعة القائمة النشطة</a></li>
                                    <li>
                                        <a href="<?php echo str_replace('all.php', 'export-all.php', get_set_url_parameters(array('add' => array('export' => 'print', 'limit' => 'false')))); ?>"
                                           target="_blank">طباعة الكل <sup
                                                    class="text-muted">(<?php echo $forms->num_rows; ?>)</sup></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo str_replace('list.php', 'exportexl.php', get_set_url_parameters(array('add' => array('export' => 'printexl')))); ?>"
                                           target="_blank">طباعة استمارة نشطة </a></li>
                                    <li>
                                        <a href="<?php echo str_replace('list.php', 'exportexl.php', get_set_url_parameters(array('add' => array('export' => 'printexl', 'limit' => 'false')))); ?>"
                                           target="_blank">طباعة استمارة للكل <sup
                                                    class="text-muted">(<?php echo $forms->num_rows; ?>)</sup></a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="<?php echo str_replace('list.php', 'export.php', get_set_url_parameters(array('add' => array('export' => 'print', 'addBarcode' => true)))); ?>"
                                           target="_blank">طباعة قائمة الركود النشطة</a></li>
                                    <li>
                                        <a href="<?php echo str_replace('list.php', 'export.php', get_set_url_parameters(array('add' => array('export' => 'print', 'limit' => 'false', 'addBarcode' => true)))); ?>"
                                           target="_blank">طباعة كافة البراكودات <sup
                                                    class="text-muted">(<?php echo $forms->num_rows; ?>)</sup></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <?php if ($forms): ?>
            <table class="table table-hover table-bordered table-condensed table-striped colorchange">
                <thead>
                <tr>


                    <th class="hidden-xs">I/O</th>
                    <th class="hidden-xs" width="3%">ID<?php echo get_table_order_by('id', 'ASC'); ?></th>
                    <th> تاريخ التوزيع <?php echo get_table_order_by('date', ''); ?></th>
<!--                    <th class="hidden-xs" width="8%">الكود--><?php //echo get_table_order_by('code', ''); ?><!--</th>-->
                    <th width="10%">اسم المادة <?php echo get_table_order_by('item_name', ''); ?></th>
                    <th width="10%">اسم المستفيد <?php echo get_table_order_by('name', ''); ?></th>
                    <th width="8%">نوع الاعاقة <?php echo get_table_order_by('Retardationtype', ''); ?></th>
                    <th>ر٫الموبايل <?php echo get_table_order_by('gsm', ''); ?></th>
                    <th>العنوان <?php echo get_table_order_by('address', ''); ?></th>
                    <th> الملاحظات <?php echo get_table_order_by('note', ''); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($forms->list as $form): ?>
                    <?php
                        $account_ids = [];

                        if (isset($account_ids[$form->account_id])) {
                            continue;
                        } else {
                            $account_ids[$form->account_id] = $form->account_id;
                        }
                    ?>
                    <?php $account = get_account($form->account_id); ?>

                    <?php
                        if (isset($_GET['s'])) {
                            if ($_GET['s'] === $form->item_name) {
                                continue;
                            }
                        }
                    ?>
<!--                    --><?php
//                    $account->DateofBirth = date_format(date_create($account->DateofBirth), 'Y-m-d');
//
//                    if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
//                        $from_date = date_format(date_create($_GET['from_date']), 'Y-m-d');
//
//                        $to_date = date_format(date_create($_GET['to_date']), 'Y-m-d');
//
//                        if (($account->DateofBirth >= $from_date) && ($account->DateofBirth <= $to_date)) {
//                            // is betwen
//                        } else {
//                            continue;
//                        }
//                    }
//
//                    ?>
                    <tr id="account-id-<?= $form->form_id; ?>">
                        <td>

                            <input class="box" type="checkbox" name="checkbox" data-toggle="check-table-row"
                                   data-target="#account-id-<?= $form->form_id; ?>" id="check-<?= $form->form_id; ?>"/>
                        </td>
                        <td>
                            <a href="<?php site_url('form'); ?>id=<?= $form->form_id; ?>"><?= $form->form_id; ?>

                            </a>
                        </td>

                        <td><?php echo $form->date = date_format(date_create($form->date), 'Y-m-d'); ?></td>
                        <td><?php echo  $form->item_name?></td>

                        <td><?= $account->name; ?></td>
                        <td><?= $account->Retardationtype; ?></td>
                        <td><?= $account->gsm; ?></td>
                        <td><?= $account->address; ?></td>
                        <td><?= $account->note; ?></td>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <?php pagination($forms->num_rows); ?>

        <?php else: ?>
            <div class="not-found">
                <?php print_alert(); ?>
            </div> <!-- /.not-found -->
        <?php endif; ?>

    </div> <!-- /.panel -->


    <script>
        if (!Object.prototype.forEach) {
            Object.defineProperty(Object.prototype, 'forEach', {
                value: function (callback, thisArg) {
                    if (this == null) {
                        throw new TypeError('Not an object');
                    }
                    thisArg = thisArg || window;
                    for (var key in this) {
                        if (this.hasOwnProperty(key)) {
                            callback.call(thisArg, this[key], key, this);
                        }
                    }
                }
            });
        }

        $(document).ready(function () {
            var arr = localStorage.getItem('checked') || {};

            $('[data-toggle="check-table-row"]').on('click', function (e) {
                const clickedCheckBox = $(this);
                const targetRow = $(clickedCheckBox.attr('data-target'));
                targetRow.toggleClass('highlight');

                if (clickedCheckBox.prop('checked')) {
                    if (!(clickedCheckBox.attr('id') in arr)) {
                        arr[clickedCheckBox.attr('id')] = clickedCheckBox.prop('checked')
                    } else {
                        arr[clickedCheckBox.attr('id')] = clickedCheckBox.prop('checked')
                    }
                } else {
                    if ((clickedCheckBox.attr('id') in arr)) {
                        delete arr[clickedCheckBox.attr('id')];
                    }
                }
                localStorage.setItem("checked", JSON.stringify(arr));
            });

            arr = JSON.parse(arr);

            if ($('.box').is(':checked')) {
                $(':checked').closest('tr').addClass("highlight");
            }

            arr.forEach(function (item, key) {
                let checkbox = $('#' + key);

                checkbox.prop('checked', 'checked');
                $(checkbox.attr('data-target')).toggleClass('highlight');
            });
        });
    </script>
<?php get_footer(); ?>