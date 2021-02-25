<?php
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
if (!empty($records)) {
?>
<!--record-->
<?php
$counter = 0;
foreach($records as $data){
$rec_id = (!empty($data['todos_id']) ? urlencode($data['todos_id']) : null);
$counter++;
?>
<tr>
    <th class=" td-checkbox">
        <label class="custom-control custom-checkbox custom-control-inline">
            <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['todos_id'] ?>" type="checkbox" />
                <span class="custom-control-label"></span>
            </label>
        </th>
        <th class="td-sno"><?php echo $counter; ?></th>
        <td class="td-ntbd">
            <span  data-value="<?php echo $data['ntbd']; ?>" 
                data-pk="<?php echo $data['todos_id'] ?>" 
                data-url="<?php print_link("to_dos/editfield/" . urlencode($data['todos_id'])); ?>" 
                data-name="ntbd" 
                data-title="Enter Needs to be done" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <?php echo $data['ntbd']; ?> 
            </span>
        </td>
        <td class="td-status">
            <span  data-value="<?php echo $data['status']; ?>" 
                data-pk="<?php echo $data['todos_id'] ?>" 
                data-url="<?php print_link("to_dos/editfield/" . urlencode($data['todos_id'])); ?>" 
                data-name="status" 
                data-title="Enter Status" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <?php echo $data['status']; ?> 
            </span>
        </td>
        <td class="td-remaks">
            <span  data-value="<?php echo $data['remaks']; ?>" 
                data-pk="<?php echo $data['todos_id'] ?>" 
                data-url="<?php print_link("to_dos/editfield/" . urlencode($data['todos_id'])); ?>" 
                data-name="remaks" 
                data-title="Enter Remaks" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <?php echo $data['remaks']; ?> 
            </span>
        </td>
        <td class="td-start_date"> <?php echo $data['start_date']; ?></td>
        <td class="td-end_date">
            <span  data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                data-value="<?php echo $data['end_date']; ?>" 
                data-pk="<?php echo $data['todos_id'] ?>" 
                data-url="<?php print_link("to_dos/editfield/" . urlencode($data['todos_id'])); ?>" 
                data-name="end_date" 
                data-title="Enter End Date" 
                data-placement="left" 
                data-toggle="click" 
                data-type="flatdatetimepicker" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <?php echo $data['end_date']; ?> 
            </span>
        </td>
        <td class="page-list-action td-btn">
            <div class="dropdown" >
                <button data-toggle="dropdown" class="dropdown-toggle btn btn-primary btn-sm">
                    <i class="fa fa-bars"></i> 
                </button>
                <ul class="dropdown-menu">
                    <a class="dropdown-item page-modal" href="<?php print_link("to_dos/view/$rec_id"); ?>">
                        <i class="fa fa-eye"></i> <?php print_lang('view'); ?> 
                    </a>
                    <a class="dropdown-item page-modal" href="<?php print_link("to_dos/edit/$rec_id"); ?>">
                        <i class="fa fa-edit"></i> <?php print_lang('edit'); ?>
                    </a>
                    <a  class="dropdown-item record-delete-btn" href="<?php print_link("to_dos/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                        <i class="fa fa-times"></i> <?php print_lang('delete'); ?> 
                    </a>
                </ul>
            </div>
        </td>
    </tr>
    <?php 
    }
    ?>
    <?php
    } else {
    ?>
    <td class="no-record-found col-12" colspan="100">
        <h4 class="text-muted text-center ">
            <?php print_lang('no_record_found'); ?>
        </h4>
    </td>
    <?php
    }
    ?>
    