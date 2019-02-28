

<p class="bg-success">
	

    <?php if($this->session->flashdata('task_created')): ?>
    
    <?php echo $this->session->flashdata('task_created'); ?>
    
    <?php endif; ?>
    
    <?php if($this->session->flashdata('task_updated')): ?>
    
    <?php echo $this->session->flashdata('task_updated'); ?>
    
    <?php endif; ?>
    
    
    
    <?php if($this->session->flashdata('task_deleted')): ?>
    
    <?php echo $this->session->flashdata('task_deleted'); ?>
    
    <?php endif; ?>
    
    
    <?php if($this->session->flashdata('task_updated')): ?>
    
    <?php echo $this->session->flashdata('task_updated'); ?>
    
    <?php endif; ?>
    
    
    
    
    
    </p>
    
    
    
    
    
    
            
    
    <div class="panel panel-success">
    
    
        <div class="panel-heading"><h3>tasks</h3></div>
    
        <div class="panel-body">
    
        <ul class="list-group">
        
            <?php foreach($tasks as $task): ?>
    
            <li class='list-group-item'>
    
            <div class=''>
    
    
            <?php echo "<a  href='". base_url() ."tasks/display/". $task->id ."'>" . $task->task_name . "</a>"; ?>
    
            </div>
    
            <div class="">
    
                <a class="btn btn-danger " href="<?php echo base_url();?>tasks/delete/<?php echo $task->id; ?>"><span class="glyphicon glyphicon-remove"></span></a>
                
    
            </div>
    
            </li>
    
    
    
    
           <?php endforeach; ?>
    
        
        
        </ul>
    
    <a class="btn btn-primary pull-right" href="<?php echo base_url();?>tasks/create">Create task</a>
    
    </div>
    
    </div> <!-- ENd of panel-->
    
    
    