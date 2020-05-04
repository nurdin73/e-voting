

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $subtitle; ?>
        <small><?= $title; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url('admin') ?>"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a href="#"><i class="fa fa-archive"></i> <?= $title; ?></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
					<div class="box-header">
                        <div class="pull-left">
                            <h3 class="box-title">Nama Desa/Sekolah</h3>
                        </div>
						<div class="pull-right">
							<a href="<?= base_url('admin/pemilih/add') ?>" class="btn btn-flat btn-sm btn-success">Tambah Pemilih</a>
						</div>
					</div>
					<div class="box-body">
						<div class="row">
                            <div class="col-md-9">
                                <div class="box box-success">
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="data-pemilih">
                                                <thead>
                                                    <tr>
                                                    	<th width="5%">No</th>
                                                        <th width="21%">Jumlah Pemilih</th>
                                                        <th width="69%" style="text-align: center;">Kelas/blok</th>
                                                        <th width="5%">Detail</th>
                                                        <th width="5%">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="box box-success">
                                    <div class="box-header">
                                        <h3 class="box-title data-text" title="Jumlah Pemilih Keseluruhan">Jumlah Pemilih Keseluruhan</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="alert alert-success" style="overflow:hidden;">
                                            <span class="pull-left">Jumlah Pemilih</span>
                                            <span class="pull-right label label-primary">100</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
        <!-- tentang apk -->
        <div class="callout callout-danger">
          <h4><?= $apk['nama_apk'] ?></h4>
          <p><?= $apk['tentang'] ?></p>
        </div>
    </section>
    <!-- /.content -->
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modalView">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="class-category">List peserta</h4>
				</div>
				<div class="modal-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered" style="width: 100%;" id="list-peserta">
							<thead>
								<tr>
									<th style="width: 5%;">No</th>
									<th style="width: 40%;">NIS/NIK</th>
									<th style="width: 45%">Nama Lengkap</th>
									<th style="width: 10%">Status</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
  <!-- Modal -->

  <script type="text/javascript">
  	const pipeline = function ( opts ) {
	    // Configuration options
	    var conf = $.extend( {
	        pages: 5,     // number of pages to cache
	        url: '',      // script url
	        data: null,   // function or object with parameters to send to the server
	                      // matching how `ajax.data` works in DataTables
	        method: 'GET' // Ajax HTTP method
	    }, opts );
	 
	    // Private variables for storing the cache
	    var cacheLower = -1;
	    var cacheUpper = null;
	    var cacheLastRequest = null;
	    var cacheLastJson = null;
	 
	    return function ( request, drawCallback, settings ) {
	        var ajax          = false;
	        var requestStart  = request.start;
	        var drawStart     = request.start;
	        var requestLength = request.length;
	        var requestEnd    = requestStart + requestLength;
	         
	        if ( settings.clearCache ) {
	            // API requested that the cache be cleared
	            ajax = true;
	            settings.clearCache = false;
	        }
	        else if ( cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper ) {
	            // outside cached data - need to make a request
	            ajax = true;
	        }
	        else if ( JSON.stringify( request.order )   !== JSON.stringify( cacheLastRequest.order ) ||
	                  JSON.stringify( request.columns ) !== JSON.stringify( cacheLastRequest.columns ) ||
	                  JSON.stringify( request.search )  !== JSON.stringify( cacheLastRequest.search )
	        ) {
	            // properties changed (ordering, columns, searching)
	            ajax = true;
	        }
	         
	        // Store the request for checking next time around
	        cacheLastRequest = $.extend( true, {}, request );
	 
	        if ( ajax ) {
	            // Need data from the server
	            if ( requestStart < cacheLower ) {
	                requestStart = requestStart - (requestLength*(conf.pages-1));
	 
	                if ( requestStart < 0 ) {
	                    requestStart = 0;
	                }
	            }
	             
	            cacheLower = requestStart;
	            cacheUpper = requestStart + (requestLength * conf.pages);
	 
	            request.start = requestStart;
	            request.length = requestLength*conf.pages;
	 
	            // Provide the same `data` options as DataTables.
	            if ( typeof conf.data === 'function' ) {
	                // As a function it is executed with the data object as an arg
	                // for manipulation. If an object is returned, it is used as the
	                // data object to submit
	                var d = conf.data( request );
	                if ( d ) {
	                    $.extend( request, d );
	                }
	            }
	            else if ( $.isPlainObject( conf.data ) ) {
	                // As an object, the data given extends the default
	                $.extend( request, conf.data );
	            }
	 
	            settings.jqXHR = $.ajax( {
	                "type":     conf.method,
	                "url":      conf.url,
	                "data":     request,
	                "dataType": "json",
	                "cache":    false,
	                "success":  function ( json ) {
	                    cacheLastJson = $.extend(true, {}, json);
	 
	                    if ( cacheLower != drawStart ) {
	                        json.data.splice( 0, drawStart-cacheLower );
	                    }
	                    if ( requestLength >= -1 ) {
	                        json.data.splice( requestLength, json.data.length );
	                    }
	                     
	                    drawCallback( json );
	                }
	            } );
	        }
	        else {
	            json = $.extend( true, {}, cacheLastJson );
	            json.draw = request.draw; // Update the echo for each response
	            json.data.splice( 0, requestStart-cacheLower );
	            json.data.splice( requestLength, json.data.length );
	 
	            drawCallback(json);
	        }
	    }
	};
	 
	// Register an API method that will empty the pipelined data, forcing an Ajax
	// fetch on the next draw (i.e. `table.clearPipeline().draw()`)
	// $.fn.dataTable.Api.register( 'clearPipeline()', function () {
	//     return this.iterator( 'table', function ( settings ) {
	//         settings.clearCache = true;
	//     } );
	// } );
	 
  	$(document).ready(function() {
  		$('#data-pemilih').DataTable({
  			'serverSide' : true,
  			'prosessing' : true,
		    'order'    : [],
		    'info'        : true,
		    "ajax"		 : pipeline({
		    	'url' : "<?= base_url('admin/dataPemilih'); ?>",
		    	'type': "post",
		    	'pages': 5
		    }),
		    "columnDefs" : [
		    	{
		    		"targets" : [0,1,3,4],
		    		"orderable" : false,
		    		"searchable" : false
		    	}
		    ]	    
  		})
  		var text = $('.data-text').html();
  		text.length > 18 ? $('.data-text').html(text.substring(0, 18)+ '...') :  $('.data-text').html(text)
  		$('#data-pemilih tbody').on('click', 'tr td .delete', function (e) {
  			e.preventDefault()
  			var id = $(this).data('id')
  			Swal.fire({
  				title: 'Apakah Kamu Yakin?',
	            text: "Apakah anda ingin menghapus kelas?",
	            type: 'warning',
	            showCancelButton: true,
	            confirmButtonColor: '#3085d6',
	            cancelButtonColor: '#d33',
	            confirmButtonText: 'Ya, Saya Yakin!'
  			}).then((result) => {
  				if(result.value) {
  					$.ajax({
  						url: "<?= base_url('admin/action/delete') ?>",
  						type: 'GET',
  						data: {id: id},
  					})
  					.done(function(response) {
  						var json = JSON.parse(response)
  						if(json.res) {
  							Swal.fire({
	                            title 	: 'Sukses!',
	                            text 	: json.message,
	                            type 	: 'success'
	                        })
  						} else {
  							Swal.fire({
	                            title 	: 'Failed!',
	                            text 	: json.message,
	                            type 	: 'error'
	                        })
  						}
  						
  					})
  					.fail(function(error) {
  						console.log(error);
  					})
  					.always(function() {
  						console.log("complete");
  					});
  					
  				}
  			})
  		})
  		$('#data-pemilih tbody').on('click', 'tr td .detail', function (e) {
  			e.preventDefault()
  			const id = $(this).data('id')
  			$('#list-peserta').DataTable({
  				'serverSide' : true,
  				'destroy' : true,
			    'order'    : [],
			    'info'        : true,
			    "ajax"		 : {
			    	'url' : "<?= base_url('admin/action/detail'); ?>",
			    	'type': "post",
			    	"data": {
			    		id : id
			    	}
			    },
			    "columnDefs" : [
			    	{
			    		"targets" : [0],
			    		"orderable" : false,
			    		"searchable" : false
			    	},
			    	{
			    		"targets" : [3],
			    		"orderable" : true,
			    		"searchable" : false
			    	},
			    ]	   
  			})

  		})

  	});
  </script> 