<?php $this->load->view("email_template/header"); ?>


<!-- ONE COLUMN SECTION -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td bgcolor="#ffffff" align="center" style="padding: 0px 15px 0px 15px;" class="section-padding"><table border="0" cellpadding="0" cellspacing="0" width="500" class="responsive-table">
        <tr>
          <td><!-- COPY -->
            
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              
              <tr>
                <td align="center" style="font-size:18px; font-family: Helvetica, Arial, sans-serif;padding:15px 20px 15px;  color: #ffffff; background-color:#e79bc9; text-align:center; line-height:25px;" class="padding-copy"> <?=$message['header']?> </td>
              </tr>
              
              
              
              <tr>
			  <?=$message['body']?>
                  
							  <?php
      if(isset($message['button_link'])){
      ?>               <br> <span>
							 <a href="<?=$message['button_link']?>" style="color:#3361FF;"><?=$message['button_content']?> </a>  </span> 
		 <?php
      }
      ?>					 
							 </td>
              </tr>
              
                           
            </table>
			</td>
        </tr>
      </table></td>
  </tr>
</table>

<!-- TWO COLUMN SECTION -->


<?php $this->load->view("email_template/footer"); ?>