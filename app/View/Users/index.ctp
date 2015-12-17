
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="dropdown">        
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Employes Menu') ?><span class="caret"></span></button>
            <ul class="dropdown-menu scrollable-menu" role="menu">                
                <li class="list-group-item"><?php echo $this->Html->link(__('New Employe'), array('action' => 'add'), array('class' => '')); ?></li>
            </ul>  
        </div>

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <div class="users index">

            <h2><?php echo __('Users'); ?></h2>

            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort('username'); ?></th>
                            <!--<td><th><?php //echo $this->Paginator->sort('password');   ?></th> -->
                            <th><?php echo $this->Paginator->sort('role'); ?></th>
                            <th><?php echo $this->Paginator->sort('created'); ?></th>
                            <th><?php echo $this->Paginator->sort('modified'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                                <!--<td><?php //echo h($user['User']['password']);   ?>&nbsp;</td> -->
                                <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
                                <?php $created = $user['User']['created']; ?>                         
                                <td><?php echo is_numeric($created) ? date("Y-m-d H:i:s", $created) : h($created); ?>&nbsp;</td>
                                <?php $modified = $user['User']['modified']; ?>                         
                                <td><?php echo is_numeric($modified) ? date("Y-m-d H:i:s", $modified) : h($modified); ?>&nbsp;</td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    
                                    <?php if($this->Session->check('Auth.User')): ?>
                                    
                                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
                                
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