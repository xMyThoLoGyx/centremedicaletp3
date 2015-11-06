

<p>
    <strong>Bonjour <?php echo $username; ?></strong>   
</p>



<p>
    
    Pour activer ce compte suivez le lien : 
    
    <?php echo $this->Html->link('Activer mon compte', $this->Html->url($link, true)) ?>
    
    
</p>


