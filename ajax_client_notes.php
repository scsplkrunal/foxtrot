<?php 
require_once("include/config.php");
require_once(DIR_FS."islogin.php");
    
$instance = new client_maintenance();   
$get_notes = $instance->select_notes();
$notes_id = 0;
?>
<table class="table table-bordered table-stripped table-hover">
    <thead>
        <th>Date</th>
        <th>User</th>
        <th>Notes</th>
        <th class="text-center">Action</th>
    </thead>
    <tbody>
    <?php foreach($get_notes as $key=>$val){
        $notes_id = $val['id'];?>
        <tr>
        <form method="post" id="add_client_notes_<?php echo $notes_id;?>" name="add_client_notes_<?php echo $notes_id;?>" onsubmit="return notessubmit(<?php echo $notes_id;?>);">
            <td><?php echo date('d/m/Y',strtotime($val['date']));?></td>
            <input type="hidden" name="date" id="date" value="<?php echo date('Y-m-d',strtotime($val['date']));?>"/>
            <td><?php echo $_SESSION['user_id'];?></td>
            <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id'];?>"/>
            <td><input type="text" name="client_note" class="form-control" id="client_note" value="<?php echo $val['notes'];?>"/></td>
            <td class="text-center">
               <input type="hidden" name="notes_id" id="notes_id" value="<?php echo $notes_id;?>"/>
               <input type="hidden" name="add_notes" value="Add Notes"  />
	           <button type="submit" class="btn btn-sm btn-warning" name="add_notes" value="Add Notes"><i class="fa fa-save"></i> Save</button>
               <a href="#" onclick="openedit(<?php echo $notes_id;?>);" class="btn btn-sm btn-primary" ><i class="fa fa-edit"></i> Edit</a>
               <a href="#" onclick="delete_notes(<?php echo $notes_id;?>);" class="btn btn-sm btn-danger confirm" ><i class="fa fa-trash"></i> Delete</a>
            </td>
        </form>
        </tr>
    <?php } $notes_id++;?>
    <tr id="add_row_notes" style="display: none;">
        <form method="post" id="add_client_notes_<?php echo $notes_id;?>" name="add_client_notes_<?php echo $notes_id;?>" onsubmit="return notessubmit(<?php echo $notes_id;?>);">
            <td><?php echo date('d/m/Y');?></td>
            <input type="hidden" name="date" id="date" value="<?php echo date('Y-m-d');?>"/>
            <td><?php echo $_SESSION['user_id'];?></td>
            <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id'];?>"/>
            <td><input type="text" name="client_note" class="form-control" id="client_note" value=""/></td>
            <td class="text-center">
               <input type="hidden" name="notes_id" id="notes_id" value="0"/>
               <input type="hidden" name="add_notes" value="Add Notes" />
	           <button type="submit" class="btn btn-sm btn-warning" name="add_notes" value="Add Notes"><i class="fa fa-save"></i> Save</button>
               <a href="<?php echo CURRENT_PAGE; ?>?action=edit&id=" class="btn btn-sm btn-primary" ><i class="fa fa-edit"></i> Edit</a>
               <a href="<?php echo CURRENT_PAGE; ?>?action=delete&id=" class="btn btn-sm btn-danger confirm" ><i class="fa fa-trash"></i> Delete</a>
            </td>
        </form>
     </tr>
  </tbody>
</table>
