
//== start untuk tombol-hapus ==//
$('.tombol-hapus-role').on('click', function(e){

	e.preventDefault();
	const href = $(this).attr('href');
	
	Swal({
		title : 'Apakah anda yakin',
		text : "data role akan dihapus",
		type : 'warning',
		showCancelButton : true,
		confirmButtonColor : '#3085d6',
		cancelButtonColor : '#d33',
		confirmButtonText : 'Hapus Data!'
	}).then((result)=>{
		if(result.value){
			document.location.href = href;
		}
	});
});
//== end untuk tombol-hapus ==//

const flashData = $('.flash-data').data('flashdata');

if(flashData){
	Swal({
		title: 'Data Role ',
		text: 'Berhasil ' + flashData,
		type: 'success'
	});
}
