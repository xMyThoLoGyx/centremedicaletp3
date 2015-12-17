
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
                <li class="list-group-item"><?php echo $this->Html->link(__('List Medecins'), array('action' => 'index'), array('class' => '')); ?> </li>
                <?php if ($this->Session->check('Auth.User')): ?> 
                <li class="list-group-item"><?php if ($this->Session->check('Auth.User')) {echo $this->Html->link(__('Edit Medecin'), array('action' => 'edit', $medicament['Medicament']['id']), array('class' => ''));} ?> </li>
                <li class="list-group-item"><?php if ($this->Session->check('Auth.User')) {echo $this->Form->postLink(__('Delete Medecin'), array('action' => 'delete', $medicament['Medicament']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $medicament['Medicament']['id']));} ?> </li>
                <li class="list-group-item"><?php if ($this->Session->check('Auth.User')) {echo $this->Html->link(__('New Medecin'), array('action' => 'add'), array('class' => ''));} ?> </li>
                <?php endif ?>
            </ul>
        </div>

    </div><!-- /#sidebar .span3 -->

    <div id="page-content" class="col-sm-9">

        <div class="medicaments view">

            <h2><?php echo __('Medecin'); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>

                    <td><strong><?php echo __('Identifiant du medicament:'); ?></strong></td>
                    <td>
                        <?php echo h($medicament['Medicament']['id']); ?>
                        &nbsp;
                    </td>

                    <tr>		<td><strong><?php echo __('Nom:'); ?></strong></td>
                        <td>
                            <?php echo h($medicament['Medicament']['nom']); ?>
                            &nbsp;
                        </td>
                    </tr>					</tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="related">

            <h3><?php echo __('Related Patients'); ?></h3>

            <?php if (!empty($medicament['Patient'])): ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>

                                <th><?php echo __('Nom'); ?></th>
                                <th><?php echo __('Created'); ?></th>
                                <th><?php echo __('Modified'); ?></th>

                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($medicament['Patient'] as $patient):
                                ?>
                                <tr>

                                    <td><?php echo $patient['nom']; ?></td>
                                    <?php $created = $patient['created']; ?>                         
                                    <td><?php echo is_numeric($created) ? date("Y-m-d H:i:s", $created) : h($created); ?>&nbsp;</td>
                                    <?php $modified = $patient['modified']; ?>                         
                                    <td><?php echo is_numeric($modified) ? date("Y-m-d H:i:s", $modified) : h($modified); ?>&nbsp;</td>

                                    <td class="actions">
                                        <?php echo $this->Html->link(__('View'), array('controller' => 'patients', 'action' => 'view', $patient['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        
                                         <?php if($this->Session->check('Auth.User')): ?>   
                                            
                                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'patients', 'action' => 'edit', $patient['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'patients', 'action' => 'delete', $patient['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $patient['id']));?>
                                    
                                        <?php endif ?>
                                    
                                    
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

            <?php endif; ?>

            <?php if ($this->Session->check('Auth.User')) { ?>
                <div class="actions">
                    <?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Patient'), array('controller' => 'patients', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				
                </div><!-- /.actions -->

            <?php } ?>
        </div><!-- /.related -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
