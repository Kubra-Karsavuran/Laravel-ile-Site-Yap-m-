@extends('back.layouts.master')
@section('title','Panel')
@section('content') 

<div id="wrapper">  
	<div id="content-wrapper" class="d-flex flex-column">


		<div class="container-fluid">

			<div class="card shadow mb-4">

				<div class="card-header py-3">
					<h4 class="m-0 font-weight-bold text-primary">YORUMLAR</h4>
					<p style="color: red;"><?php 
					
					if (isset($oldu)) {
						echo $oldu;
					}
					if (isset($olmadi)) {
						echo $olmadi;
					}
					if (isset($veri)) {
						echo $veri;
					}

					?></p>
				</div>

 

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Name-Surname</th>
									<th>Email</th>
									<th>Yorumlar</th>
									<th>Like</th>
									<th>Dislike</th> 
									<th>Sil</th> 
									<th>Devamı</th> 
								</tr>
							</thead> 
							<tfoot>
								<tr>
									<th>Name-Surname</th>
									<th>Email</th>
									<th>Yorumlar</th>
									<th>Like</th>
									<th>Dislike</th> 
									<th>Sil</th> 
									<th>Devamı</th> 
								</tr>
							</tfoot>
							<tbody> 
								<?php if (isset($satveri)) {

									foreach ($satveri as $value) {?> 
										<tr>
											<td><?php echo $value->ad_soyad; ?></td>
											<td><?php echo $value->email; ?></td>
											<td><?php echo $value->yorum; ?></td>
											<td><?php echo $value->like; ?></td>
											<td><?php echo $value->dislike; ?></td> 
											<td>
												<a href="/admin/commentdel/<?php echo $value->id; ?>" class="btn btn-danger btn-icon-split">
													<span class="icon text-white-50">
														<i class="fas fa-trash"></i>
													</span>
													<span class="text">Sil</span>
												</a>
											</td> 

											<td>
												<a href="/admin/pagesee/<?php echo $value->id; ?>" class="btn btn-warning btn-icon-split">
													<span class="icon text-white-50">
														<i class="fas fa-info-circle"></i>
													</span>
													<span class="text">Devamı</span>
												</a>
											</td> 

										</tr> 
									<?php }   } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div> 
			</div>  
		</div> 
		@endsection   
