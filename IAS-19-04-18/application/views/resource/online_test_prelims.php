<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header');
?>
<section class="content online-test prelims">
		<div class="container">
            <div>
                <h1 class="mt-0 text-uppercase font-28 line-bottom line-height-1">ONLINE TEST <span class="text-theme-color-2 font-weight-400">Prelims</span></h1>
                    <div class="col-xs-12 news-container">
                        <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                    		        <?php
                    		        foreach($online_test_prelims_data['title'] as $key_sub=>$value_sub){ ?>
                    		        <div class="col-md-4 col-sm-6 col-xs-12">
                    		            <h3><?php echo $value_sub; ?></h3>
                    		            <ul class="list file-list">
                    		                <?php
                    		                $count = 1;
                    		                foreach($online_test_prelims_data[$key_sub] as $key=>$value){ ?>
                    		                <li><?php echo "<a href='".base_url().'online-test-prelims/'.$value['question_type']."'>".$value_sub. "-" .$value['question_type']."</a>"; ?></li>
                    		                <?php $count++; } ?>
                    		            </ul>
                    		        </div>
                    		 <?php } ?>
            </div>
    </div>
</div>
</div>
</div>
</section>
<?php $this->load->view('common/footer'); ?>
</body>
</html>