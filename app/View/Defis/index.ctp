

<div class="defis">
    <div class="paginator">
<?php echo $this->paginator->numbers(); ?>
    </div>
<?php 

foreach($defis as $defi) { ?>
    <article>
        <div>
            <h3><?php echo $defi['Defi']['nom'] ?></h3>
            Proposé par <span style="font-weight: bold"><?php echo $defi['Defi']['demandeur'] ?></span>
            <div style="float:right">
                <?php echo $defi['Localisation']['lieu'] ?> <br/>
                 <?php echo $defi['Horaire']['horaire'] ?> 
            </div>
        </div>
        
        <div class="content"><?php echo $defi['Defi']['nature']; ?></div>
        
        
    </article>
    

<?php  } ?>
     <div class="paginator">
<?php echo $this->paginator->numbers(); ?>
    </div>
</div>
