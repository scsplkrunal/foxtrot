<div class="container">
    <h1 >User Profile</h1>
	<div class="col-lg-12 well">
	<div class="row">
    <!-- Add table data and some process -->
    <?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
    <?php
    if($action=='add_new'||($action=='edit' && $id>0)){
    ?>
    <form name="frm" action="user_profile.php" method="POST">
    <div class="panel-heading">
        <div class="panel-control" style="float: right;">
			<div class="btn-group dropdown">
				<button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
				<ul class="dropdown-menu dropdown-menu-right" style="">
					<li><a href="<?php echo CURRENT_PAGE; ?>"><i class="fa fa-eye"></i> View List</a></li>
				</ul>
			</div>
		</div>
        <h3 class="panel-title"><i class="fa fa-pencil-square-o"></i><?php echo $action=='add_new'?'Add':'Edit'; ?> User</h3>
	</div>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>First Name <span class="text-red">*</span></label>
								<input type="text" name="fname" class="form-control" value="<?php echo $fname; ?>" />
							</div>
							<div class="col-sm-6 form-group">
								<label>Last Name <span class="text-red">*</span></label>
								<input type="text" name="lname" class="form-control" value="<?php echo $lname; ?>" />
							</div>
						</div>	
                        <div class="row">
                            <div class="col-sm-6 form-group">
								<label>User Name <span class="text-red">*</span></label>
								<input type="text" onblur="checkLength(this)" maxlength="10" name="uname" class="form-control" value="<?php echo $uname; ?>" />
							</div>
							<div class="col-sm-6 form-group">
								<label>Email Address <span class="text-red">*</span></label>
		                        <input type="text" name="email" class="form-control" value="<?php echo $email; ?>" />
							</div>
                        </div>
                        <div class="row">
							<div class="col-sm-6 form-group">
								<label>Password <span class="text-red">*</span></label>
								<input type="password" onblur="checkLength(this)" maxlength="10" name="password" class="form-control" />
							</div>
                            <div class="col-sm-6 form-group">
								<label>Confirm Password <span class="text-red">*</span></label>
								<input type="text" name="confirm_password" class="form-control" />
							</div>	
						</div>
                        <div class="row">
							<div class="col-sm-6 form-group">
								<label>Upload Image <?php if($action=='edit'){ }else{?><span class="text-red">*</span><?php } ?></label>
    						    <input type="file" class="form-control" name="user_image" />
							</div>
                        </div>
                        <div class="row">
							<div class="col-sm-6 form-group">
								<label><h3>User Menu Rights:</h3></label><br /><br />
                                <div class="row"> 
                                    <div class="col-sm-6 form-group">
                                        <label>Check All</label>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <input type="checkbox" class="checkbox" name="check all" onclick="chk_all_class(this.checked)"/>
                                    </div>
                                </div>
                                <?php 
                                    $query="select * from menu_master where parent_id=0";
                                    $result=mysql_query($query);
                                    
                                    while($row=mysql_fetch_array($result))
                                    { 
                                    
                                ?>      <div class="row"> 
                                            <div class="col-sm-6 form-group">
                                                <label><?php echo $row['link_text']; ?></label><br />
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <input type="checkbox" class="checkbox" name="check_<?php echo $row['link_id']; ?>" onclick="check_main(this,<?php echo $row['link_id']; ?>)" checked="true"/>
                                            </div>
                                        </div>
								       <?php
                                            $sub_query="select * from menu_master where parent_id='".$row['link_id']."'";
                                            $sub_result=mysql_query($sub_query); 
                                            while($sub_row=mysql_fetch_array($sub_result))
                                            { ?>
                                               <div class="row"> 
                                                    <div class="col-sm-6 form-group">
                                                        <?php echo $sub_row['link_text'];?>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <input type="checkbox" class="checkbox"  name="check<?php echo $sub_row['link_id']; ?>" value="<?php echo $sub_row['link_id'] ?>"/>
                                                    </div>
                                               </div><?php
                                                
                                            }
                                            
                                            ?>
                                <?php } ?>
							</div>	
						</div>
                        <div class="selectwrap">
        					<input type="submit" name="submit" value="Save"/>	
                            <a href="<?php echo CURRENT_PAGE;?>"><input type="button" name="cancel" value="Cancel" /></a>
                        </div>				
					</div>
				</form> 
                <?php }else{?>
                <div class="panel">
            		<div class="panel-heading">
                        <div class="panel-control">
                            <div class="btn-group dropdown" style="float: right;">
            					<button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
            					<ul class="dropdown-menu dropdown-menu-right" style="">
            						<li><a href="<?php echo CURRENT_PAGE; ?>?action=add_new"><i class="fa fa-plus"></i> Add New</a></li>
            					</ul>
            				</div>
            			</div>
                        <h3 class="panel-title">List</h3>
            		</div>
            		<div class="panel-body">
                    <div class="table-responsive" id="register_data">
            			<table id="data-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            	            <thead>
            	                <tr>
                                    <th class="text-center">#NO</th>
                                    <th>USER NAME</th>
                                    <th class="text-center">STATUS</th>
                                    <th class="text-center">ACTION</th>
                                </tr>
            	            </thead>
            	            <tbody>
            	                <?php
                                    $count = 0;
                                    foreach($return as $key=>$val){
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo ++$count; ?></td>
                                            <td><?php echo $val['user_name']; ?></td>
                                            <td class="text-center">
                                                <?php
                                                    if($val['status']==1){
                                                        ?>
                                                        <a href="<?php echo CURRENT_PAGE; ?>?action=status&id=<?php echo $val['id']; ?>&status=0" class="btn btn-sm btn-success"><i class="fa fa-check-square-o"></i> Enabled</a>
                                                        <?php
                                                    }
                                                    else{
                                                        ?>
                                                        <a href="<?php echo CURRENT_PAGE; ?>?action=status&id=<?php echo $val['id']; ?>&status=1" class="btn btn-sm btn-warning"><i class="fa fa-warning"></i> Disabled</a>
                                                        <?php
                                                    }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo CURRENT_PAGE; ?>?action=edit&id=<?php echo $val['id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="<?php echo CURRENT_PAGE; ?>?action=delete&id=<?php echo $val['id']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                        </div>
            		</div>
            	</div>
                <?php } ?>
	   </div>
	</div>
</div>
<style>
.btn-primary {
    color: #fff;
    background-color: #337ab7 !important;
    border-color: #2e6da4 !important;
}
</style>
<script type="text/javascript">
function chk_all_class(chk)
{
    with(document.frm)
	{
		var d;
		d=document.getElementsByTagName("input");
		for(i=0;i<d.length;i++)
		{
            var elm_name=d[i].name;
            if(d[i].type=="checkbox")
			{
                if(chk==true)
				{
					d[i].checked=true;
                }
				else
				{
					d[i].checked=false;				  
                }
			}
		}
	}
}
function checkLength(el) {
  if (el.value.length != 2) {
    alert("length grater than 2 characters")
  }
}
</script>