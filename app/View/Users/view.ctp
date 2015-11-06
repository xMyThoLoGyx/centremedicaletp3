
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">
        <div class="actions">
            <ul class="list-group">	
                
                
                <?php if($this->Session->check('Auth.User')): ?>
                
                <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Employe'), array('action' => 'delete', $user['User']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
                
                <?php endif ?>
            
            
            </ul><!-- /.list-group -->
        </div><!-- /.actions -->
        
        <div class="dropdown">        
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Employes Menu') ?><span class="caret"></span></button>
            <ul class="dropdown-menu scrollable-menu" role="menu">                
                <li class="list-group-item"><?php echo $this->Html->link(__('List Employes'), array('action' => 'index'), array('class' => '')); ?> </li>
                <?php if($this->Session->check('Auth.User')): ?>
                <li class="list-group-item"><?php echo $this->Html->link(__('Edit Employe'), array('action' => 'edit', $user['User']['id']), array('class' => '')); ?> </li>
                <li class="list-group-item"><?php echo $this->Html->link(__('New Employe'), array('action' => 'add'), array('class' => '')); ?> </li>
                <?php endif ?>
            </ul>  
        </div>
    </div><!-- /#sidebar .span3 -->

    <div id="page-content" class="col-sm-9">

        <div class="users view">

            <h2><?php echo __('User'); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>

                        <tr>		<td><strong><?php echo __('Username'); ?></strong></td>
                            <td>
                                <?php echo h($user['User']['username']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		

                            <td><strong><?php echo __('Role'); ?></strong></td>
                            <td>
                                <?php echo h($user['User']['role']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php echo h($user['User']['created']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
                                <?php echo h($user['User']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr>					</tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
