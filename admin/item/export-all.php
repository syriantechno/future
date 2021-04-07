<?php include('../../ultra.php'); ?>
    <meta charset="UTF-8">
    <title>قائمة بطاقات المنتجات | المستقبل</title>
<?php
ini_set('max_execution_time', 300);
ini_set('memory_limit', '-1');

$export_type = '';
if (isset($_GET['export'])) {
    $export_type = $_GET['export'];
}
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
$forms = get_all_form_items();
?>

<?php if ($export_type == 'print') {
    get_header_print(array('title' => 'قائمة بطاقات المنتجات'));
} ?>

<?php if ($forms): ?>
    <?php if ($export_type == 'print'): ?>
        <div class="h-20"></div>
        <table class="table table-hover table-bordered table-condensed">
            <tr>
                <th width="3%">ID</th>
                <th> </th>
                <!--                    <th class="hidden-xs" width="8%">الكود--><?php //echo get_table_order_by('code', ''); ?><!--</th>-->
                <th width="10%">اسم المادة </th>
                <th width="10%">اسم المستفيد </th>
                <th width="8%">نوع الاعاقة </th>
                <th>ر٫الموبايل </th>
                <th>العنوان</th>
                <th> الملاحظات </th>
            </tr>
            <?php foreach ($forms->list as $form): ?>
                <?php
                $account = get_account($form->account_id);
                ?>
                <?php
                if (isset($_GET['s'])) {
                    if ($_GET['s'] === $form->item_name) {
                        continue;
                    }
                }
                ?>
                <tr id="account-id-<?= $form->form_id; ?>">

                    <td>
                        <a href="detail.php?id=<?= $form->form_id; ?>"><?= $form->form_id; ?>
                        </a>
                    </td>

                    <td><?php echo $form->date = date_format(date_create($form->date), 'Y-m-d'); ?></td>
                    <td><?php echo  $form->item_name?></td>

                    <td><?php echo $account->name; ?></td>
                    <td><?php echo $account->Retardationtype; ?></td>
                    <td><?php echo $account->gsm; ?></td>
                    <td><?php echo $account->address; ?></td>
                    <td><?php echo $account->note; ?></td>

                </tr>
            <?php endforeach; ?>
        </table>

    <?php else: ?>
        <table>
            <tr>
                <th width="3%">ID</th>
                <th> </th>
                <!--                    <th class="hidden-xs" width="8%">الكود--><?php //echo get_table_order_by('code', ''); ?><!--</th>-->
                <th width="10%">اسم المادة </th>
                <th width="10%">اسم المستفيد </th>
                <th width="8%">نوع الاعاقة </th>
                <th>ر٫الموبايل </th>
                <th>العنوان</th>
                <th> الملاحظات </th>
            </tr>
            <?php foreach ($forms->list as $form): ?>
                <?php
                $account = get_account($form->account_id);
                ?>
                <?php
                if (isset($_GET['s'])) {
                    if ($_GET['s'] === $form->item_name) {
                        continue;
                    }
                }
                ?>
                <tr id="account-id-<?= $form->form_id; ?>">

                    <td>
                        <a href="detail.php?id=<?= $form->form_id; ?>"><?= $form->form_id; ?>
                        </a>
                    </td>

                    <td><?php echo $form->date = date_format(date_create($form->date), 'Y-m-d'); ?></td>
                    <td><?php echo  $form->item_name?></td>

                    <td><?php echo $account->name; ?></td>
                    <td><?php echo $account->Retardationtype; ?></td>
                    <td><?php echo $account->gsm; ?></td>
                    <td><?php echo $account->address; ?></td>
                    <td><?php echo $account->note; ?></td>

                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

<?php endif; ?>


<?php
if ($export_type == 'excel') {
    export_excel('قائمة بطاقات المنتج');
} elseif ($export_type == 'pdf') {
    ?>
    <style>
        table tr td {
            border-bottom: 1px solid #ccc;
        }
    </style>
    <?php
    export_pdf('قائمة بطاقات المنتج');
} elseif ($export_type == 'print') {
    get_footer_print();
}
?>