
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
    <?php if ($this->Session->check('Auth.User')): ?>           
        <div class="dropdown">        
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Appointments Menu') ?><span class="caret"></span></button>
            <ul class="dropdown-menu scrollable-menu" role="menu">                  
                    <li class="list-group-item"><?php echo $this->Html->link(__('New Appointment'), array('action' => 'add'), array('class' => '')); ?> </li>                    
            </ul>  
        </div>
    <?php endif ?>          








    </div><!-- /#sidebar .col-sm-3 -->








    <div id="page-content" class="col-sm-9">

        <div class="rencontres index">

            <h2><?php echo __('Appointments'); ?></h2>

            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                           
                            <th><?php echo $this->Paginator->sort('date'); ?></th>
                            <th><?php echo $this->Paginator->sort('patient_id'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rencontres as $rencontre): ?>
                            <tr>
                              
                                <td><?php echo h($rencontre['Rencontre']['date']); ?>&nbsp;</td>
                                <td>
                                    <?php echo $this->Html->link($rencontre['Patient']['nom'], array('controller' => 'patients', 'action' => 'view', $rencontre['Patient']['id'])); ?>
                                </td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $rencontre['Rencontre']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php if ($this->Session->check('Auth.User')): ?> 
                                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $rencontre['Rencontre']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $rencontre['Rencontre']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $rencontre['Rencontre']['id'])); ?>
                                    <?php endif ?>      
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