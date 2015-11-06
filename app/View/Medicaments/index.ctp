<?php
$this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array('inline' => false));
$this->Html->script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js', array('inline' => false));

$this->Html->script('View/Medicaments/index', array('inline' => false));
?>

<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">
            <div class="dropdown">        
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Patients Menu') ?><span class="caret"></span></button>
                <ul class="dropdown-menu scrollable-menu" role="menu">                
                    <li class="list-group-item"><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
                    
                    
                    <?php if ($this->Session->check('Auth.User')): ?> 
                    
                    <li class="list-group-item"><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
                
                    <?php endif ?>
                
                
                </ul>  
            </div>

            <div class="dropdown">    
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Medecins Menu') ?><span class="caret"></span></button>
                <ul class="dropdown-menu scrollable-menu" role="menu">
                    
                    <?php if ($this->Session->check('Auth.User')): ?> 
                    
                    <li class="list-group-item"><?php echo $this->Html->link(__('New Medecin'), array('action' => 'add'), array('class' => ''));?></li>
                    
                    <?php endif ?>
                    
                    <li class="list-group-item"><?php echo $this->Html->link(__('List Medecins'), array('controller' => 'medicaments', 'action' => 'index'), array('class' => '')); ?></li>            
                </ul>
            </div>
    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <div class="medicaments index">

            <h2><?php echo __('Medecins'); ?></h2>

            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>

                            <th><?php echo $this->Paginator->sort('nom'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($medicaments as $medicament): ?>
                            <tr>

                                <td><?php echo h($medicament['Medicament']['nom']); ?>&nbsp;</td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $medicament['Medicament']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $medicament['Medicament']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $medicament['Medicament']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $medicament['Medicament']['id'])); ?>
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



