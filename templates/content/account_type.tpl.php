<script src="http://code.jquery.com/color/jquery.color-2.1.2.min.js" integrity="sha256-H28SdxWrZ387Ldn0qogCzFiUDDxfPiNIyJX7BECQkDE=" crossorigin="anonymous"></script>
<div class="container">
    <h1>Account Type Maintenance</h1>
    <!-- Add table data and some process -->
    <?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
    <?php
    if($action=='add_new'||($action=='edit' && $id>0)){
        ?>
        <form method="post">
            <div class="panel-overlay-wrap">
                <div class="panel">
					<div class="panel-heading">
                        <div class="panel-control" style="float: right;">
							<div class="btn-group dropdown">
								<button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
								<ul class="dropdown-menu dropdown-menu-right" style="">
									<li><a href="<?php echo CURRENT_PAGE; ?>"><i class="fa fa-eye"></i> View List</a></li>
								</ul>
							</div>
						</div>
                        <h3 class="panel-title"><i class="ti-pencil-alt"></i> <?php echo $action=='add_new'?'Add':'Edit'; ?> Account Type</h3>
					</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Type <span class="text-red">*</span></label>
                                    <input type="text" name="type" id="type" value="<?php echo $type; ?>" class="form-control" />
                                </div>
                            </div>
                       </div>
                    </div>
                    <div class="panel-overlay">
                        <div class="panel-overlay-content pad-all unselectable"><span class="panel-overlay-icon text-dark"><i class="demo-psi-repeat-2 spin-anim icon-2x"></i></span><h4 class="panel-overlay-title"></h4><p></p></div>
                    </div>
                    <div class="panel-footer">
                        <div class="selectwrap">
                            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
        					<input type="submit" name="submit" value="Save"/>	
                            <a href="<?php echo CURRENT_PAGE;?>"><input type="button" name="cancel" value="Cancel" /></a>
                        </div>
                   </div>
                </div>
            </div>
        </form>
        <?php
    }
    else{?>
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
                        <th>TYPE</th>
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
                                <td><?php echo $val['type']; ?></td>
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
<style>
.btn-primary {
    color: #fff;
    background-color: #337ab7 !important;
    border-color: #2e6da4 !important;
</style>