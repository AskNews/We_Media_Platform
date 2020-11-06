
				<?php
if(isset($info))
{
?>
					<div class="alert bg-pink alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?php echo $info;?>
					</div>
<?php
}
else if(isset($warning))
{
	?>
					<div class="alert alert-warning alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?php echo $warning;?>
					</div>
<?
}
else if (isset($success))
{
	?>
					<div class="alert bg-green alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?php echo $success;?>
					</div>

<?php
}
?>
