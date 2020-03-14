// $(document).ready(function(){
//     window.onbeforeunload = function() {
//       localStorage.removeItem('searchBoolean')
//       localStorage.removeItem('search')
//       localStorage.removeItem('print')
//     };
//     $('#logout').on('click', function(){
//         localStorage.removeItem('searchBoolean')
//         localStorage.removeItem('search')
//         localStorage.removeItem('print')
//     })
// 	// Get the modal
//
//     $("#realitySubReg").select2();
//     if(window.location.pathname.indexOf('/admin/reality/reality-print-list/') >= 0){
//         $('#subRegionTableHeade').find('.last').hide()
//         $('#subRegionTableBody').find('.last').hide()
//     }
//
//     $('.btnprn').printPage(window.location.href);
//
//     var modal = document.getElementById('myModal');
//
// 	$('#gallery .row .column img').on('click', function(){
// 	    $('#image-modal').attr('style','display : block');
// 	    $('#image-modal img').attr('src', $(this).attr('src'));
// 	})
//
// 	$('.close-image-modal').on('click', function() {
// 		$('#image-modal').attr('style','display : none');
// 	});
// 	// Get the image and insert it inside the modal - use its "alt" text as a caption
// 	var img = document.getElementsByClassName('.myImg');
// 	var modalImg = document.getElementById("img01");
// 	$('.myImg').on('click', function(){
// 		alert($(this).attr('src'))
// 	    $('#myModal').attr('style', 'display : block');
// 	    $('#img01').attr('src', $(this).attr('src'));
// 	})
//
// 	// Get the <span> element that closes the modal
// 	var spanClose = document.getElementsByClassName("close")[0];
//
// 	// When the user clicks on <span> (x), close the modal
// 	$('.close').on('click', function(){
// 	    modal.style.display = "none";
// 	})
//
// 	// end modal function
// 	var prodCatName, prodSubCatName ;
// 	var that = this;
//
//
// 	// users delete modal open hide
//
// 	$('.userDleteModalOpen').on('click', function(){
//         var userId = $(this).siblings('input').val();
//
//         if($(this).hasClass('gorcakal')){
//             $.ajax({
//                 url: '/admin/reality/get-count-reality/' + userId ,
//                 type: 'GET'
//             })
//                 .done(function(data) {
//                     console.log(data)
//                     if(data.count.length > 0){
//                        $('#dleteUserButton').css('display', 'none')
//                        $('#userDeleteModalBody').append('<p class="alert-danger">Գործակալի անունով առկա է գույք, գնացեք ' +
//                            'հղումով գույքերի տվյալները փոխելու համար՝ <a href="/admin/reality/get-reality-by-user-id/' + userId +'"> Հղում</a></p>')
//                     }
//                 })
//                 .fail(function() {
//                     $('#errorMessageUserDelete').append('<b>Error !</b> Something goes wrong , please try again')
//                 })
//                 .always(function() {
//                     console.log("complete");
//                 });
//         }
//         $('#koding1').on('keyup', function () {
//             if($(this).val() == '0000'){
//                 $(this).parent('.form-group').parent('.modal-body').siblings('.modal-footer').find('.btn-danger').attr('disabled', false)
//             }else{
//                 $(this).parent('.form-group').parent('.modal-body').siblings('.modal-footer').find('.btn-danger').attr('disabled', 'disabled')
//             }
//         })
//
// 		$('#dleteUserButton').on('click', function() {
// 			$.ajax({
// 				url: '/admin/admins/delete/' + userId ,
// 				type: 'GET'
// 			})
// 			.done(function() {
// 				window.location.reload()
// 			})
// 			.fail(function() {
// 				$('#errorMessageUserDelete').append('<b>Error !</b> Something goes wrong , please try again')
// 			})
// 			.always(function() {
// 				console.log("complete");
// 			});
// 		})
//
// 	})
//
// 	// reset side open hide
// 	var resHideShow = false;
// 	$('#resPasButton').on('click', function() {
// 		resHideShow = !resHideShow;
// 		if(resHideShow){
// 		    $(this).text('Հետ')
//         }else{
//             $(this).text('Փոխել գաղտնաբառը')
//         }
// 		if(resHideShow){
// 			$('#editUserArea').attr({
// 				style: 'display: none'
// 			});
// 			$('#updatePass').attr({
// 				style: 'display: block'
// 			});
// 		}else{
// 			$('#editUserArea').attr({
// 				style: 'display: block'
// 			});
// 			$('#updatePass').attr({
// 				style: 'display: none'
// 			});
// 		}
// 	});
//
// 	// reset password
//
//     $('#resPassInput').on('keydown', function () {
//         if($(this).val() && $(this).val().length >= 5){
//             $('#resetPassButton').attr('disabled', false)
//         }else{
//             $('#resetPassButton').attr('disabled', 'disabled')
//         }
//     })
//
// 	$('#resetPassButton').on('click', function(event) {
// 		event.preventDefault();
// 		var id = window.location.pathname.slice(window.location.pathname.lastIndexOf('/') + 1, window.location.pathname.length);
//         if($('#resPassInput').val() && $('#resPassInput').val().length >= 5){
//             $.ajax({
//                 url: '/admin/reset/password/' + id,
//                 type: 'post',
//                 dataType: 'json',
//                 data: {pass: $('#resPassInput').val(), _token: $('#resPassHiddenToken').val()},
//             })
//                 .done(function(resp) {
//                     if(!resp.error){
//                         window.location.pathname = '/admin/broker/user-list';
//                     }
//
//                 })
//                 .fail(function(err) {
//                     $('#resetErrormessage').html('Something goes wrong please try again');
//                 })
//                 .always(function() {
//                     console.log("complete");
//                 });
//         }else{
//             $('#resetError').addClass('show');
//             $('#resetError').text('Լրացրեք գաղտնաբառը, մինիմում 5 սիմվոլ')
//         }
//
//
// 	});
//
//
// //	show subregionsByRegion
// 	$('#regionSelect').on('change', function() {
//         window.location.pathname = '/admin/regions/regions-list/' + $(this).val();
//     })
//
//     $('#typeSelectr').on('change', function() {
//         window.location.pathname = '/admin/clients/' + $(this).val();
//     })
//
//     $("#addRealityAdmin").on("change", function(){
//         $.ajax({
//             url: '/admin/broker/get-users/' + $(this).val() ,
//             type: 'GET'
//         })
//             .done(function(data) {
//                 //subRegions
//                 $("#addRealityUsers").empty()
//                 // $("#addRealityUsers").append("<option value='-1'>Բոլորը</option>")
//                 for(var i =0; i < data.users.length; i++) {
//                     $("#addRealityUsers").append('<option value="' + data.users[i].id + '">' + data.users[i].name + '</option>')
//                 }
//             })
//             .fail(function() {
//                 $('#errorMessageUserDelete').append('<b>Error !</b> Something goes wrong , please try again')
//             })
//             .always(function() {
//                 console.log("complete");
//             });
//     })
//     $("#admin_id").on("change", function(){
//         $("#realityUser").val(-1);
//         $.ajax({
//             url: '/admin/broker/get-users/' + $(this).val() ,
//             type: 'GET'
//         })
//             .done(function(data) {
//                 //subRegions
//                 $("#realityUser").empty()
//                 $("#realityUser").append("<option value='-1'>Բոլորը</option>")
//                 for(var i =0; i < data.users.length; i++) {
//                     $("#realityUser").append('<option value="' + data.users[i].id + '">' + data.users[i].name + '</option>')
//                 }
//                 if(localStorage.getItem('search')){
//                     obj = JSON.parse(localStorage.getItem('search'));
//                     obj.user_id = -1;
//
//                     localStorage.setItem('search', JSON.stringify(obj));
//                 }
//             })
//             .fail(function() {
//                 $('#errorMessageUserDelete').append('<b>Error !</b> Something goes wrong , please try again')
//             })
//             .always(function() {
//                 console.log("complete");
//             });
//     })
//
//     $("#editRealityAdmin").on("change", function(){
//         $.ajax({
//             url: '/admin/broker/get-users/' + $(this).val() ,
//             type: 'GET'
//         })
//             .done(function(data) {
//                 //subRegions
//                 $("#editRealityUsers").empty()
//                 // $("#editRealityUsers").append("<option value='-1'>Բոլորը</option>")
//                 for(var i =0; i < data.users.length; i++) {
//                     $("#editRealityUsers").append('<option value="' + data.users[i].id + '">' + data.users[i].name + '</option>')
//                 }
//             })
//             .fail(function() {
//                 $('#errorMessageUserDelete').append('<b>Error !</b> Something goes wrong , please try again')
//             })
//             .always(function() {
//                 console.log("complete");
//             });
//     })
//
// 	$("#addRealityRegion").on("change", function(){
// 	    $("#addRealitySubRegion").val(null).trigger("change");
//         $.ajax({
//             url: '/admin/regions/sub-regions-list/' + $(this).val() ,
//             type: 'GET'
//         })
//             .done(function(data) {
//             	//subRegions
//                 $("#addRealitySubRegion").empty()
//
// 				for(var i =0; i < data.subRegions.length; i++) {
//                     $("#addRealitySubRegion").append('<option value="' + data.subRegions[i].id + '">' + data.subRegions[i].name + '</option>')
// 				}
//             })
//             .fail(function() {
//                 $('#errorMessageUserDelete').append('<b>Error !</b> Something goes wrong , please try again')
//             })
//             .always(function() {
//                 console.log("complete");
//             });
// 	})
//
//     $("#realityReg").on("change", function(){
// 	    $("#realitySubReg").val(null).trigger("change");
//         $.ajax({
//             url: '/admin/regions/sub-regions-list/' + $(this).val() ,
//             type: 'GET'
//         })
//             .done(function(data) {
//                 //subRegions
//                 $("#realitySubReg").empty()
//                 $("#realitySubReg").append("<option value='-1'>Բոլորը</option>")
//                 for(var i =0; i < data.subRegions.length; i++) {
//                     $("#realitySubReg").append('<option value="' + data.subRegions[i].id + '">' + data.subRegions[i].name + '</option>')
//                 }
//             })
//             .fail(function() {
//                 $('#errorMessageUserDelete').append('<b>Error !</b> Something goes wrong , please try again')
//             })
//             .always(function() {
//                 console.log("complete");
//             });
//     });
//
//     $("#editRealityRegion").on("change", function(){
//         $.ajax({
//             url: '/admin/regions/sub-regions-list/' + $(this).val() ,
//             type: 'GET'
//         })
//             .done(function(data) {
//                 //subRegions
//                 $("#editRealitySubRegion").empty()
//                 $("#editRealitySubRegion").append("<option value='-1'>Բոլորը</option>")
//                 for(var i =0; i < data.subRegions.length; i++) {
//                     $("#editRealitySubRegion").append('<option value="' + data.subRegions[i].id + '">' + data.subRegions[i].name + '</option>')
//                 }
//             })
//             .fail(function() {
//                 $('#errorMessageUserDelete').append('<b>Error !</b> Something goes wrong , please try again')
//             })
//             .always(function() {
//                 console.log("complete");
//             });
//     })
//
//
//     $('#streetSearch').blur(function (){
//         $('#streetSearch').siblings('ul.ms-list').empty();
//         $('#streetSearch').siblings('ul.ms-list').css('display', 'none');
//     })
//     $('#streetSearch').on('keydown', function (){
//
//         $(this).siblings('.ms-list').empty()
//         if($(this).val().length > 0) {
//             $.ajax({
//                 url: '/admin/regions/get-street/' + $('#realityReg').val() +'/' + $('#realitySubReg').val() + '/' +  $(this).val() ,
//                 type: 'GET'
//             })
//                 .done(function(data) {
// 					if(!data.error) {
//                         $('#streetSearch').siblings('ul.ms-list').css('display', 'block');
//                         for(var i =0; i < data.street.length; i++) {
//                             $('#streetSearch').siblings('ul.ms-list').append('<li class="streetList" style="cursor: pointer">' + data.street[i].street + '</li>')
//                         }
//                         $('.streetList').on('click', function(){
//                             $('#streetSearch').val($(this).text())
//                             $('#streetSearch').siblings('ul.ms-list').empty()
//                             $('#streetSearch').siblings('ul.ms-list').css('display', 'none');
//                         })
// 					}
//                 })
//                 .fail(function() {
//                     $('#errorMessageUserDelete').append('<b>Error !</b> Something goes wrong , please try again')
//                 })
//                 .always(function() {
//                     console.log("complete");
//                 });
//         }else{
//             $('#streetSearch').siblings('ul.ms-list').empty();
//             $('#streetSearch').siblings('ul.ms-list').css('display', 'none');
//         }
//     })
//
//     $('#codeSearch').blur(function (){
//         $('#codeSearch').siblings('ul.ms-list').empty();
//         $('#codeSearch').siblings('ul.ms-list').css('display', 'none');
//     })
//     $('#codeSearch').on('keydown', function (){
//         var that = this;
//         $(this).siblings('.ms-list').empty()
//         if($(this).val().length > 0) {
//             $.ajax({
//                 url: '/admin/regions/get-code',
//                 type: 'GET'
//             })
//                 .done(function(data) {
//                     console.log(data)
//                     if(!data.error) {
//                         $('#codeSearch').siblings('ul.ms-list').css('display', 'block');
//                         for(var i =0; i < data.code.length; i++) {
//                             $('#codeSearch').siblings('ul.ms-list').append('<li class="streetList" style="cursor: pointer">' + data.code[i].code + '</li>')
//                         }
//                         $('.streetList').on('click', function(){
//                             $('#codeSearch').val($(this).text())
//                             $('#codeSearch').siblings('ul.ms-list').empty();
//                             $('#codeSearch').siblings('ul.ms-list').css('display', 'none');
//                         })
//                     }
//                 })
//                 .fail(function() {
//                     $('#errorMessageUserDelete').append('<b>Error !</b> Something goes wrong , please try again')
//                 })
//                 .always(function() {
//                     console.log("complete");
//                 });
//         }else{
//             $('#codeSearch').siblings('ul.ms-list').empty();
//             $('#codeSearch').siblings('ul.ms-list').css('display', 'none');
//         }
//     })
//
//     // $('#filterRealityStatus').on('change', function(){
//     //     window.location.pathname = "/admin/reality/reality-list/" + $(this).val() + '/' + $('#type').val()
//     // })
//     // $('#type').on('change', function(){
//     //     window.location.pathname = "/admin/reality/reality-list/" + $('#filterRealityStatus').val() + '/' + $(this).val()
//     // })
//
//
//
//     $('.changeUserStatus').on('change', function(){
//         var that = $(this)
//         $.ajax({
//             url: '/admin/broker/update-user-status/' + $(this).siblings('input').val() +'/' + $(this).val() ,
//             type: 'GET'
//         })
//             .done(function(data) {
//                 if(!data.error) {
//                     $.Notification.notify('custom','top left', 'Շնորհակալություն', data.message)
//                 }else{
//                     $.Notification.notify('error','top left', 'Շնորհակալություն', data.message)
//                 }
//             })
//             .fail(function() {
//                 $('#errorMessageUserDelete').append('<b>Error !</b> Something goes wrong , please try again')
//             })
//             .always(function() {
//                 console.log("complete");
//             });
//     })
//
//
//
//     //filtred side
//     triggerFunction = function (){
//         $('#searchButtonReality').trigger('click')
//     }
//     if(window.location.pathname.indexOf('/admin/reality/reality-list/') >= 0) {
//         $(window).on('hashchange', function() {
//             if (window.location.hash && localStorage.getItem('search')) {
//                 var page = window.location.hash.replace('#', '');
//                 if (page == Number.NaN || page <= 0) {
//                     return false;
//                 } else {
//                     getPosts(page);
//                 }
//             }
//         });
//
//         $('#otherSearch').on('click', function () {
//             if(!$('#collapseExample').hasClass('in')){
//                 $(this).find('span').removeClass('glyphicon-chevron-down');
//                 $(this).find('span').addClass('glyphicon-chevron-up');
//             }else{
//                 $(this).find('span').addClass('glyphicon-chevron-down');
//                 $(this).find('span').removeClass('glyphicon-chevron-up');
//             }
//         })
//
//         $(document).on('click', '.pagination a', function (e) {
//             if (localStorage.getItem('search') && localStorage.getItem('searchBoolean') && localStorage.getItem('searchBoolean') == 'true'){
//                 data = JSON.parse(localStorage.getItem('search'));
//                 page = $(this).attr('href').split('page=')[1]
//                 getPosts(page, data)
//                 e.preventDefault();
//             }else{
//                 return true;
//             }
//         });
//
//         $('#clearFiltr').on('click', function () {
//             localStorage.removeItem('searchBoolean')
//             localStorage.removeItem('search')
//             $('#type').val(1),
//             $('#codeSearch').val(""),
//             $('#hp_code').val(""),
//             $('#realityType').val(-1),
//             $('#admin_id').val(-1),
//             $('#realityProect').val(-1),
//             $('#realityBuildingType').val(-1),
//             $('#realityUser').val(-1),
//             $('#realityCosmetic').val(-1),
//             $('#realityBalcon').val(-1),
//             $('#realityReg').val(-1),
//             $('#realitySubReg').val(-1),
//             $('#streetSearch').val(""),
//             $('#buildingNumber').val(""),
//             $('#apartamentNumber').val(""),
//             $('#floorMin').val(""),
//             $('#firstFloor').val(""),
//             $('#floorMax').val(""),
//             $('#lastFloor').val(""),
//             $('#areaMin').val(""),
//             $('#areaMax').val(""),
//             $('#roomsMin').val(""),
//             $('#roomsMax').val(""),
//             $('#priceMin').val(""),
//             $('#priceMax').val(""),
//             $('#buildingFloorsMin').val(""),
//             $('#buildingFloorsMax').val(""),
//             $('#gardenMin').val(""),
//             $('#gardenMax').val(""),
//             $('#facePartMin').val(""),
//             $('#facePartMax').val(""),
//             $('#phone').val(""),
//             $('#customerName').val("")
//             $('#filterRealityStatus').val('1');
//             $('#filterModal').modal('hide')
//             var search = {
//                 '_token':$('#token').val(),
//                 'type': $('#type').val(),
//                 'status': $('#filterRealityStatus').val(),
//                 'hp_code': $('#hp_code').val(),
//                 'code': $('#codeSearch').val(),
//                 'admin_id': $('#admin_id').val(),
//                 'realityType': $('#realityType').val(),
//                 'realityProect': $('#realityProect').val(),
//                 'realityBuildingType': $('#realityBuildingType').val(),
//                 'realityCosmetic': $('#realityCosmetic').val(),
//                 'realityBalcon': $('#realityBalcon').val(),
//                 'realityReg': $('#realityReg').val(),
//                 'realitySubReg': $('#realitySubReg').val(),
//                 'streetSearch': $('#streetSearch').val(),
//                 'buildingNumber': $('#buildingNumber').val(),
//                 'apartamentNumber': $('#apartamentNumber').val(),
//                 'floorMin': $('#floorMin').val(),
//                 'firstFloor': $('#firstFloor').val(),
//                 'floorMax': $('#floorMax').val(),
//                 'lastFloor': $('#lastFloor').val(),
//                 'areaMin': $('#areaMin').val(),
//                 'areaMax': $('#areaMax').val(),
//                 'roomsMin': $('#roomsMin').val(),
//                 'roomsMax': $('#roomsMax').val(),
//                 'priceMin': $('#priceMin').val(),
//                 'priceMax': $('#priceMax').val(),
//                 'buildingFloorsMin': $('#buildingFloorsMin').val(),
//                 'buildingFloorsMax': $('#buildingFloorsMax').val(),
//                 'gardenMin': $('#gardenMin').val(),
//                 'gardenMax': $('#gardenMax').val(),
//                 'facePartMin': $('#facePartMin').val(),
//                 'facePartMax': $('#facePartMax').val(),
//                 'phone': $('#phone').val(),
//                 'customerName': $('#customerName').val(),
//                 'user_id': $('#realityUser').val()
//             }
//             if ($('#firstFloor').is(':checked')){
//                 search.firstFloor = 1
//             }
//             if ($('#lastFloor').is(':checked')){
//                 search.lastFloor = 1
//             }
//             window.location.reload()
//         })
//
//         var data, page;
//         if (localStorage.getItem('search')){
//             data = JSON.parse(localStorage.getItem('search'));
//             console.log(data, "666666666666666666");
//             $('#type').val(data.type)
//             $('#codeSearch').val(data.code)
//             $('#hp_code').val(data.hp_codde)
//             $('#admin_id').val(data.admin_id)
//             $('#realityType').val(data.realityType)
//             $('#realityUser').val(data.user_id),
//             $('#realityProect').val(data.realityProect)
//             $('#realityBuildingType').val(data.realityBuildingType);
//             $('#realityCosmetic').val(data.realityCosmetic);
//             $('#realityBalcon').val(data.realityBalcon);
//             $('#realityReg').val(data.realityReg);
//             $('#realitySubReg').val(data.realitySubReg);
//             $('#streetSearch').val(data.streetSearch);
//             $('#buildingNumber').val(data.buildingNumber);
//             $('#apartamentNumber').val(data.apartamentNumber);
//             $('#floorMin').val(data.floorMin);
//             $('#firstFloor').val(data.firstFloor);
//             $('#floorMax').val(data.floorMax);
//             $('#lastFloor').val(data.lastFloor);
//             $('#areaMin').val(data.areaMin);
//             $('#areaMax').val(data.areaMax);
//             $('#roomsMin').val(data.roomsMin);
//             $('#roomsMax').val(data.roomsMax);
//             $('#priceMin').val(data.priceMin);
//             $('#priceMax').val(data.priceMax);
//             $('#buildingFloorsMin').val(data.buildingFloorsMin);
//             $('#buildingFloorsMax').val(data.buildingFloorsMax);
//             $('#gardenMin').val(data.gardenMin);
//             $('#gardenMax').val(data.gardenMax);
//             $('#facePartMin').val(data.facePartMin);
//             $('#facePartMax').val(data.facePartMax);
//             $('#phone').val(data.phone);
//             $('#filterRealityStatus').val(data.status);
//             $('#customerName').val(data.customerName);
//             $("#realityReg").trigger("change");
//             $("#admin_id").trigger("change")
//         }
//
//         $('#searchButtonReality').on('click', function(){
//             console.log('5555555555555555');
//             localStorage.setItem('searchBoolean', 'true')
//             var search = {
//                 '_token':$('#token').val(),
//                 'type': $('#type').val(),
//                 'code': $('#codeSearch').val(),
//                 'hp_code': $('#hp_code').val(),
//                 'status': $('#filterRealityStatus').val(),
//                 'admin_id': $('#admin_id').val(),
//                 'realityType': $('#realityType').val(),
//                 'realityProect': $('#realityProect').val(),
//                 'realityBuildingType': $('#realityBuildingType').val(),
//                 'realityCosmetic': $('#realityCosmetic').val(),
//                 'realityBalcon': $('#realityBalcon').val(),
//                 'realityReg': $('#realityReg').val(),
//                 'realitySubReg': $('#realitySubReg').val(),
//                 'streetSearch': $('#streetSearch').val(),
//                 'buildingNumber': $('#buildingNumber').val(),
//                 'apartamentNumber': $('#apartamentNumber').val(),
//                 'floorMin': $('#floorMin').val(),
//                 'firstFloor': $('#firstFloor').val(),
//                 'floorMax': $('#floorMax').val(),
//                 'lastFloor': $('#lastFloor').val(),
//                 'areaMin': $('#areaMin').val(),
//                 'areaMax': $('#areaMax').val(),
//                 'roomsMin': $('#roomsMin').val(),
//                 'roomsMax': $('#roomsMax').val(),
//                 'priceMin': $('#priceMin').val(),
//                 'priceMax': $('#priceMax').val(),
//                 'buildingFloorsMin': $('#buildingFloorsMin').val(),
//                 'buildingFloorsMax': $('#buildingFloorsMax').val(),
//                 'gardenMin': $('#gardenMin').val(),
//                 'gardenMax': $('#gardenMax').val(),
//                 'facePartMin': $('#facePartMin').val(),
//                 'facePartMax': $('#facePartMax').val(),
//                 'phone': $('#phone').val(),
//                 'customerName': $('#customerName').val(),
//                 'user_id': $('#realityUser').val()
//             }
//             if ($('#firstFloor').is(':checked')){
//                 search.firstFloor = 1
//             }
//             if ($('#lastFloor').is(':checked')){
//                 search.lastFloor = 1
//             }
//             localStorage.setItem('search',JSON.stringify(search))
//
//             getPosts("1", search)
//             $('#filterModal').modal('hide')
//
//         })
//
//         $('#searchButtonReality').click()
//
//     }else{
//         localStorage.removeItem('searchBoolean')
//         localStorage.removeItem('search')
//         localStorage.removeItem('print')
//     }
//
//
//
//
//     function getPosts(pе, obj) {
//         if($('.table-load').hasClass('hide')){
//             $('.table-load').addClass('show');
//             $('.table-load').removeClass('hide');
//             $('.table-block').addClass('hide');
//             $('.table-block').removeClass('show');
//         }
//         $.ajax({
//             url : '/admin/reality/reality-list/' + $('#filterRealityStatus').val() + '/' + $('#type').val() + '?page=' + pе,
//             type: 'POST',
//             data: obj,
//             dataType: 'json',
//         }).done(function (data) {
//             $('.table-load').removeClass('show');
//             $('.table-load').addClass('hide');
//             $('.table-block').addClass('show');
//             $('.tabelList').html(data);
//             var array = []
//             if (localStorage.getItem('print')){
//                 array = JSON.parse(localStorage.getItem('print'))
//             }
//             $('.printNumbers').text(array.length);
//             for ( var i = 0; i < array.length; i++) {
//                 $('#checkForPrint_' + array[i].id).prop("checked", true);
//             }
//
//             $('.printNumbers').on('click', function () {
//                 if(localStorage.getItem('print')){
//                     if(JSON.parse(localStorage.getItem('print')).length > 0){
//                         window.open('/admin/reality/reality-print-list/' + localStorage.getItem('print'), '_target');
//                     }else{
//                         window.open('/admin/reality/reality-print-list/' + 0, '_target');
//                     }
//                 }else{
//                     window.open('/admin/reality/reality-print-list/' + 0, '_target');
//                 }
//             });
//             $('.checkForPrint').on('click', function () {
//                 var that = this;
//                 var array = []
//                 if (localStorage.getItem('print')){
//                     array = JSON.parse(localStorage.getItem('print'))
//                 }
//                 if($(this).is(':checked')) {
//                     array.push({id: $(that).siblings('input').val()})
//                     $('.printNumbers').text(array.length);
//                     localStorage.setItem('print', JSON.stringify(array) )
//                 }else{
//                     array = array.filter(function(el) {
//                         return el.id !== $(that).siblings('input').val()
//                     })
//                     $('.printNumbers').text(array.length);
//                     localStorage.setItem('print', JSON.stringify(array) )
//
//                 }
//             })
//             $('.changeRealityStatus').on('change', function(){
//                 var that = $(this)
//                 $.ajax({
//                     url: '/admin/reality/update-reality-status/' + $(this).siblings('input').val() +'/' + $(this).val() ,
//                     type: 'GET'
//                 })
//                     .done(function(data) {
//                         if(!data.error) {
//                             $.Notification.notify('custom','top left', 'Շնորհակալություն', data.message)
//                             that.parent('td').parent('tr').remove()
//                         }else{
//                             $.Notification.notify('error','top left', 'Շնորհակալություն', data.message)
//                         }
//                     })
//                     .fail(function() {
//                         $('#errorMessageUserDelete').append('<b>Error !</b> Something goes wrong , please try again')
//                     })
//                     .always(function() {
//                         console.log("complete");
//                     });
//             })
//         }).fail(function (err) {
//             console.log(err)
//         });
//     }
//
//
//
//     // սւբ ռեգիօն delete modal open hide
//
//     $('.regionDeleteModalOpen').on('click', function(){
//         var userId = $(this).siblings('input').val();
//         $('#koding').on('keyup', function () {
//             if($(this).val() == '0000'){
//                 $(this).parent('.form-group').parent('.modal-body').siblings('.modal-footer').find('.btn-danger').attr('disabled', false)
//             }else{
//                 $(this).parent('.form-group').parent('.modal-body').siblings('.modal-footer').find('.btn-danger').attr('disabled', 'disabled')
//             }
//         })
//         $('#dleteRegionBookButton').on('click', function() {
//             $.ajax({
//                 url: '/admin/regions/delete/' + userId ,
//                 type: 'GET'
//             })
//                 .done(function() {
//                     window.location.reload()
//                 })
//                 .fail(function() {
//                     $('#errorMessageUserDelete').append('<b>Error !</b> Something goes wrong , please try again')
//                 })
//                 .always(function() {
//                     console.log("complete");
//                 });
//         })
//
//     })
//
//     $('.realityDeleteModalOpen').on('click', function(){
//         var userId = $(this).siblings('input').val();
//         $('#koding223').on('keyup', function () {
//             if($(this).val() == '0000'){
//                 $(this).parent('.form-group').parent('.modal-body').siblings('.modal-footer').find('.btn-danger').attr('disabled', false)
//             }else{
//                 $(this).parent('.form-group').parent('.modal-body').siblings('.modal-footer').find('.btn-danger').attr('disabled', 'disabled')
//             }
//         })
//         $('#dleteRealityButton').on('click', function() {
//             $.ajax({
//                 url: '/admin/reality/delete/' + userId ,
//                 type: 'GET'
//             })
//                 .done(function() {
//                     window.location.pathname = '/admin/reality/reality-list/1/1'
//                 })
//                 .fail(function() {
//                     $('#errorMessageUserDelete').append('<b>Error !</b> Something goes wrong , please try again')
//                 })
//                 .always(function() {
//                     console.log("complete");
//                 });
//         })
//
//     })
//
// })
//
//
// function previewImage(input, previewElId) {
//
//  if (input.files && input.files[0]) {
//     var reader = new FileReader();
//
//     reader.onload = function(e) {
//       $(previewElId).attr('src', e.target.result);
//     }
//
//     reader.readAsDataURL(input.files[0]);
//   }
// }
//
