
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">
        <div class="dropdown">        
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Patients Menu') ?><span class="caret"></span></button>
            <ul class="dropdown-menu scrollable-menu" role="menu">

                <?php if ($this->Session->check('Auth.User')): ?> 

                    <li class="list-group-item"><?php echo $this->Html->link(__('New Patient'), array('action' => 'add'), array('class' => '')); ?></li>


                <?php endif ?>                 
                <li class="list-group-item"><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index'), array('class' => '')); ?> </li>             
            </ul>  
        </div>

        <div class="dropdown">        
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Appointments Menu') ?><span class="caret"></span></button>
            <ul class="dropdown-menu scrollable-menu" role="menu">

                <?php if ($this->Session->check('Auth.User')): ?> 
                    <li class="list-group-item"><?php echo $this->Html->link(__('Edit Appointment'), array('action' => 'edit', $rencontre['Rencontre']['id']), array('class' => '')); ?> </li>
                    <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Appointment'), array('action' => 'delete', $rencontre['Rencontre']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $rencontre['Rencontre']['id'])); ?> </li>
                    <li class="list-group-item"><?php echo $this->Html->link(__('New Appointment'), array('action' => 'add'), array('class' => '')); ?> </li>

                <?php endif ?>

                <li class="list-group-item"><?php echo $this->Html->link(__('List Appointments'), array('action' => 'index'), array('class' => '')); ?> </li>
            </ul>  
        </div>




    </div><!-- /#sidebar .span3 -->

    <div id="page-content" class="col-sm-9">

        <div class="rencontres view">

            <h2><?php echo __('Appointment'); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Date'); ?></strong></td>
                            <td>
                                <?php echo h($rencontre['Rencontre']['date']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Patient'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($rencontre['Patient']['nom'], array('controller' => 'patients', 'action' => 'view', $rencontre['Patient']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr>					</tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
