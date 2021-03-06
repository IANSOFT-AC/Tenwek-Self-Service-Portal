<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 2/22/2020
 * Time: 5:23 PM
 */



/* @var $this yii\web\View */

$this->title = 'HRMIS - Approval Requests';
$this->params['breadcrumbs'][] = ['label' => 'Approval Management', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Approvals List', 'url' => ['index']];
?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Approval Requests</h3>


                    <?php
                    if(Yii::$app->session->hasFlash('success')){
                        print ' <div class="alert alert-success alert-dismissable">
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-check"></i> Success!</h5>
 ';
                        echo Yii::$app->session->getFlash('success');
                        print '</div>';
                    }else if(Yii::$app->session->hasFlash('error')){
                        print ' <div class="alert alert-danger alert-dismissable">
                                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-check"></i> Error!</h5>
                                ';
                        echo Yii::$app->session->getFlash('error');
                        print '</div>';
                    }
                    ?>



                </div>
                <div class="card-body">
                    <table class="table table-bordered dt-responsive table-hover" id="approvals">
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!--My Bs Modal template  --->



<?php
$absoluteUrl = \yii\helpers\Url::home(true);

print '<input type="hidden" id="ab" value="'.$absoluteUrl.'" />';
$script = <<<JS

    $(function(){
         /*Data Tables*/
         
         var absolute = $('#ab').val(); 
         
         $.fn.dataTable.ext.errMode = 'throw';
        
    
          $('#approvals').DataTable({
           
            //serverSide: true,  
            ajax: absolute +'approvals/getapprovals',
            paging: true,
            columns: [
                { title: 'Entry_No' ,data: 'Entry_No'},
                { title: 'Comment' ,data: 'Comment'},
                { title: 'Sender ID' ,data: 'Sender_ID'},
                { title: 'Document Type' ,data: 'Document_Type'},
                { title: 'Status' ,data: 'Status'},
                { title: 'Document No' ,data: 'Document_No'},
                { title: 'Details' ,data: 'Details'},

                { title: 'Approve' ,data: 'Approvelink'},
                { title: 'Reject' ,data: 'Rejectlink'},
                { title: 'Action' ,data: 'details'},
                
               
            ] ,                              
           language: {
                "zeroRecords": "No Requests to Approve for now."
            },
            
            order : [[ 0, "desc" ]]
           
       });
        
       //Hidding some 
       var table = $('#approvals').DataTable();
       table.columns([1,5,2,0]).visible(false);
    
    /*End Data tables*/
    
    /*Post Approval comment*/
    
    $('form#approval-comment').on('submit', function(e){
        e.preventDefault();
        
        var url = absolute + 'approvals/reject-request'; 
        var data = $(this).serialize();
        
        
        $.post(url, data).done(function(msg){
          // $('.modal').modal('hide');
            var confirm = $('.modal').modal('show')
                    .find('.modal-body')
                    .html(msg.note);
            
            setTimeout(confirm, 1000);
            
        },'json');
        
       
    });
    
    
    /*Modal initialization*/
    
        $('#approvals').on('click','.reject',function(e){
            e.preventDefault();
            
            var docno = $(this).attr('rel');
            var Record_ID_to_Approve = $(this).attr('rev');
            var Table_ID = $(this).attr('name');
            
            $('input[name=documentNo]').val(docno);
            $('input[name=Record_ID_to_Approve]').val(Record_ID_to_Approve);
            $('input[name=Table_ID]').val(Table_ID);
            
    
            $('.modal').modal('show');                            
    
         });
        
      /*Submit approval comment */
      
      
        
        /*Handle dismissal event of modal */
        $('.modal').on('hidden.bs.modal',function(){
            var reld = location.reload(true);
            setTimeout(reld,1000);
        });

    /* Data tables */
    
    });//end jquery initialization


        
JS;

$this->registerJs($script);






