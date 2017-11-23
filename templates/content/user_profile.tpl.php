<div class="container">
    <h1 >User Profile</h1>
	<div class="col-lg-12 well">
	<div class="row">
    <?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
				<form name="frm" action="user_profile.php" method="POST" onsubmit="return validation();">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>First Name <span class="text-red">*</span></label>
								<input type="text" name="fname" class="form-control" />
							</div>
							<div class="col-sm-6 form-group">
								<label>Last Name <span class="text-red">*</span></label>
								<input type="text" name="lname" class="form-control" />
							</div>
						</div>	
                        <div class="row">
                            <div class="col-sm-6 form-group">
								<label>User Name <span class="text-red">*</span></label>
								<input type="text" name="uname" class="form-control" />
							</div>
							<div class="col-sm-6 form-group">
								<label>Email Address <span class="text-red">*</span></label>
		                        <input type="text" name="email" class="form-control" />
							</div>
                        </div>
                        <div class="row">
							<div class="col-sm-6 form-group">
								<label>Password <span class="text-red">*</span></label>
								<input type="password" name="password" class="form-control" />
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
								<label><h1>Menu</h1></label>
                                <div class="row"> 
                                    <div class="col-sm-6 form-group">
                                        <label>Check All</label>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <input type="checkbox" name="check all" onclick="chk_all_class(this.checked)"  class="form-control" />
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
                                                <input type="checkbox" name="check_<?php echo $row['link_id']; ?>" onclick="check_main(this,<?php echo $row['link_id']; ?>)" checked="true"  class="form-control" />
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
                                                        <input type="checkbox"  name="check<?php echo $sub_row['link_id']; ?>" value="<?php echo $sub_row['link_id'] ?>" class="form-control" />
                                                    </div>
                                               </div><?php
                                                
                                            }
                                            
                                            ?>
                                <?php } ?>
							</div>	
						</div>
                        <div class="selectwrap">
        					<input type="submit" name="submit" value="Submit"/>	
                            <input type="button" name="clear" value="Clear" />
                        </div>				
					</div>
				</form> 
				</div>
	</div>
</div>
<script type="text/javascript">
function validation()
{
    var x = document.forms["frm"]["fname"].value;
    if (x == "") {
        alert("Firstname must be filled out");
        document.forms["frm"]["fname"].focus();
        return false;
        }
        
    var x = document.forms["frm"]["lname"].value;
    if (x == "") {
        alert("Lastname must be filled out");
        document.forms["frm"]["lname"].focus();
        return false;
        }
    
    var x = document.forms["frm"]["mail"].value;
    if (x == "") {
        alert("E-mail must be filled out");
        document.forms["frm"]["mail"].focus();
        return false;
        }
    
    var x = document.forms["frm"]["uname"].value;
    if (x == "") {
        alert("Username must be filled out");
        document.forms["frm"]["uname"].focus();
        return false;
        }
    var x = document.forms["frm"]["pass"].value;
    if (x == "") {
        alert("Password must be filled out");
        document.forms["frm"]["pass"].focus();
        return false;
        }
}
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
</script>