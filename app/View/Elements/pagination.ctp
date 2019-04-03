<p>
	<?php echo $this->Paginator->counter("Page {:page} of {:pages}"); ?> <br>
	<?php echo $this->Paginator->prev('Prev'); ?>
	<?php echo $this->Paginator->numbers(); ?>
	<?php echo $this->Paginator->next('Next');?>
</p>