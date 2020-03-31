
<div class="row-fluid">
	<table class="table table-bordered" id="table_records">
		<thead>
			<tr>
				<th>ID</th>
				<th>NAME</th>	
			</tr>
		</thead>
		<tbody>
			<?php // foreach($records as $record):?>
			<!-- <tr>
				<td><?php// echo $record['Record']['id']?></td>
				<td><?php// echo $record['Record']['name']?></td>
			</tr>	 -->
			<?php// endforeach;?>
		</tbody>
	</table>
</div>
<?php $this->start('script_own')?>
<script>
// $(document).ready(function(){

//     $('#table_records').dataTable({
//         "iDisplayLength": 100,
//         "bProcessing": true,
//         "bServerSide": true,
//         "sAjaxSource": "/cities/index.json",
//         "aoColumns": [
//             {mData:"Record.id"},
//             {mData:"Record.name"},
//         ],
//         "sDom": 'frtip'
//     });

// })

$(function() {
    $('#table_records').dataTable({
        "iDisplayLength": 100,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "/states/index.json",
        "sDom": 'CRTfrtip',
        "oTableTools": {
            "sSwfPath": "/js/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf",
        },
        "aoColumns":[
            {bVisible: false},
            {bSortable: false}
        ],
        "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(0)', nRow).html('hi');
        }
    });
});
</script>
<?php $this->end()?>