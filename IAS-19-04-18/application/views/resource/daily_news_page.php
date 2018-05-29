<?php
$activepage="daily-news";
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header');
?>
<section class="content news">
		<div class="container">
            <div>
                <h1 class="mt-0 text-uppercase font-28 line-bottom line-height-1">DAILY <span class="text-theme-color-2 font-weight-400">NEWS ANALYSIS</span></h1>
                    <div class="col-xs-12 col-sm-3">
                    <h3>GET NEWS BY DATE</h3>
                    <div id="quiz_datepicker"></div>
                    </div>
                    <div class="col-xs-12 col-sm-9 news-container">
                        <div class="preloaders"><img src="<?php echo base_url(); ?>assets/images/preloaders/1.gif" alt="preloaders" title="preloaders" /></div>
                    		 <table class="news-table table jsgrid table-striped table-bordered dataTable table-responsive" id="table-1">
                    		     	<thead>
									<tr>
									    <th>Video</th>
									    <th>Title</th>
									</tr>
								</thead>
                    		     <tbody>
                    		     <?php
                    		     if(isset($daily_news_data) && is_array($daily_news_data)){
                    		     foreach($daily_news_data as $key=>$value){
                    		     echo "<tr><td><iframe allowfullscreen='yes' src='".$value["video_links"]."'></iframe></td><td><h3>".$value["title"]."</h3></td></tr>";
                    		     }
                    		     }else{
                    		      echo "<tr><td colspan='2'>Data Not available</td></tr>";
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
    var today_date_quiz='0000-00-00';
    $(function(){
            $("#quiz_datepicker").datepicker({
                dateFormat: "yy-mm-dd",
                onSelect: function (dateText, inst) {
                var date = $(this).val();
               loadDailyNews(date);
                console.log(date);
                return false;
            }
        });
    });
    
    function loadDailyNews(date){
        var obj = { Title: "Daily News Article", Url:"/daily-news?date="+date };
        history.pushState(obj, obj.Title, obj.Url);
        $('.preloaders').css({"display": "block"});
        $('#table-1_wrapper').css({"display": "none"});
        $.ajax({type: "POST",url: "<?php echo base_url(); ?>load-daily-news",data: {date : date},cache: false,
  success: function(data){
     obj = data;
     $('.preloaders').css({"display": "none"});
     $('#table-1_wrapper').css({"display": "block"});
     if(obj['code'] && obj['code'] == 200){
            var content = '';
            var items = obj.items;
            for (var i = 0; i < items.length; i++) {
            content += '<tr id="table_row_' + i + '">';
            content += '<td><iframe allowfullscreen="yes" src="' + items[i].video_links + '"></iframe></td>';
            content += '<td><h3>' + items[i].title + '</h3></td>';
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