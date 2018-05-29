<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header');
?>
<section class="content news monthly-affairs">
		<div class="container">
            <div>
                <h1 class="mt-0 text-uppercase font-28 line-bottom line-height-1">MONTHLY <span class="text-theme-color-2 font-weight-400">CURRENT AFFAIRS</span></h1>
                    <div class="col-xs-12 col-sm-3">
                    <h3>GET CURRENT AFFAIR BY MONTH</h3>
                    <form name="monthly-affairs-form" id="monthly-affairs-form" method="post">
                        <?php $month= date("m"); $year= date("Y");?>
                        <div class="form-group">
                            <select class="form-control" id="monthly_month" name="monthly_month" required>
                                <option <?php if($month == 1){ echo "selected";} ?> value="1">Jan</option>
                                <option <?php if($month == 2){ echo "selected";} ?> value="2">Feb</option>
                                <option <?php if($month == 3){ echo "selected";} ?> value="3">Mar</option>
                                <option <?php if($month == 4){ echo "selected";} ?> value="4">Apr</option>
                                <option <?php if($month == 5){ echo "selected";} ?> value="5">May</option>
                                <option <?php if($month == 6){ echo "selected";} ?> value="6">Jun</option>
                                <option <?php if($month == 7){ echo "selected";} ?> value="7">Jul</option>
                                <option <?php if($month == 8){ echo "selected";} ?> value="8">Aug</option>
                                <option <?php if($month == 9){ echo "selected";} ?> value="9">Sep</option>
                                <option <?php if($month == 10){ echo "selected";} ?> value="10">Oct</option>
                                <option <?php if($month == 11){ echo "selected";} ?> value="11">Nov</option>
                                <option <?php if($month == 12){ echo "selected";} ?> value="12">Dec</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="monthly_year" name="monthly_year" required>
                                <?php 
                                for($i=2010;$i<=2050;$i++){
                                $option ="<option ";
                                if($year == $i){ $option .= " selected";}
                                    $option .= " value='$i'>$i</option>";
                                echo $option;
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-primary" name="monthly-affairs-form-submission" id="monthly-affairs-form-submission" value="Get" />
                        </div>
                    </form>
                    </div>
                    <div class="col-xs-12 col-sm-9 news-container">
                        
                        <div class="preloaders"><img src="<?php echo base_url(); ?>assets/images/preloaders/1.gif" alt="preloaders" title="preloaders" /></div>
                    		 <table class="news-table table jsgrid table-striped table-bordered dataTable table-responsive" id="table-1">
                    		     	<thead>
									<tr>
									    <th>File</th>
									    <th>Title</th>
									</tr>
								</thead>
                    		     <tbody>
                    		     <?php
                    		     foreach($MonthlyCurrentAffair as $key=>$value){
                    		     echo "<tr><td><a href='".base_url()."assets/files/currentaffair/".$value["file_url"]."' target='_blank'><img src='". base_url() ."assets/images/icon-download-pdf.png'></img></td>
                    		     <td><h3>".$value["title"]." Current Affairs for-".$value["month"]."/".$value["year"]."</h3></td></tr>";
                    		     }
                    		     ?>
                    		     </tbody>
                    		 </table>
                    </div>
            </div>
    </div>
</section>
<?php $this->load->view('common/footer'); ?>
<script type="text/javascript">
      $('.preloaders').css({"display": "none"});
      
      $("#monthly-affairs-form-submission").click(function(){
          var month = $("#monthly_month").val();
          var year = $("#monthly_year").val();
          loadMonthlyCurrentAffairs(month,year);
      });
    function loadMonthlyCurrentAffairs(month,year){
        var baseurl = "<?php echo base_url(); ?>";
        $('.preloaders').css({"display": "block"});
        $('#table-1_wrapper').css({"display": "none"});
        $.ajax({type: "POST",url: "<?php echo base_url(); ?>load-monthly-currentaffair",data: {month : month, year : year},cache: false,
        success: function(data){
              console.log(data);
             obj = data;
             $('.preloaders').css({"display": "none"});
             $('#table-1_wrapper').css({"display": "block"});
             if(obj['code'] && obj['code'] == 200){
                    var content = '';
                    var items = obj.items;
                    for (var i = 0; i < items.length; i++) {
                    content += '<tr id="table_row_' + i + '">';
                    content += '<td><a href="'+baseurl+'assets/files/currentaffair/'+ items[i].file_url +'" target="_blank"><img src="'+baseurl+'assets/images/icon-download-pdf.png"></img></td>';
                    content += '<td><h3>' + items[i].title + ' Current Affairs for - ' + items[i].month + '/'+ items[i].year +'</h3></td>';
                    content += '</tr>';
                    }
                     $('#table-1 tbody').html(content);
                     $('#table-1').DataTable();
             }else{
                    var content = '';
                    content += '<tr>';
                    content += '<td colspan="2"><h3>' + obj.message + '</h3></td>';
                    content += '</tr>';
                    $('#table-1 tbody').html(content);
                    $('#table-1').DataTable();
             }
              },
              error: function(xhr,status,error){
                  console.log(status+"-"+error);
                  $('.preloaders').css({"display": "none"});
              }
            });
}
    </script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vendor/detectmobilebrowser/detectmobilebrowser.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vendor/switchery/dist/switchery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vendor/DataTables/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vendor/DataTables/js/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vendor/DataTables/Responsive/js/dataTables.responsive.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vendor/DataTables/Responsive/js/responsive.bootstrap4.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
    $('#table-1').DataTable();
    /* =================================================================
       Exporting Table Data
    ================================================================= */
    $('#table-2').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
});
</script>
</body>
</html>