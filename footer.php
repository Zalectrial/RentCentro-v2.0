<div class="row">
	<hr>
	<div class="col-xs-6 text-left" >
		<p> <a href="show.php?page=<?=urlencode("Conditions of use")?>">Conditions of use</a> </p> 
		<p> <a href="show.php?page=<?=urlencode("Terms And Conditions")?>">Terms And Conditions</a> </p> 
		<p> <a href="show.php?page=<?=urlencode("Privacy policy")?>">Privacy policy</a> </p> 
	</div> 

	<div class="col-xs-6 text-right" >
		<p> <a href="show.php?page=<?=urlencode("About us")?>">About us </a> <a href="show.php?page=<?=urlencode("Contact us")?>"> Contact us</a> </p> 
	</div> 



</div> <!-- /row -->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Information Log</h4>
      </div>
      <div class="modal-body">
        <p><?=$_SESSION["alert_message"]?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>