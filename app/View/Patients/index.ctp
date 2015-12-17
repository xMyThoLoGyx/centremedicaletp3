
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3"> 
            
       <?php if ($this->Session->check('Auth.User')): ?>     
        <div class="dropdown">        
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Patients Menu') ?><span class="caret"></span></button>
            <ul class="dropdown-menu scrollable-menu" role="menu">
                <li class="list-group-item"> <?php echo $this->Html->link(__('New Patient'), array('action' => 'add'), array('class' => '')); ?></li>
            </ul>  
        </div>
        
        <?php endif ?>
        <div class="dropdown">    
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Employes Menu') ?><span class="caret"></span></button>
            <ul class="dropdown-menu scrollable-menu" role="menu">
                <li class="list-group-item"><?php echo $this->Html->link(__('List Employes'), array('controller' => 'users', 'action' => 'index'), array('class' => ''));?></li> 
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

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <div class="patients index">

            <h2><?php echo __('Patients'); ?></h2>

            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                                <!-- <th><?php //echo $this->Paginator->sort('id');  ?></th> -->
                            <th><?php echo $this->Paginator->sort('nom'); ?></th>
                            <th><?php echo $this->Paginator->sort('created'); ?></th>
                            <th><?php echo $this->Paginator->sort('modified'); ?></th>
                            <th><?php echo $this->Paginator->sort('Medecin'); ?></th>
                            <th><?php echo $this->Paginator->sort('Employe'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($patients as $patient): ?>
                            <tr>
                                    <!-- <th><td><?php //echo h($patient['Patient']['id']);  ?>&nbsp;</td> -->
                                <td><?php echo h($patient['Patient']['nom']); ?>&nbsp;</td>
                                <?php $created = $patient['Patient']['created']; ?>                         
                                <td><?php echo is_numeric($created) ? date("Y-m-d H:i:s", $created) : h($created); ?>&nbsp;</td>
                                <?php $modified = $patient['Patient']['modified']; ?>                         
                                <td><?php echo is_numeric($modified) ? date("Y-m-d H:i:s", $modified) : h($modified); ?>&nbsp;</td>
                                <td><?php 
                                foreach ($patient['Medicament'] as $medicament) { 
                                        echo $this->Html->link($medicament['nom'], array('controller' => 'medicaments', 'action' => 'view', $medicament['id'])) ;
                                 ?>    
                                        <br />
                               <?php         
                                } ?>    
                                <td>
                                    <?php echo $this->Html->link($patient['User']['username'], array('controller' => 'users', 'action' => 'view', $patient['User']['id'])); ?>
                                </td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $patient['Patient']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php if ($this->Session->check('Auth.User')) { echo $this->Html->link(__('Edit'), array('action' => 'edit', $patient['Patient']['id']), array('class' => 'btn btn-default btn-xs'));?>
                                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $patient['Patient']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $patient['Patient']['id']));} ?>
                                    
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->

            <p><small>
                    <?php
                    echo $this->Paginator->counter(array(
                        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                    ));
                    ?>
                </small></p>

            <ul class="pagination">
                <?php
                echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
                echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
                ?>
            </ul><!-- /.pagination -->

        </div><!-- /.index -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->