
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="dropdown">        
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Patients Menu') ?><span class="caret"></span></button>
            <ul class="dropdown-menu scrollable-menu" role="menu">
                
                <?php if ($this->Session->check('Auth.User')): ?> 
                
                <li class="list-group-item"><?php echo $this->Html->link(__('New Patient'), array('action' => 'add'), array('class' => '')); ?></li>
                <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Patient'), array('action' => 'delete', $patient['Patient']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $patient['Patient']['id'])); ?> </li>
                
                <?php endif ?>
                
                <li class="list-group-item"><?php echo $this->Html->link(__('List Patients'), array('action' => 'index'), array('class' => '')); ?> </li>
            </ul>  
        </div>

        <div class="dropdown">    
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Employes Menu') ?><span class="caret"></span></button>
            <ul class="dropdown-menu scrollable-menu" role="menu">
                <li class="list-group-item"><?php echo $this->Html->link(__('List Employes'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?></li> 
                
                <?php if ($this->Session->check('Auth.User')): ?> 
                <li class="list-group-item"><?php echo $this->Html->link(__('New Employes'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?></li> 
                <?php endif ?>
            
            </ul>
        </div>

        <div class="dropdown">    
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Medecins Menu') ?><span class="caret"></span></button>
            <ul class="dropdown-menu scrollable-menu" role="menu">
                <li class="list-group-item"><?php echo $this->Html->link(__('List Medecins'), array('controller' => 'medicaments', 'action' => 'index'), array('class' => '')); ?></li>                
                <?php if ($this->Session->check('Auth.User')): ?>             
                <li class="list-group-item"><?php echo $this->Html->link(__('New Medecin'), array('controller' => 'medicaments', 'action' => 'add'), array('class' => '')); ?></li>                 
                <?php endif ?>
            </ul>
        </div>
        
        <div class="dropdown">        
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Appointments Menu') ?><span class="caret"></span></button>
            <ul class="dropdown-menu scrollable-menu" role="menu">
                <?php if ($this->Session->check('Auth.User')): ?>             
                    <li class="list-group-item"><?php echo $this->Html->link(__('New Appointment'), array('controller' => 'rencontres', 'action' => 'add'), array('class' => '')); ?> </li>                 
                <?php endif ?>
                <li class="list-group-item"><?php echo $this->Html->link(__('List Appointments'), array('controller' => 'rencontres', 'action' => 'index')); ?></li>
            </ul>  
        </div>
        
        
        
    </div><!-- /#sidebar .span3 -->

    <div id="page-content" class="col-sm-9">

        <div class="patients view">

            <h2><?php echo __('Patient'); ?></h2>
            <?php if ($patient['Patient']['imageProfil']) echo $this->Html->image($patient['Patient']['imageProfil'], array('escape' => false, 'width' => '200', 'height' => '200'));?>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Nom'); ?></strong></td>
                            <td>
                                <?php echo h($patient['Patient']['nom']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php $created = $patient['Patient']['created']; ?>                         
                                <?php echo is_numeric($created) ? date("Y-m-d H:i:s", $created) : h($created); ?>&nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
                               <?php $modified = $patient['Patient']['modified']; ?>                         
                               <?php echo is_numeric($modified) ? date("Y-m-d H:i:s", $modified) : h($modified); ?>&nbsp;
                                &nbsp;
                            </td>
                        </tr>				</tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="related">

            <h3><?php echo __('Related Medecins'); ?></h3>

            <?php if (!empty($patient['Medicament'])): ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('Nom'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($patient['Medicament'] as $medicament):
                                ?>
                                <tr>
                                    <td><?php echo $medicament['id']; ?></td>
                                    <td><?php echo $medicament['nom']; ?></td>
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('View'), array('controller' => 'medicaments', 'action' => 'view', $medicament['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php if ($this->Session->check('Auth.User')) {echo $this->Html->link(__('Edit'), array('controller' => 'medicaments', 'action' => 'edit', $medicament['id']), array('class' => 'btn btn-default btn-xs'));} ?>
        <?php if ($this->Session->check('Auth.User')) {echo $this->Form->postLink(__('Delete'), array('controller' => 'medicaments', 'action' => 'delete', $medicament['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $medicament['id']));} ?>
                                    </td>
                                </tr>
    <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

<?php endif; ?>

<?php if ($this->Session->check('Auth.User')) { ?>
            <div class="actions">
                <?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Medecin'), array('controller' => 'medicaments', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				
            <div><!-- /.actions -->

             <?php   }   ?>


        </div><!-- /.related -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
